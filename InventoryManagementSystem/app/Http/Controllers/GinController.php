<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gin;
use App\Gin_Item;
use App\Item_Inventory;
use App\Inventory_Item;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Validator;

class GinController extends Controller
{
    public function saveGin(Request $request ,$length){

        $arrayLength = (int)$length;

        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'gin_date' => 'required',
            'cus_name' => 'required',
            'cus_address' => 'required',
            'cus_city' => 'required',
            'gin_remarks' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "Error" => 'Input data cannot be validated!'
            ]);
        }

        //check if the customer is available in the table. temporary solution. should be handled at the frontend
        $cusIds = DB::table('customers')
        ->pluck('id');

        
            $c = true;
            foreach($cusIds as $cusId){
                if($request['customer_id'] == $cusId){
                    $c = false;
                    break;
                }
            }

            if($c){
                return response()->json ([
                    "Error" => ' Customer '.$request['customer_id'].' is not in the database. Please add him/her to the database first.'
                ]);
            }



        //check if the items are available in the inventory item table. temporary solution. should be handled at the frontend
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

        for($i=0; $i<$arrayLength; $i++){
            //check stock balance
            $count = Item_Inventory::where('inventory_item_id',$request[$i]['inventory_item_id'])
            ->where('inventory_balance', '>', '0')
            ->orderBy('created_at', 'asc')
            ->count();

            if($count === 0){
                return response()-json([
                    "Error" => 'Item '.$request[$i]['inventory_item_id'].' not found in the inventory'
                ],404);
            }
            else if($count === 1){

                $items = Item_Inventory::where('inventory_item_id',$request[$i]['inventory_item_id'])
                ->where('inventory_balance', '>', '0')
                ->orderBy('created_at', 'asc')
                ->first();
                $balance = ($items->inventory_balance) - ($request[$i]['gin_quantity']);
                if($balance<0){
                    return response()->json([
                        "Message" => 'Only '.$items->inventory_balance.' items available at the moment'
                    ]);
                    
                }
                else{
                    Item_Inventory::where('id', $items->id)
                    ->update([
                        'inventory_balance' => $balance
                    ]);
                }

            }
            else{
                
                $getList = Item_Inventory::where('inventory_item_id',$request[$i]['inventory_item_id'])
                ->where('inventory_balance', '>', '0')
                ->orderBy('created_at', 'asc')
                ->get();
    
                $tot = 0;
    
                $counter = 1;
    
                $prevBal =0;
                
                foreach($getList as $list){
                    $Balance = ($list->inventory_balance) + $prevBal - ($request[$i]['gin_quantity']);
                    $prevBal = $prevBal + $list->inventory_balance;
    
                    $tot = $tot + $list->inventory_balance;
    
                    if($Balance < 0){
                        $counter++;
                    }
                    else{
                        break;
                    }   
                }
    
                //check whether the total of the balance is enough to satisfy the customer request
                if($tot < $request[$i]['gin_quantity']){
                    return response()->json([
                        "Message" => 'Only '.$tot.' items available at the moment'
                    ]);
                }
    
                $prev = 0;
                $bal = $getList[0]->inventory_balance;
    
                if($counter == 1){
                    $bal = 0;
                }
    
                $update = 0;
                $total = 0;
    
                for($i=0; $i<$counter; $i++){
                    
                    $prev = $getList[$i]->inventory_balance;
                    $bal = $prev - $bal;
                    $total = $total+$prev;
    
                    if($bal<0){
                        $bal = 0;
                    }

                    //updating the the item inventory balance after a GIN
                    Item_Inventory::where('id', $getList[$i]->id)
                    ->update([
                        'inventory_balance' => $bal
                    ]);
    
                    $bal = ($request[$i]['gin_quantity']) - $total;
       
                }
            }
        }

        $ginId = DB::table('gins')->insertGetId([
            'customer_id' => $request->input('customer_id'),
            'gin_date' => $request->input('gin_date'),
            'cus_name' => $request->input('cus_name'),
            'cus_address' => $request->input('cus_address'),
            'cus_city' => $request->input('cus_city'),
            'gin_remarks' => $request->input('gin_remarks'),
        ]);

        $gin2 = Gin::findOrFail($ginId);

        for($i=0; $i<$arrayLength; $i++){
            //create new gin_item record
                $gin2->gin_item()->save(new Gin_Item([
                'inventory_item_id'=>$request[$i]['inventory_item_id'],
                'item_name'=>$request[$i]['item_name'],
                'gin_quantity' =>  $request[$i]['gin_quantity'],
                'gin_item_remarks' => $request[$i]['gin_remarks']
                ])
            );
        }

        return response()->json([
            "Message" =>  'Successfully created new GIN record!'
        ], 201);
    }



    public function getAllGins(Request $request){
        $ginIds = DB::table('gins')
        ->pluck('id');

        $count = 0;

        $array = [];

        foreach($ginIds as $ginId){

            $getGin = DB::table('gins')
            ->select(
                'id',
                'customer_id',
                'gin_date',
                'cus_name',
                'cus_address',
                'cus_city',
                'gin_remarks'
            )
            ->where('id', $ginId)
            ->get();

            $details = DB::table('gin_items')
            ->select(
                'inventory_item_id',
                'item_name',
                'gin_quantity',
                'gin_item_remarks'
            )
            ->get(); 
            
            $add = array_add(['gin_details' => $getGin], 'inventory', $details );

            $array[$count] = $add;
            $count++;
        

        }


        return response()->json([
            "Data" => $array
        ]);
    }

    public function getOneGin(Request $request, $getid){

        $getGrn = DB::table('gins')
        ->select(
            'customer_id',
            'gin_date',
            'cus_name',
            'cus_address',
            'cus_city',
            'gin_remarks'
        )
        ->where('id', $getid)
        ->get();

        $details = DB::table('gin_items')
        ->select(
            'inventory_item_id',
            'item_name',
            'gin_quantity',
            'gin_item_remarks'
        )
        ->get();


        return response()->json([
            "Gins Detail" => $getGin,
            "Inventory" => $details
        ]);


    }


    public function modifyOneGin(Request $request, $id){
        //still functioning only for one grn_items list.

        $this->validate($request, [
            'customer_id' => 'required',
            'gin_date' => 'required',
            'cus_name' => 'required',
            'cus_address' => 'required',
            'cus_city' => 'required',
            'gin_remarks' => 'required',
            //'gin_item' => 'required',
            
        ]);


        Grn::where('id', $id)
        ->update([
            'customer_id' => $request->input('customer_id'),
            'gin_date' => $request->input('gin_date'),
            'cus_name' => $request->input('cus_name'),
            'cus_address' => $request->input('cus_address'),
            'cus_city' => $request->input('cus_city'),
            'gin_remarks' => $request->input('gin_remarks')
        ]); 
        
        //upto here no problem

        
        $getGinItems = Gin_Item::where('gin_id',$id)
        ->get();

        //example for such gin item record
        // id, inventory_item_id, gin_qty, gin_id, gin_item_remarks, created_at, updated_at

        //example for item inventory record
        //id, grn_item_id, inventory_date, grn_id, inventory_item_id,inventory_qty, inventory_balance, created_at, updated_at

        // foreach($getGinItems as $ginItem){
        //     Item_Inventory::where($gin_item->inventory_item_id)
        // }

        for($i=0; $i<$arrayLength; $i++){
            Gin_Item::where('gin_id', $id)
            ->where('inventory_item_id',$request[$i]['inventory_item_id'])
            ->update([
                'inventory_item_id'=>$request[$i]['inventory_item_id'],
                'gin_quantity' =>  $request[$i]['gin_quantity'],
                'gin_item_remarks' => $request[$i]['gin_remarks']
            ]);

            Item_Inventory::where('gin_id', $id)
            ->where('inventory_item_id',$request[$i]['inventory_item_id'])
            ->update([
                'inventory_date'=>$request['gin_date'],
                'gin_id' =>  $id,
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