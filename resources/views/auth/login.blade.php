@extends('layouts.auth-app')

@section('content')
<div class="col-md-7 d-flex flex-center">
    <div class="p-4 p-md-5 flex-grow-1">
        <div class="row flex-between-center">
            <div class="col-auto">
                <h3>{{ __('Account Login') }}</h3>
            </div>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="card-email">{{ __('Email address') }}</label>
                <input class="form-control @error('email') is-invalid @enderror" placeholder="Your email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="card-email" type="email" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="card-password">{{ __('Password') }}</label>
                </div>
                <input class="form-control @error('password') is-invalid @enderror" placeholder="**********" name="password" required autocomplete="current-password" id="card-password" type="password" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row flex-between-center">
                <div class="col-auto">
                    <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" id="card-checkbox" {{ old('remember') ? 'checked' : '' }} />
                        <label class="form-check-label mb-0" for="card-checkbox">{{ __('Remember me') }}</label>
                    </div>
                </div>
                @if (Route::has('password.request'))
                <div class="col-auto"><a class="fs--1" href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a></div>
                @endif
            </div>
            <div class="mb-3">
                <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">{{ __('Log in') }}</button>
            </div>
        </form>
        <div class="position-relative mt-4">
            <hr class="bg-300" />
            <div class="divider-content-center">{{ __('or log in with') }}</div>
        </div>
        <div class="row g-2 mt-2">
            <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> {{ __('google') }}</a></div>
            <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> {{ __('facebook') }}</a></div>
        </div>
    </div>
</div>
@endsection