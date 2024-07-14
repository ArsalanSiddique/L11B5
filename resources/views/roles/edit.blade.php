@extends('layouts.app')

@section('content')
<div class="card overflow-hidden">
    <div class="card-body">
        <h5 class="card-title">{{ __('Add New Role') }}</h5>
        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">{{ __('Name') }}</label>
                <div class="col-sm-10">
                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="name" name="name" value="{{ @old('name') ? @old('name') : $role->name }}" />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="permission">{{ __('Select Permissions') }}</label>
                <div class="col-sm-10">
                    <select class="form-select js-choice @error('permission') is-invalid @enderror" id="permission" multiple="multiple" size="1" name="permission[]" data-options='{"removeItemButton":true,"placeholder":true}'>
                        <option value="">{{ __('Select Permissions...') }}</option>
                        @foreach($permission as $value)
                        <option value="{{ $value->id }}" {{ in_array($value->id, $rolePermissions) ? 'selected' : ''}}> {{ $value->name }} </option>
                        @endforeach
                    </select>
                    @error('permission')
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