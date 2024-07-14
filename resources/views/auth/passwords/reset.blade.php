@extends('layouts.auth-app')

@section('content')
<div class="col-md-7 d-flex flex-center">
    <div class="p-4 p-md-5 flex-grow-1">
        <div class="text-center text-md-start">
            <h3>Reset password</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="mb-3">
                        <label class="form-label" for="card-reset-password">New Password</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="New Password">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="card-reset-password">New Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password" type="password" id="card-reset-password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="card-reset-confirm-password">Confirm Password</label>
                        <input class="form-control" name="password_confirmation" placeholder="Confirm Password" type="password" id="card-reset-confirm-password" />
                    </div>
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Set password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection