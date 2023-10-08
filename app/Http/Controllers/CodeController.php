<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CodeController extends Controller
{
    public function get_codes(Request $request){
        $perPage = $request->query('perPage', 10);
        $searchTerm = $request->query('search', '');

        $query = Code::orderBy('id','DESC')->with('acte');

        if (!empty($searchTerm)) {
            // Utilisation du débouncing pour éviter les appels inutiles lors de la saisie
            $query->where(function ($query) use ($searchTerm) {
                $query->where('nom', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $codes = $query->paginate($perPage);

        return response()->json([
            'codes' => $codes
        ]);
    }

    public function  codes(){

        $codes = Code::all();

        return response()->json([
            'codes' => $codes
        ]);
    }

    public function create_code(Request $request){

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prix' => 'required|numeric',
            'acte_id' => 'required',
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

        $code = new Code();
        $code->nom = $request->nom;
        $code->prix = $request->prix;
        $code->description = $request->description;
        $code->acte_id = $request->acte_id;

        $code->save();

        $response = [
            'success' => true,
            'message' => "acte save successfully"
        ];
        return response()->json(
            $response,
            200
        );
    }

    public function update_code(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prix' => 'required|numeric',
            'acte_id' => 'required',
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

        $code = Code::find($id);

        $code->nom = $request->nom;
        $code->prix = $request->prix;
        $code->description = $request->description;
        $code->acte_id = $request->acte_id;

        $code->save();

        $response = [
            'success' => true,
            'message' => "acte save successfully"
        ];
        return response()->json(
            $response,
            200
        );
    }

    public function get_code($id){

        $code = Code::find($id);

        return response()->json([
            'code' => $code
        ]);
    }

    public function delete_code($id){

        $code = Code::findOrFail($id);
        $code->delete();
       }
}
