<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function get_customers(Request $request){
        
        $perPage = $request->query('perPage', 10);
        $searchTerm = $request->query('search', '');
        
        $query = Client::orderBy('id','DESC');

        if (!empty($searchTerm)) {
            // Utilisation du débouncing pour éviter les appels inutiles lors de la saisie
            $query->where(function ($query) use ($searchTerm) {
                $query->where('nom', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $customers = $query->paginate($perPage);
        return response()->json([
            'customers' => $customers
        ]);
    }

    public function customers(){
        
        $clients = Client::all();

        return response()->json([
            'clients' => $clients
        ]);
    }

    public function create_customer(Request $request){
        
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'email' => 'email',
            'prenom' => 'required',
            'telephone' => ['required', 'regex:/^\+?[0-9]+$/'],      
            'date' => 'required',
            'adresse' => 'required',
                   
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json(
                $response,
                200
            );
        }

        $client = new Client();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->telephone = $request->telephone;
        $client->email = $request->email;
        $client->date = $request->date;
        $client->adresse = $request->adresse;
        $client->save();

        $response = [
            'success' => true,
            'message' => "customer save successfully"
        ];
        return response()->json(
            $response,
            200
        );

    }

    public function get_customer($id){

        $customer = Client::find($id);

        return response()->json([
            'customer' => $customer
        ]);
    }

    public function update_customer(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'email' => 'email',
            'prenom' => 'required',
            'telephone' => ['required', 'regex:/^\+?[0-9]+$/'],      
            'date' => 'required',
            'adresse' => 'required',
                   
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json(
                $response,
                200
            );
        }

        $client = Client::find($id);
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->telephone = $request->telephone;
        $client->email = $request->email;
        $client->date = $request->date;
        $client->adresse = $request->adresse;
        $client->save();

        $response = [
            'success' => true,
            'message' => "customer update successfully"
        ];
        return response()->json(
            $response,
            200
        );
    }

    public function delete_customer($id){

        $customer = Client::findOrFail($id);
        $customer->delete();
       }
}
