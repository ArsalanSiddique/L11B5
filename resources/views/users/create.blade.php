@extends('layouts.app')

@section('content')
<div class="card overflow-hidden">
    <div class="card-body">
        <h5 class="card-title">{{ __('Add New User') }}</h5>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">{{ __('Name') }}</label>
                <div class="col-sm-10">
                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="name" name="name" value="{{ @old('name') }}" />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="email">{{ __('Email') }}</label>
                <div class="col-sm-10">
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ @old('email') }}" />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="password">{{ __('Password') }}</label>
                <div class="col-sm-10">
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" value="{{ @old('password') }}" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="confirm-password">{{ __('Confirm Password') }}</label>
                <div class="col-sm-10">
                    <input class="form-control @error('confirm-password') is-invalid @enderror" id="confirm-password" type="password" name="confirm-password" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="roles">{{ __('Select Role') }}</label>
                <div class="col-sm-10">
                    <select class="form-select js-choice @error('roles') is-invalid @enderror" id="roles" multiple="multiple" size="1" name="roles[]" data-options='{"removeItemButton":true,"placeholder":true}'>
                        <option value="">{{ __('Select Role...') }}</option>
                        @foreach($roles as $value)
                        <option value="{{ $value }}"> {{ $value }} </option>
                        @endforeach
                    </select>
                    @error('roles')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
        </form>
    </div>
</div>
@endsection