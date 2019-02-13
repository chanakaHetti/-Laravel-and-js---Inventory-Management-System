<?php

// permission
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/grns/{arrayLength}', [ //length is the number of grn items /{length}
    'uses' => 'GrnController@saveGrn'
]);

Route::get('/grns', [ 
    'uses' => 'GrnController@getAllGrns'
]);

Route::get('/grns/{id}', [ 
    'uses' => 'GrnController@getOneGrn'
]);

Route::put('/grns/{id}', [ 
    'uses' => 'GrnController@modifyOneGrn'
]);




Route::post('/gins/{arrayLength}', [ //length is the number of grn items /{length}
    'uses' => 'GinController@saveGin'
]);

Route::get('/gins', [ 
    'uses' => 'GinController@getAllGins'
]);

Route::get('/gins/{id}', [ 
    'uses' => 'GinController@getOneGin'
]);

Route::get('/suppliers', [
    'uses' => 'SupplierController@getAllSuppliers'
]);

Route::get('/suppliers/{id}', [
    'uses' => 'SupplierController@getOneSupplier'
]);

Route::post('/suppliers', [
    'uses' => 'SupplierController@addNewSupplier'
]);

Route::put('/suppliers/{id}', [
    'uses' => 'SupplierController@updateSupplier'
]);

Route::delete('/suppliers/{id}', [
    'uses' => 'SupplierController@deleteSupplier'
]);


//**************************************************Categories*************************************************//
//***********************************************From Shirantha ********************************************//
//add one category
Route::post('/categories', [
    'uses' => 'CategoryController@addNewCategory'
]);

//get all category
Route::get('/categories', [
    'uses' => 'CategoryController@getAllCategories'
]);


//Update one category
Route::put('/categories/{id}', [
    'uses'=>'CategoryController@updateCategory'
]);

//get one category
Route::get('/categories/{id}', [
    'uses' => 'CategoryController@getOneCategory'
]);

// Remove category
Route::delete('categories/{id}', [
   'uses'=>'CategoryController@deleteCategory'
]);



/*************************************Those api used by customers********************************/
/*******************************************From Shirantha***************************************/

//For get all customers
Route::get('/customers', [
    'uses' => 'CustomerController@getAllCustomers'
]);


//For get one customer
Route::get('/customers/{id}', [
    'uses' => 'CustomerController@getOneCustomer'
]);


//For add one customer
Route::post('/customers',  [
    'uses' => 'CustomerController@addACustomer'
]);

//For update one customer
Route::put('/customers/{id}',  [
    'uses' => 'CustomerController@updateCustomer'
]);


//For delete one customer
Route::delete('/customers/{id}',  [
    'uses' => 'CustomerController@deleteCustomer'
]);


//****************************************subcategory controllers**********************************************//
//********************************************From Shirantha ************************************************//
//Create a sub category
Route::post('/subcategory',[
    'uses'=> 'SubCategoryController@createNewSubCategory'
]);

// Get all sub category
Route::get('subcategory', [
    'uses'=>'SubCategoryController@getAllSubCategories'
]);

// Get one sub category
Route::get('/subcategory/{id}', [
    'uses'=>'SubCategoryController@getOneSubCategory'
]);

// Update Sub Category
Route::put('subcategory/{id}', [
    'uses'=>'SubCategoryController@updateSubCategory'
]);

// Remove sub category
Route::delete('subcategory/{id}', [
    'uses' => 'SubCategoryController@deleteSubCategory'
]);


/************************************************inventory items*****************************************/
// inventory items controllers
Route::post('/items',[ 
    'uses'=> 'InventoryItemController@createNewItem'
]);
Route::get('/items','InventoryItemController@getAllItems');
Route::get('/items/{id}','InventoryItemController@getOneItem');

Route::put('/items/{id}','InventoryItemController@updateItem');

/**********APIs for Inventory Item*************/

//Category column selection
Route::get('/categoryname', [
    'uses' => 'CategoryController@getcategoryname'
]);

//SubCategory column selection
Route::get('/subcategoryname', [
    'uses'=>'SubCategoryController@getsubcategoryname'
]);