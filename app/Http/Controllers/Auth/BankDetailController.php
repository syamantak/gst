<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BankDetailController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Bank Detail Controller
    |--------------------------------------------------------------------------
    |
    | Save bank details
    |
    */

    

    /**
     * payment link
     *
     * @var string
     */
    protected $redirectTo = 'https://imjo.in/dECvKH';

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
     * save bank details
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function save(Request $request)
    {
        Validator::make($data, [            
            'account_holder_name' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'string', 'max:255'],
            'ifsc_number' => ['required', 'string', 'max:255'],            
        ]);

        $user = Auth::user();
        $user->account_holder_name = request('account_holder_name');
        $user->account_number = request('account_number');
        $user->ifsc_number = request('ifsc_number');
        $user->save();

        return                 
    }
}
