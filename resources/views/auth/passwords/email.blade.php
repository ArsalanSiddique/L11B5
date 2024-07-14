@extends('layouts.auth-app')

@section('content')
<div class="col-md-7 d-flex flex-center">
    <div class="p-4 p-md-5 flex-grow-1">
        <div class="text-center text-md-start">
            <h4 class="mb-0"> Forgot your password?</h4>
            <p class="mb-4">Enter your email and we'll send you a reset link.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <input class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" type="email" placeholder="Email address" />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="mb-3"></div>
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Send reset link</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection