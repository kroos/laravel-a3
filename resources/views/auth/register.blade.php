@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="form" autocomplete="off" enctype="multipart/form-data" aria-label="{{ __('Login') }}"">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('c_sheadera') is-invalid @enderror" name="c_sheadera" value="{{ old('c_sheadera') }}" required autocomplete="c_sheadera" autofocus>

                                @error('c_sheadera')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="c_id" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="c_id" type="text" class="form-control @error('c_id') is-invalid @enderror" name="c_id" value="{{ old('c_id') }}" required autocomplete="c_id" autofocus>

                                @error('c_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('c_headerb') is-invalid @enderror" name="c_headerb" value="{{ old('c_headerb') }}" required autocomplete="c_headerb">

                                @error('c_headerb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('c_headera') is-invalid @enderror" name="c_headera" required autocomplete="new-c_headera">

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
                                <input id="password-confirm" type="password" class="form-control" name="c_headera_confirmation" required autocomplete="new-c_headera">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
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
        c_sheadera: {
            validators: {
                stringLength: {
                    min: 4,
                    message: 'The name should be greater than 4. '
                },
                notEmpty: {
                    message: 'Please input your name. '
                },
            }
        },
        c_id: {
            validators: {
                notEmpty: {
                    message: 'Please insert username. '
                },
                stringLength: {
                    min: 8,
                    message: 'The username should be greater than 8. '
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_]+$/,
                    message: 'The username can only consist of alphabetical, number and underscore'
                },
                remote: {
                    type: 'GET',
                    url:'{{ route('remote.email') }}',
                    message: 'Please use another username. ',
                    delay: 50
                },
            }
        },
        c_headerb: {
            validators: {
                notEmpty: {
                    message: 'Please insert your valid email. '
                },
                regexp: {
                    regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    message: 'Please insert your valid email address. '
                },
                remote: {
                    type: 'GET',
                    url:'{{ route('remote.email') }}',
                    message: 'Please use another email. ',
                    delay: 50
                },
            }
        },
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
                    message: 'The password and its confirmation are not the same. '
                }
            }
        },
        c_headera_confirmation: {
            validators: {
                notEmpty: {
                    message: 'Please insert password confirmation. '
                },
                stringLength: {
                    min: 8,
                    message: 'The confirmation password should be greater than 8. '
                },
                identical: {
                    field: 'c_headera',
                    message: 'The password and its confirmation are not the same. '
                }
            }
        },
    }
})


/////////////////////////////////////////////////////////////////////////////////////////
@endsection