<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GSTBill;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bills = GstBill::paginate(10);
        $bill_count = GSTBill::count();

        return view('home',['bills' => $bills, 'bill_count' => $bill_count]);
    }

    /**
     * Create payment account
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function payment_account()
    {
        $auth_request = User::request_function( env('payment_gateway_link') . '/oauth2/token/', User::auth_token_payload(), null, 'POST');

        if(isset($auth_request->access_token) && isset($auth_request->token_type))
        {
            $header = array('Authorization: ' . $auth_request->token_type . ' ' . $auth_request->access_token );
            
            $user_created = User::request_function(env('payment_gateway_link') . env('payment_gateway_version') . '/users/', User::create_user_payload(), $header, 'POST');
            
            if(isset($user_created->id))
            {
                $auth_request = User::request_function( env('payment_gateway_link') . '/oauth2/token/', User::user_payload($user_created), null, 'POST');
                if(isset($auth_request->access_token) && isset($auth_request->token_type))
                {   
                    $header = array('Authorization: ' . $auth_request->token_type . ' ' . $auth_request->access_token );
        
                    $bankaccount_request = User::request_function(env('payment_gateway_link') . env('payment_gateway_version') . '/users/' . decrypt($user_created->insta_id) . '/' . 'inrbankaccount/', User::bank_payload(), $header, 'PUT');
                }

                if($bankaccount_request->account_holder_name != null )
                {
                       return view('home'); 
                }
                else
                {
                    return response()->json(['success' => false]);
                }
            }
            else
            {
                return response()->json(['success' => false]);
            }
        }
        else
        {
           return response()->json(['success' => false]);
        } 
        
    }

    
}
