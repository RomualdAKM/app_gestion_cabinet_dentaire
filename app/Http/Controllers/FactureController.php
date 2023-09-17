<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Models\Facture;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\FactureMail;
use App\Models\ItemFacture;


class FactureController extends Controller
{
    public function create_facture(Request $request){


        $validator = Validator::make($request->all(), [
            'items' => 'required|array',
            'form' => 'required|array',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 200);
        }


        $data = $request->all();
            $items = $data['items'];
            $form = $data['form'];

            $facture = new Facture([

                
                'total' => $form['total'],
                
                'client_id' => $form['client_id'],

            ]);
            $facture->save();

            foreach ($items as $item) {
                $factureItem = new ItemFacture([

                    'facture_id' => $facture->id,
                    'acte_id' => $item['acte_id'],
                    'code_id' => $item['code_id'],
                    'numero_dent' => $item['numero_dent'],

                ]);

                $factureItem->save();
            }

                $response = [
                    'success' => true,
                    'message' => "Facture enregistrée avec succès"
                ];
                return response()->json($response, 200);

            }

            public function get_factures(Request $request){
                $perPage = $request->query('perPage', 10);
                $searchTerm = $request->query('search', '');

                $query = Facture::orderBy('id','DESC')->with('client');

                if (!empty($searchTerm)) {
                    // Utilisation du débouncing pour éviter les appels inutiles lors de la saisie
                    $query->where(function ($query) use ($searchTerm) {
                        $query->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                    });
                }

                $factures = $query->paginate($perPage);

                return response()->json([
                    'factures' => $factures
                ]);
            }


        public function download_facture(Request $request)
            {
             //dd($request->billLibelle);
             $id = $request->id;

               $facture = Facture::where('id', $id)->with('item_factures')->first();
               $item_factures = ItemFacture::where('facture_id',$facture->id)->with('acte','code')->get();
               $client_id = $facture->client_id;
               $client = Client::find($client_id);
            //    $user = Auth::user();
            //    $company = Company::where('id', $user->company_id)->first();
                //    dd($item_factures);

              $pdf = PDF::loadView('factures.download', compact(['facture','client','item_factures']));

              $filename = 'facture.pdf';
                 $headers = [
                     'Content-Type' => 'application/pdf',
                     'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                 ];

                 return $pdf->output();

             }


             private function generatePDF($facture,$client,$item_factures)
             {
                $pdf = PDF::loadView('factures.download', compact(['facture','client','item_factures']));

                 return $pdf->output();

             }

             public function send_facture(Request $request){

                $id = $request->id_Facture;

                $facture = Facture::where('id', $id)->with('item_factures')->first();
                $item_factures = ItemFacture::where('facture_id',$facture->id)->with('acte','code')->get();
                $client_id = $facture->client_id;
                $client = Client::find($client_id);
                $pdfData = $this->generatePDF($facture,$client,$item_factures);

                $pdfFileName = 'facture.pdf';

                Mail::to($client->email)->send(new FactureMail($facture,$client, $item_factures, $pdfData, $pdfFileName));


                 return response()->json([
                     200
                 ]);


             }
}
