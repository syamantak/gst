<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GstBill extends Model
{

		protected $fillable = [
        'user_id', 'customer_name', 'customer_email', 'customer_address', 'customer_gstin', 'total'
    ];

    public function products()
    {
        return $this->hasMany('App\GstBillProduct', 'bill_id');
    }
}
