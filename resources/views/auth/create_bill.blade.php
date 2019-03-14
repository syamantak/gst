@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Bill') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save_bill') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="customer_name" class="col-md-4 col-form-label text-md-right">{{ __('Customer Name') }}</label>

                            <div class="col-md-6">
                                <input id="customer_name" type="text" class="form-control{{ $errors->has('customer_name') ? ' is-invalid' : '' }}" name="customer_name" value="{{ old('customer_name') }}" required>

                                @if ($errors->has('customer_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('customer_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="customer_email" class="col-md-4 col-form-label text-md-right">{{ __('Customer Email') }}</label>

                            <div class="col-md-6">
                                <input id="customer_email" type="text" class="form-control{{ $errors->has('customer_email') ? ' is-invalid' : '' }}" name="customer_email" value="{{ old('customer_email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="customer_address" class="col-md-4 col-form-label text-md-right">{{ __('Customer Address') }}</label>

                            <div class="col-md-6">
                                <input id="customer_address" type="text" class="form-control{{ $errors->has('customer_address') ? ' is-invalid' : '' }}" name="customer_address" value="{{ old('customer_address') }}" required>

                                @if ($errors->has('customer_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('customer_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="customer_gstin" class="col-md-4 col-form-label text-md-right">{{ __('Customer GSTIN') }}</label>

                            <div class="col-md-6">
                                <input id="customer_gstin" type="text" class="form-control{{ $errors->has('customer_gstin') ? ' is-invalid' : '' }}" name="customer_gstin" value="{{ old('customer_gstin') }}" required>

                                @if ($errors->has('customer_gstin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('customer_gstin') }}</strong>
                                    </span>
                                @endif
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
                                    @for($i = 0; $i < 10; $i++)
                                    @if($i == 0)
                                        <tr>                                        
                                            <td>{{ $i + 1 }}</td>
                                            <td><input  type="text" class="form-control{{ $errors->has('item') ? ' is-invalid' : '' }}" name="item[]" value="{{ old('item') }}" placeholder="item" required></td>
                                            <td><input type="text" class="form-control{{ $errors->has('hsn') ? ' is-invalid' : '' }}" name="hsn[]" value="{{ old('hsn') }}" placeholder="hsn" required></td>
                                            <td><input type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount[]" value="{{ old('amount') }}" placeholder="amount" required></td>
                                            <td><input type="text" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount[]" value="{{ old('discount') }}" placeholder="discount" required></td>
                                            <td><input type="text" class="form-control{{ $errors->has('sgst') ? ' is-invalid' : '' }}" name="sgst[]" value="{{ old('sgst') }}" placeholder="sgst" required></td>
                                            <td><input type="text" class="form-control{{ $errors->has('cgst') ? ' is-invalid' : '' }}" name="cgst[]" value="{{ old('cgst') }}" placeholder="cgst" required></td>
                                            <td><input type="text" class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" name="total[]" value="{{ old('total') }}" placeholder="total" required></td> 
                                        </tr>
                                    @else
                                        <tr>                                        
                                            <td>{{ $i + 1 }}</td>
                                            <td><input  type="text" class="form-control{{ $errors->has('item') ? ' is-invalid' : '' }}" name="item[]" value="{{ old('item') }}" placeholder="item"></td>
                                            <td><input type="text" class="form-control{{ $errors->has('hsn') ? ' is-invalid' : '' }}" name="hsn[]" value="{{ old('hsn') }}" placeholder="hsn"></td>
                                            <td><input type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount[]" value="{{ old('amount') }}" placeholder="amount"></td>
                                            <td><input type="text" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount[]" value="{{ old('discount') }}" placeholder="discount"></td>
                                            <td><input type="text" class="form-control{{ $errors->has('sgst') ? ' is-invalid' : '' }}" name="sgst[]" value="{{ old('sgst') }}" placeholder="sgst"></td>
                                            <td><input type="text" class="form-control{{ $errors->has('cgst') ? ' is-invalid' : '' }}" name="cgst[]" value="{{ old('cgst') }}" placeholder="cgst"></td>
                                            <td><input type="text" class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" name="total[]" value="{{ old('total') }}" placeholder="total"></td> 
                                        </tr>
                                    @endif
                                    @endfor   
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-10">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
