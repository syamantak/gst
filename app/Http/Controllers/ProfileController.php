<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class ProfileController extends Controller
{
    /**
     * Show user profile
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view()
    {
        return view('auth.profile');
    }

    /**
     * Save user profile
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function save(Request $request)
    {
    		Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'gstin' => ['required', 'string', 'max:255'],
            'account_holder_name' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'string', 'max:255'],
            'ifsc_number' => ['required', 'string', 'max:255'],            
        ]);

    		$user = Auth::user();
    		$user->name = request('name');
    		$user->email = request('email');
    		$user->address = request('address');
    		$user->gstin = request('gstin');
    		$user->account_holder_name = request('account_holder_name');
    		$user->account_number = request('account_number');
    		$user->ifsc_number = request('ifsc_number');
    		$user->save();

        return view('auth.profile');
    }
}
