@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                        <div class="form-group row">
                            <img src="{{ asset('/images/print.png') }}" class="col-md-1 offset-md-11">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">{{ __('Merchant Name') }}</label>

                            <div class="col-md-2">
                                <label class="col-form-label text-md-right">{{ Auth::user()->name }}</label>
                            </div>

                            <label class="col-md-2 offset-md-2 col-form-label text-md-right">{{ __('Customer Name') }}</label>

                            <div class="col-md-2">
                                <label class="col-form-label text-md-right">{{ $bill->customer_name }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">{{ __('Merchant Email') }}</label>

                            <div class="col-md-2">
                                <label class="col-form-label text-md-right">{{ Auth::user()->email }}</label>
                            </div>

                            <label class="col-md-2 offset-md-2 col-form-label text-md-right">{{ __('Customer Email') }}</label>

                            <div class="col-md-2">
                                <label class="col-form-label text-md-right">{{ $bill->customer_email }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">{{ __('Merchant Address') }}</label>

                            <div class="col-md-2">
                                <label class="col-form-label text-md-right">{{ Auth::user()->address }}</label>
                            </div>

                            <label class="col-md-2 offset-md-2 col-form-label text-md-right">{{ __('Customer Address') }}</label>

                            <div class="col-md-2">
                                <label class="col-form-label text-md-right">{{ $bill->customer_address }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">{{ __('Merchant GSTIN') }}</label>

                            <div class="col-md-2">
                                <label class="col-form-label text-md-right">{{ Auth::user()->gstin }}</label>
                            </div>

                            <label class="col-md-2 offset-md-2 col-form-label text-md-right">{{ __('Customer GSTIN') }}</label>

                            <div class="col-md-2">
                                <label class="col-form-label text-md-right">{{ $bill->customer_gstin }}</label>
                            </div>
                        </div>

                    <div class="form-group row">
                        <table class="table">
                            <tbody id="items">
                                <tr>
                                    <td>Sr No</td>
                                    <td>item</td>
                                    <td>hsn</td>
                                    <td>amount</td>
                                    <td>discount</td>
                                    <td>sgst</td>
                                    <td>cgst</td>
                                    <td>total</td>
                                </tr>
                                @foreach($bill->products as $product)
                                <tr>                                        
                                    <td>{{ $loop->iteration }}</td>
                                    <td><label class="col-form-label text-md-right">{{ $product->item }}</label></td>
                                    <td><label class="col-form-label text-md-right">{{ $product->hsn }}</label></td>
                                    <td><label class="col-form-label text-md-right">{{ $product->amount }}</label></td>
                                    <td><label class="col-form-label text-md-right">{{ $product->discount }}</label></td>
                                    <td><label class="col-form-label text-md-right">{{ $product->sgst }}</label></td>
                                    <td><label class="col-form-label text-md-right">{{ $product->cgst }}</label></td>
                                    <td><label class="col-form-label text-md-right">{{ $product->total }}</label></td>
                                </tr>
                                @endforeach   
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
