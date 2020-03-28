@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header"><h1>{{ __('Reset Password') }}</h1></div>
        @include('layouts.info')
        @include('layouts.errorform')
    <div class="card-body">
        @if (session('status'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        @if(Session::has('status'))
                        <div class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" id="form" aria-label="{{ __('Reset Password') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label> -->

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control{{ $errors->has('c_headerb') ? ' is-invalid' : '' }}" name="c_headerb" value="{{ old('c_headerb') }}">
                    <!-- <input id="email" type="text" class="form-control{{ $errors->has('c_id') ? ' is-invalid' : '' }}" name="c_id" value="{{ old('c_id') }}"> -->

                    @if ($errors->has('c_headerb'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('c_headerb') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')

/////////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator

$("#form").bootstrapValidator({
    // feedbackIcons: {
    //  valid: 'fas ',
    //  invalid: 'fas ',
    //  validating: 'fas '
    // },
    fields: {
        c_headerb: {
            validators: {
                notEmpty: {
                    message: 'Please insert email. '
                },
                regexp: {
                        regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                        message: 'Please insert your valid email address'
                },
            }
        },
    }
})


/////////////////////////////////////////////////////////////////////////////////////////
@endsection