<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\Item_Category;
use App\Sub_Category;
use Validator;


class SubCategoryController extends Controller
{
    public function createNewSubCategory(Request $request){

          $validator = Validator::make($request->all(), [
              'category_id' => 'required',
              'sub_category_name' => 'required|unique:sub_categories',
          ]);

         if($validator->passes()){
             $sub_category = new Sub_Category();
             $sub_category->item_category_id = $request->category_id;
             $sub_category->sub_category_name = $request->sub_category_name;

             $result = $sub_category->save();

             return response()->json(["addedItem" => $sub_category]);

         }else{
             return response()->json(['error'=>$validator->errors()->all()]);
         }



   }

   //Get All sub categories
   public function getAllSubCategories(Request $request){
       //Get all customers details
       $allCustomers = DB::table('sub_categories')->get();

       //return details
       return Sub_Category::all();
   }

   // Get one sub category
   public function getOneSubCategory(Request $request,$id){
            $items= DB::table('sub_categories')->select([
              'sub_category_name',
              'item_category_id',])->where('id',$id)->get();

            if($items){
              return response()->json([
                    'message' =>  'success',
                    $items
                ]);
            }
            return response()->json([
                    'message' =>  'failed',
                    
            ]);
   }


   // Update sub category
   public function updateSubCategory(Request $request,$subCategoryId)
   {
       //Validation
       $validator = Validator::make($request ->all(), [

           'sub_category_name'=>'required',

       ]);

       if($validator){
           $updateCustomer = Sub_Category::find($subCategoryId);
           $updateCustomer->sub_category_name = $request->sub_category_name;


           $updateCustomer->save();
           // return newly added row and message
           return response()->json(['successData' => $updateCustomer, 200 ] );
       }else{
           return response()->json(['erroData'=>404, 401]);
       }
       // should handle in the view
       return response()->json(['error'=>$validator->errors()->all()]);

   }


   // Remove sub category
    public function deleteSubCategory(Request $request, $subCategoryId){
        $deleteSubCategory = Sub_Category::find($subCategoryId);

        //Delete sub category
        $res = $deleteSubCategory->delete();

        if($res){
            return response()->json(['code'=>200]);
        }

        return response()->json(['code'=>404]);
    }

    public function getsubcategoryname(){
        
    $subcat_name = DB::table('sub_categories')->pluck('sub_category_name', 'id');
    echo $subcat_name;
}
}
