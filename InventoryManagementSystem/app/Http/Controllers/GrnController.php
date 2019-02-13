<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grn;
use  App\GetOneGrn;
use App\Grn_Item;
use App\Item_Inventory;
use App\Inventory_Item;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Validator;

class GrnController extends Controller
{
    public function saveGrn(Request $request, $length){ 

        
        $arrayLength = (int)$length;

        $validator = Validator::make($request->all(), [
            'supplier_id' => 'required',
            'grn_date' => 'required',
            'sup_name' => 'required',
            'sup_address' => 'required',
            'sup_city' => 'required',
            'grn_remarks' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "Error" => 'Input data cannot be validated!'
            ]);
        }

        //check if the supplier is available in the table. temporary solution. should be handled at the frontend
        $supIds = DB::table('suppliers')
        ->pluck('id');

            $c = true;
            foreach($supIds as $supId){
                if($request['supplier_id'] == $supId){
                    $c = false;
                    break;
                }
            }

            if($c){
                return response()->json ([
                    "Error" => ' Supplier '.$request['supplier_id'].' is not in the database. Please add him/her to the database first.'
                ]);
            }

            $itemIds = DB::table('inventory_items')
                ->pluck('id');

            for ($i=0; $i<$arrayLength; $i++){
                $c = true;
                foreach($itemIds as $itemId){

                    if($request[$i]['inventory_item_id'] == $itemId){
                        $c = false;
                        break;
                    }
                }

            if($c){
                return response()->json ([
                    "Error" => ' Item '.$request[$i]['inventory_item_id'].' is not in the inventory. Please enter that in to the database first.'
                ]);
            }
        }


            //create new GRN record
            $grnId = DB::table('grns')->insertGetId([
                'supplier_id' => $request->input('supplier_id'),
                'grn_date' => $request->input('grn_date'),
                'sup_name' => $request->input('sup_name'),
                'sup_address' => $request->input('sup_address'),
                'sup_city' => $request->input('sup_city'),
                'grn_remarks' => $request->input('grn_remarks'),
            ]);


            $grn2 = Grn::findOrFail($grnId);

            //for loop is for when the user enters multiple grn items in one grn. currently not working.

            for($i=0; $i<$arrayLength; $i++){
                //create new grn_item record
                 $added_item_details = $grn2->grn_item()->save(new Grn_Item([
                    'inventory_item_id'=>$request[$i]['inventory_item_id'],
                    'item_name'=>$request[$i]['item_name'],
                    'grn_quantity' =>  $request[$i]['grn_quantity'],
                    'grn_item_remarks' => $request[$i]['grn_remarks']
                     ])
                );



                $grn_item_object = Grn_Item::findOrFail($added_item_details->id);
                //dd($grn_item_object);

                $newItemInventory = new Item_Inventory([

                    'inventory_date'=>$request['grn_date'],
                    'grn_id' =>  $grnId,
                    'inventory_item_id' =>  $request[$i]['inventory_item_id'],
                    'inventory_quantity' =>  $request[$i]['grn_quantity'],
                    'inventory_balance' => $request[$i]['grn_quantity']
                ]);



                //create new item_inventory record
                $grn_item_object->item_inventory()->save($newItemInventory);


            }

            return response()->json([
                "Message" =>  "GRN successfully created!"
            ], 201);
    
    }



    public function getAllGrns(Request $request){
        $grnIds = DB::table('grns')
        ->pluck('id');

        $count = 0;

        $array = [];

        foreach($grnIds as $grnId){

            $getGrn = DB::table('grns')
            ->select(
                'id',
                'supplier_id',
                'grn_date',
                'sup_name',
                'sup_address',
                'sup_city',
                'grn_remarks'
            )
            ->where('id', $grnId)
            ->get();

            $details = DB::table('grn_items')
            ->join('item_inventories',function ($join)use($grnId){
                $join->on('grn_items.id', '=', 'item_inventories.grn_item_id')
                    ->where('item_inventories.grn_id', '=', $grnId);
            })
            ->get(); 
            
            $add = array_add(['grns_details' => $getGrn], 'inventory', $details );

            $array[$count] = $add;
            $count++;
        

        }


        return response()->json([
            "Data" => $array
        ]);


    }

    public function getOneGrn(Request $request, $getid){

        $getGrn = DB::table('grns')
        ->select(
            'supplier_id',
            'grn_date',
            'sup_name',
            'sup_address',
            'sup_city',
            'grn_remarks'
        )
        ->where('id', $getid)
        ->get();

        $details = DB::table('grn_items')
        ->join('item_inventories',function ($join)use($getid){
            $join->on('grn_items.id', '=', 'item_inventories.grn_item_id')
                ->where('item_inventories.grn_id', '=', $getid);
        })
        ->get();

        $array = array_merge($getGrn->toArray(), $details->toArray());
        
        return $array;


    }


    public function modifyOneGrn(Request $request, $id){

        $this->validate($request, [
            'supplier_id' => 'required',
            'grn_date' => 'required',
            'sup_name' => 'required',
            'sup_address' => 'required',
            'sup_city' => 'required',
            'grn_remarks' => 'required',
            //'grn_item' => 'required',
            
        ]);



        Grn::where('id', $id)
        ->update([
            'supplier_id' => $request->input('supplier_id'),
            'grn_date' => $request->input('grn_date'),
            'sup_name' => $request->input('sup_name'),
            'sup_address' => $request->input('sup_address'),
            'sup_city' => $request->input('sup_city'),
            'grn_remarks' => $request->input('grn_remarks')
        ]);

        for($i=0; $i<$arrayLength; $i++){

            Grn_Item::where('grn_id', $id)
            ->where('inventory_item_id',$request[$i]['inventory_item_id'])
            ->update([
                'inventory_item_id'=>$request[$i]['inventory_item_id'],
                'item_name'=>$request[$i]['item_name'],
                'grn_quantity' =>  $request[$i]['grn_quantity'],
                'grn_item_remarks' => $request[$i]['grn_remarks']
            ]);
    
            Item_Inventory::where('grn_id', $id)
            ->where('inventory_item_id',$request[$i]['inventory_item_id'])
            ->update([
                'inventory_date'=>$request['grn_date'],
                'grn_id' =>  $id,
                'inventory_item_id' =>  $request[$i]['inventory_item_id'],
                'inventory_quantity' =>  $request[$i]['grn_quantity'],
                'inventory_balance' => $request[$i]['grn_quantity']
                
            ]);

        }

        return response()->json([
            'Message' => 'GRN successfully updated!'
        ]);

    }


}
