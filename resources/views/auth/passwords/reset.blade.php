@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header"><h1>{{ __('Reset Password') }}</h1></div>
        @include('layouts.info')
        @include('layouts.errorform')
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" id="form">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label> -->

                            <!-- <div class="col-md-6"> -->
                                <input id="email" type="hidden" class="form-control @error('c_headerb') is-invalid @enderror" name="c_headerb" value="{{ $c_headerb ?? old('c_headerb') }}" required autocomplete="c_headerb" autofocus>
                                <!-- <input id="email" type="text" class="form-control @error('c_id') is-invalid @enderror" name="c_id" value="{{ $c_id ?? old('c_id') }}" required autocomplete="c_id" autofocus> -->

                                @error('c_headerb')
                                    <!-- <span class="invalid-feedback" role="alert"> -->
                                        <!-- <strong>{{ $message }}</strong> -->
                                    <!-- </span> -->
                                @enderror
                            <!-- </div> -->
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('c_headera') is-invalid @enderror" name="c_headera" required autocomplete="new-password">

                                @error('c_headera')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="c_headera_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
//        c_headerb: {
//            validators: {
//                notEmpty: {
//                    message: 'Please insert email. '
//                },
//                regexp: {
//                        regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
//                        message: 'Please insert your valid email address'
//                },
//            }
//        },
        c_headera: {
            validators: {
                notEmpty: {
                    message: 'Please insert password. '
                },
                stringLength: {
                    min: 8,
                    message: 'The password should be greater than 8. '
                },
                identical: {
                    field: 'c_headera_confirmation',
                    message: 'The password and its confirm are not the same'
                },
            }
        },
        'c_headera_confirmation': {
            validators: {
                notEmpty: {
                    message: 'Please insert new password again. '
                },
                identical: {
                    field: 'c_headera',
                    message: 'The password and its confirm are not the same'
                },
            }
        },
    }
})
//  .find('[name="messagea"]')
//  .ckeditor()
//  .editor
//  // To use the 'change' event, use CKEditor 4.2 or later
//  .on('change', function(e) {
//      // Revalidate the bio field
//      $('#formuser').bootstrapValidator('revalidateField', 'messagea');
//      // console.log('asd');
//  });

/////////////////////////////////////////////////////////////////////////////////////////
@endsection