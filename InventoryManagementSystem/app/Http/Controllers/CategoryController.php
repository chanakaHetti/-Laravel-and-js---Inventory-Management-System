<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item_Category;
use Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
 //Add new category
    public function addNewCategory(Request $request){

        //Validation
        $validation = Validator::make($request->all(),[
            'category_name'=>'required | unique:item_categories'
            ]);

        if($validation->passes()){
            $itemCategory  = new Item_Category();
            $itemCategory->category_name = $request->category_name;

            $result = $itemCategory->save();
            if($result){
                return response()->json(['addedItem'=> $itemCategory]);
            }else{
                return response()-json(['saveingError'=> 401]);
            }
        }

        return response()->json(['error'=>$validation->errors()->all()]);

    }


    // Get all  cattegories
    public function getAllCategories(){

        //Get all customers details
        //$allCategories = DB::table('item_categorie')->get();

        //return details
        return Item_Category::all();
    }


    // Get one category
    public function getOneCategory(Request $request, $id){
                
        $category = Item_Category::find($id);
        if(!$category){
            return response()->json(['message' => 'Category not found'], 401);
        }
        $response = [
            'category' => $category
        ];
        return response()->json($response, 200);
    }


    // Update category
    public function updateCategory(Request $request, $category_id){
        //Validation
        $validator = Validator::make($request ->all(), [

            'category_name'=>'required',
        ]);

        if($validator){
            $updateCategory = Item_Category::find($category_id);
            $updateCategory->category_name = $request->category_name;


            $updateCategory->save();
            // return newly added row and message
            return response()->json(['successData' => $updateCategory, 200 ] );
        }else{
            return response()->json(['erroData'=>404, 401]);
        }
        // should handle in the view
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    // Remove category
    public function deleteCategory(Request $request, $categoryId){
        $deleteCategory = Item_Category::find($categoryId);

        //Delete sub category
        $res = $deleteCategory->delete();

        if($res){
            return response()->json(['code'=>200]);
        }

        return response()->json(['code'=>404]);
    }

    public function getcategoryname(){
            
        $cat_name = DB::table('item_categories')->pluck('category_name', 'id');
        echo $cat_name;        
    }
}
