<?php

namespace App\Http\Controllers;


use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Models\Devi;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeviMail;
use App\Models\ItemDevi;

class DeviController extends Controller
{
    public function create_devi(Request $request){


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

            $devi = new Devi([

                
                'total' => $form['total'],
                
                'client_id' => $form['client_id'],

            ]);
            $devi->save();

            foreach ($items as $item) {
                $deviItem = new ItemDevi([

                    'devi_id' => $devi->id,
                    'acte_id' => $item['acte_id'],
                    'code_id' => $item['code_id'],
                    'numero_dent' => $item['numero_dent'],

                ]);

                $deviItem->save();
            }

                $response = [
                    'success' => true,
                    'message' => "devi enregistrée avec succès"
                ];
                return response()->json($response, 200);

            }

            public function get_devis(Request $request){
                $perPage = $request->query('perPage', 10);
                $searchTerm = $request->query('search', '');

                $query = Devi::orderBy('id','DESC')->with('client');

                if (!empty($searchTerm)) {
                    // Utilisation du débouncing pour éviter les appels inutiles lors de la saisie
                    $query->where(function ($query) use ($searchTerm) {
                        $query->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                    });
                }

                $devis = $query->paginate($perPage);

                return response()->json([
                    'devis' => $devis
                ]);
            }

            public function download_devi(Request $request)
            {
             //dd($request->billLibelle);
             $id = $request->id;

               $devi = Devi::where('id', $id)->with('item_devis')->first();
               $item_devis = ItemDevi::where('devi_id',$devi->id)->with('acte','code')->get();
               $client_id = $devi->client_id;
               $client = Client::find($client_id);
            //    $user = Auth::user();
            //    $company = Company::where('id', $user->company_id)->first();
                //    dd($item_factures);

              $pdf = PDF::loadView('devis.download', compact(['devi','client','item_devis']));

              $filename = 'devi.pdf';
                 $headers = [
                     'Content-Type' => 'application/pdf',
                     'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                 ];

                 return $pdf->output();

             }


             private function generatePDF($devi,$client,$item_devis)
             {
                $pdf = PDF::loadView('devis.download', compact(['devi','client','item_devis']));

                 return $pdf->output();

             }

             public function send_devi(Request $request){

                $id = $request->id_Devi;

                $devi = Devi::where('id', $id)->with('item_devis')->first();
                $item_devis = ItemDevi::where('devi_id',$devi->id)->with('acte','code')->get();
                $client_id = $devi->client_id;
                $client = Client::find($client_id);
                $pdfData = $this->generatePDF($devi,$client,$item_devis);

                $pdfFileName = 'devi.pdf';

                Mail::to($client->email)->send(new DeviMail($devi,$client, $item_devis, $pdfData, $pdfFileName));


                 return response()->json([
                     200
                 ]);


             }

}
