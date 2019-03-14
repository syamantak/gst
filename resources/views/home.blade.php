@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">                
                <div class="card-body">
                    {{ $bill_count }} Bills             
                </div>                
            </div>
        </div>

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">GST Bills</div>

                <div class="card-body">                    
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Sr No</td>
                                <td>To</td>
                                <td>Amount</td>
                                <td>Date</td>
                                <td>Paid</td>
                                <td>Bill</td>
                            </tr>
                            @foreach($bills as $bill)
                                <tr>
                                    <td> </td>
                                    <td> {{ $bill->customer_email }} </td>
                                    <td> {{ $bill->total }} </td>
                                    <td> {{ $bill->created_at }} </td>
                                    <td> {{ $bill->paid }} </td>
                                    <td> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
