@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row content" style="margin: 7%;
    background-color: #ffffff;
    padding: 4rem 1rem 4rem 1rem;
    box-shadow: 0 0 5px 5px rgba(0,0,0,.05);
    opacity: 0.95;">
        <div class="col-md-6">
            <h3 class="login-text mb-3" style="font-style: normal;
            font-weight: 600 !important;">REGISTER</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                        <div class="form-group">
                            <label for="name" class="label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                                <button type="submit" class="btn btn-dark" style="border-radius: 10px;">{{ __('Register') }}</button>
                    </form>
                </div>
                <div class="col-md-6 mb-3">
                    <img src="{{ asset('assets/logo-2.PNG') }}" class="img-fluid">
                </div>
            </div>
        </div>
@endsection
