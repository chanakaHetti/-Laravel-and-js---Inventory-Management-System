<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Inventory_Item;
use App\Item_Category;
use App\Sub_Category;
use Validator;


class InventoryItemController extends Controller
{
    public function createNewItem(Request $request){
        
        $validator = Validator::make($request->all(), [
            'item_name' => 'required',
            'item_description' => 'required',
            'sub_category_name' => 'required',
            'category_name' => 'required',
            'item_unit' => 'required',
        ]);

        if($validator->passes()){            

            $inv = new Inventory_Item();
            $inv->item_name = $request->item_name;
            $inv->item_description = $request->item_description;
            $inv->sub_category_id = $request->sub_category_name;
            $inv->item_category_id = $request->category_name;
            $inv->item_unit = $request->item_unit;

            $result = $inv->save();
            
            if($result){
                return response()->json(['successData' => $inv, 200 ] );
            }
            else{
                return response()->json(['erroData'=>404, 401]);
            }
        }

        else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }

    public function getAllItems(Request $request){
        $items = DB::table('inventory_items')
        ->join('item_categories', 'inventory_items.item_category_id', '=', 'item_categories.id')
        ->join('sub_categories', 'inventory_items.sub_category_id', '=', 'sub_categories.id')
        ->select('inventory_items.id','inventory_items.item_name','inventory_items.item_description','inventory_items.item_unit',
        'item_categories.category_name', 'sub_categories.sub_category_name')
        ->get();

        return $items;
    }

    public function getOneItem(Request $request, $id){
        $catId = DB::table('inventory_items')
        ->select('item_category_id','sub_category_id')
        ->where('id',$id)
        ->get();

        $oneItem = DB::table('inventory_items')
        ->join('item_categories',function ($join)use($catId) {
            $join->on('inventory_items.item_category_id', '=', 'item_categories.id')
            ->where('item_categories.id', '=', $catId->item_category_id);
        })
        ->join('sub_categories', function ($join)use($catId) {
            $join->on('inventory_items.sub_category_id', '=', 'sub_categories.id')
            ->where('sub_categories.id', '=', $catId->sub_category_id);
        })
        ->get();

        return response()->json([
            'message' =>  'success', 'items'=> $oneItem
        ]);
    }

    public function updateItem(Request $request,$id){

        $this->validate($request, [
            'item_name' => 'required',
            'item_description' => 'required',
            'category_name' => 'required',
            'sub_category_name' => 'required',
            'item_unit' => 'required',
        ]);

        $q2=DB::table('item_categories')->where('id',$id)->update(['category_name'=>$request->input('category_name')]);
        $q3=DB::table('sub_categories')->where('id',$id)->update(['sub_category_name'=>$request->input('sub_category_name'),]);

        DB::table('inventory_items')
        ->where('id', $id)->update([
            'item_name' => $request->input('item_name'),
            'item_description' => $request->input('item_description'),
            'item_category_id' => $q2,
            'sub_category_id' => $q3,
            'item_unit' => $request->input('item_unit'),
        ]);

        $item_name=$request->input('item_name');

        return response()->json([
            'message' =>  'success',
            'item_name'=>$item_name,
        ]);
    }

    public function deleteItem(Request $request, $id){
        
        $deleteItem = Inventory_Item::find($id);
        
        $result = $deleteItem->delete();
    
        if($result){
            return response()->json(['code'=>200]);
        }
        return response()->json(['code'=>404]);
    }
}
