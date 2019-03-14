<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GstBillProduct extends Model
{
    protected $fillable = [
        'bill_id', 'item', 'hsn', 'amount', 'discount', 'sgst', 'cgst', 'total'
    ];
}
