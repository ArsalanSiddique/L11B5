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
        <h5 class="card-title">{{ __('Users Management') }}</h5>

        <div class="table-responsive scrollbar">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Last Updated</th>
                        <th class="text-end" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge bg-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td></td>
                        <td>
                            <div class="text-end">
                                @can('user-list')
                                <a href="{{ route('users.show',$user->id) }}"> <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"><span class="text-500 fas fa-eye"></span></button></a>
                                @endcan
                                @can('user-edit')
                                <a href="{{ route('users.edit',$user->id) }}"> <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="text-500 fas fa-edit"></span></button></a>
                                @endcan
                                <button class="btn p-0 ms-2" onclick="deleteRecord()" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button>
                                <form method="POST" id="deleteRecord" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
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

{!! $data->links('pagination::falcon') !!}

@endsection