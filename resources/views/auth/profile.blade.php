@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save_profile') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ Auth::user()->address }}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gstin" class="col-md-4 col-form-label text-md-right">{{ __('GSTIN') }}</label>

                            <div class="col-md-6">
                                <input id="gstin" type="text" class="form-control{{ $errors->has('gstin') ? ' is-invalid' : '' }}" name="gstin" value="{{ Auth::user()->gstin }}" required>

                                @if ($errors->has('gstin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gstin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="account_holder_name" class="col-md-4 col-form-label text-md-right">{{ __('Account Holder Name') }}</label>

                            <div class="col-md-6">
                                <input id="account_holder_name" type="text" class="form-control{{ $errors->has('account_holder_name') ? ' is-invalid' : '' }}" name="account_holder_name" value="{{ Auth::user()->account_holder_name }}" required>

                                @if ($errors->has('account_holder_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_holder_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_number" class="col-md-4 col-form-label text-md-right">{{ __('Account Number') }}</label>

                            <div class="col-md-6">
                                <input id="account_number" type="text" class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" name="account_number" value="{{ Auth::user()->account_number }}" required>

                                @if ($errors->has('account_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ifsc_number" class="col-md-4 col-form-label text-md-right">{{ __('IFSC Number') }}</label>

                            <div class="col-md-6">
                                <input id="ifsc_number" type="text" class="form-control{{ $errors->has('ifsc_number') ? ' is-invalid' : '' }}" name="ifsc_number" value="{{ Auth::user()->ifsc_number }}" required>

                                @if ($errors->has('ifsc_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ifsc_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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
