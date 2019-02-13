<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Illuminate\Support\Facades\DB;
use Validator;

class SupplierController extends Controller{

    public function getAllSuppliers(){

        $suppliers = Supplier::all();
        // $response = [
        //     'suppliers' => $suppliers
        // ];
        // return response()->json($response, 200);

        return $suppliers;
    }

    public function getOneSupplier(Request $request, $id){

        // $supplier = DB::table('suppliers')->where('id', $id)->first();
        // return serialize($supplier);
        // $supplier = Supplier::whereid($id)->first();

        $supplier = Supplier::find($id);
        if(!$supplier){
            return response()->json(['message' => ' Document not found'], 404);
        }
        // $response = [
        //     'supplier' => $supplier
        // ];
        // return response()->json($response, 200);

        return $supplier;
    }

    public function addNewSupplier(Request $request){

        $validator = Validator::make($request->all(), [
            'sup_fname' => 'required',
            'sup_lname' => 'required',
            'sup_address' => 'required',
            'sup_city' => 'required',
            'sup_email' => 'required|email|unique:suppliers'
        ]);

        if($validator->passes()){
            $supplier = new Supplier();
            $supplier->sup_fname = $request->sup_fname;
            $supplier->sup_lname = $request->sup_lname;
            $supplier->sup_address = $request->sup_address;
            $supplier->sup_city = $request->sup_city;
            $supplier->sup_email = $request->sup_email;
            $supplier->sup_status = true;

            $result = $supplier->save();

            return response()->json(['successData' => $supplier]);

        }

        return response()->json(['error' =>$validator->errors()->all()]);

    }

    public function updateSupplier(Request $request, $suplire_id){

        $validator = Validator::make($request->all(), [
            'sup_fname' => 'required',
            'sup_lname' => 'required',
            'sup_address' => 'required',
            'sup_city' => 'required',
            "sup_email" => 'required|email|unique:suppliers'

        ]);

        if($validator){
            $supplier =  Supplier::find($suplire_id);;
            $supplier->sup_fname = $request->sup_fname;
            $supplier->sup_lname = $request->sup_lname;
            $supplier->sup_address = $request->sup_address;
            $supplier->sup_city = $request->sup_city;
            $supplier->sup_email = $request->sup_email;
            //$supplier->sup_status = true;

            $result = $supplier->save();

            return response()->json(['successData' => $supplier]);

        }

        return response()->json(['error' =>$validator->errors()->all()]);

    }


    public function deleteSupplier($id){

        $supplier = Supplier::find($id);
        $supplier->sup_status = false;
        $check = $supplier->save();

        if($check){
            return response()->json(['code' =>  200]);
        }
        return response()->json(['code' =>  404]);
    }
}
