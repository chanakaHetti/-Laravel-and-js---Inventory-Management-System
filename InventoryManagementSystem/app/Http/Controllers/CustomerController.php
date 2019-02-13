<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    // Get all customers
    public function getAllCustomers(Request $request){

        //Get all customers details
        $allCustomers = DB::table('customers')->get();

        //return details
        return Customer::all();
    }


    // Get one customer
    public function getOneCustomer(Request $request, $customer_id){

        //Find customer according to customer id
        $customer = DB::table('customers')->where('id', $customer_id )->first();

        if($customer){
            // If requested customer is in the table, 
            return  response()->json(['oneCusData'=>$customer, 200]);
        }else{
            // If requested customer is not in the table
            return response()->json(['error'=>404]);
        }
    }


    // Add one customer and validate data
    public function addACustomer(Request $request){

        //Validate request data
        $validator = Validator::make($request ->all(), [

            'cus_fname'=>'required',
            'cus_lname'=>'required',
            'cus_address'=>'required',
            'cus_city'=>'required',
            'cus_email'=> 'required|email|unique:customers',
        ]);


        if($validator->passes()){
            // If validation success, assign request data into customer objects and call save
            // method on that object
            $addedCustomer = new Customer();
            $addedCustomer->cus_fname = $request->cus_fname;
            $addedCustomer->cus_lname = $request->cus_lname;
            $addedCustomer->cus_address = $request->cus_address;
            $addedCustomer->cus_city = $request->cus_city;
            $addedCustomer->cus_email = $request->cus_email;
            $addedCustomer->cus_status = true;


            // Call save method
            $result = $addedCustomer->save();

            if($result){

                // if data saving success
                // response include newly added raow and success code 200
                return response()->json(['successData' => $addedCustomer, 200 ] );
            }else{
                // If data saving falied
                // response includes some error code like 404, 401
                return response()->json(['erroData'=>404, 401]);
            }

        }else{
            // If validation failed
            return response()->json(['error validator'=>$validator->errors()->all()]);
        }
    }




    // Update customer
    public function updateCustomer(Request $request, $customer_id){

        //Validation
        $validator = Validator::make($request ->all(), [

            'cus_fname'=>'required',
            'cus_lname'=>'required',
            'cus_address'=>'required',
            'cus_city'=>'required',
            'cus_email'=> 'required|email|unique:customers',
            'cus_status'=>'',
        ]);


        if($validator){
            $updateCustomer = Customer::find($customer_id);
            $updateCustomer->cus_fname = $request->cus_fname;
            $updateCustomer->cus_lname = $request->cus_lname;
            $updateCustomer->cus_address = $request->cus_address;
            $updateCustomer->cus_city = $request->cus_city;
            $updateCustomer->cus_email = $request->cus_email;
            //$updateCustomer->cus_status = $request->cus_status;

            $updateCustomer->save();
            // return newly added row and message
            return response()->json(['successData' => $updateCustomer, 200 ] );
        }else{
            return response()->json(['erroData'=>404, 401]);
        }
        // should handle in the view
        return response()->json(['error validator'=>$validator->errors()->all()]);
    }

    // Delete customer
    public function deleteCustomer(Request $request, $customer_id){

        $deleteCustomer = Customer::find($customer_id);

        //Change status
        $deleteCustomer->cus_status = false;
        $result = $deleteCustomer->save();

        //To delete entire raw
        //$res = $deleteCustomer->delete();



        if($result){
            return response()->json(['code'=>200]);
        }

        return response()->json(['code'=>404]);
    }
}
