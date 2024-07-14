@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2></h2>
        </div>
    </div>
</div>

@session('success')
<div class="alert alert-success" role="alert">
    {{ $value }}
</div>
@endsession


<div class="card overflow-hidden">
    <div class="card-body">
        <h5 class="card-title">{{ __('Role Management') }}</h5>

        <div class="table-responsive scrollbar">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Users</th>
                        <th scope="col">Permissions</th>
                        <th scope="col">Last Updated</th>
                        <th class="text-end" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="text-end">
                                @can('role-list')
                                <a href="{{ route('roles.show',$role->id) }}"> <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"><span class="text-500 fas fa-eye"></span></button></a>
                                @endcan
                                @can('role-edit')
                                <a href="{{ route('roles.edit',$role->id) }}"> <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="text-500 fas fa-edit"></span></button></a>
                                @endcan
                                <button class="btn p-0 ms-2" type="button" onclick="deleteRecord()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button>
                                <form method="POST" id="deleteRecord" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{!! $roles->links('pagination::falcon') !!}

@endsection