<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bank_payload($user)
    {
            return Array(
                'account_holder_name' => request('account_holder_name'),
                'account_number' => request('account_number'),
                'ifsc_code' => request('ifsc_code')
                );
    }

    public function user_payload($user)
    {
            return Array(
                'grant_type' => 'password',
                'client_id' => env('client_id'),
                'client_secret' => env('client_secret'),
                'username' => request('email'),
                'password' => request('password')
                );
    }

    public function create_user_payload()
    {
            return Array(
                'email' => request('email'),
                'password' => request('password'),
                'phone' => request('phone'),
                'referrer' => env('referer')
                );
    }
        

    public function auth_token_payload()
    {
            return Array(
                'grant_type' => 'client_credentials',
                'client_id' => env('client_id'),
                'client_secret' => env('client_secret')
                );
    }

    public function request_function($url, $payload, $header, $method)
    {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            if($header!= null)
            {
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            }
            if($method == 'PUT')
            {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");             
            }
            if($method == 'PATCH')
            {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");             
            }
            if($method == 'POST')
            {
                curl_setopt($ch, CURLOPT_POST, true);   
            }
            
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            curl_close($ch);

            $request = json_decode($response);

            return $request;
    }
}
