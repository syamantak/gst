<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GSTBill;
use App\GSTBillProduct;
use Auth;
use PDF;

class GstController extends Controller
{
    /**
     * Create bill
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Support\Renderable
     */
    protected function create_bill(Request $request)
    {
        return view('auth.create_bill');
    }

    /**
     * Save bill
     *
     * @param  request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    protected function save(Request $request)
    {		
    		$total = 0;
    		foreach (request('total') as $value) {
    				$total+= $value;
    		}

    		$bill = GSTBill::create([
    			'user_id' => Auth::id(),
    			'customer_name' => request('customer_name'),
    			'customer_email' => request('customer_email'),
    			'customer_address' => request('customer_address'),
    			'customer_gstin' => request('customer_gstin'),
    			'total' => $total
    		]);

    		for($i=0; $i < count(request('total')); $i++)
    		{
    			if(!empty(request('item')[$i]))
    			{
    				GSTBillProduct::create([
	    				'bill_id' => $bill->id,
	    				'item' => request('item')[$i],
	    				'hsn' => request('hsn')[$i],
	    				'amount' => request('amount')[$i],
	    				'discount' => request('discount')[$i],
	    				'sgst' => request('sgst')[$i],
	    				'cgst' => request('cgst')[$i],
	    				'total' => request('total')[$i]
	    			]);	
    			}
    			
    		}

        return view('auth.bill', ['bill' => $bill]);
    }

    /**
     * View bill
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Support\Renderable
     */
    protected function view_bill(Request $request, $id)
    {
    		$bill = GSTBill::find($id);
        return view('auth.bill', ['bill' => $bill]);
    }

    /**
     * Print bill
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Support\Renderable
     */
    protected function print_bill(Request $request, $id)
    {
    		$bill = GSTBill::find($id);
    		$pdf = PDF::loadView('auth.print_bill', $bill);
				return $pdf->stream('document.pdf');
    }
}
