@extends('adminlte::page')

@section('title', 'Roles' . ' - ' . config('adminlte.title', 'AdminLTE 3'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{ ucfirst($role->name) }} Role</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">{{ ucfirst($role->name) }} Role</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="lead">
                    </div>

                    <div class="container mt-4">
                        <h3>Assigned permissions</h3>
                        <table class="table table-striped">
                            <thead>
                                <th scope="col" width="20%">Name</th>
                                <th scope="col" width="1%">Guard</th>
                            </thead>

                            @foreach($rolePermissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
