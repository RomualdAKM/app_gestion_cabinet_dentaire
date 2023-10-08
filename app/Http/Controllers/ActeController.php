<?php

namespace App\Http\Controllers;

use App\Models\Acte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActeController extends Controller
{
    public function get_actes(Request $request){
        $perPage = $request->query('perPage', 10);
        $searchTerm = $request->query('search', '');
        
        $query = Acte::orderBy('id','DESC');

        if (!empty($searchTerm)) {
            // Utilisation du débouncing pour éviter les appels inutiles lors de la saisie
            $query->where(function ($query) use ($searchTerm) {
                $query->where('nom', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $actes = $query->paginate($perPage);

        return response()->json([
            'actes' => $actes
        ]);
    } 

    public function  actes(){

        $actes = Acte::orderBy('id','DESC')->with('codes')->get();

        return response()->json([
            'actes' => $actes
        ]);
    }

    public function create_acte(Request $request){

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
                          
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

        $acte = new Acte();
        $acte->nom = $request->nom;
        $acte->description = "vide";
       
        $acte->save();

        $response = [
            'success' => true,
            'message' => "acte save successfully"
        ];
        return response()->json(
            $response,
            200
        );
    }

    public function get_acte($id){

        $acte = Acte::find($id);

        return response()->json([
            'acte' => $acte
        ]);
    }


    public function update_acte(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
           

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

        $acte = Acte::find($id);
        $acte->nom = $request->nom;
        $acte->description = "vide";
        
        $acte->save();

        $response = [
            'success' => true,
            'message' => "acte update successfully"
        ];
        return response()->json(
            $response,
            200
        );
    }

    public function delete_acte($id){

        $acte = Acte::findOrFail($id);
        $acte->delete();
       }
}
