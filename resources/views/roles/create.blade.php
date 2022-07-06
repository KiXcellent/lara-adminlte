@extends('adminlte::page')

@section('title', 'Roles' . ' - ' . config('adminlte.title', 'AdminLTE 3'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Add New Role</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">Add New Role</li>
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
                        Add new role and assign permissions.
                    </div>

                    <div class="container mt-4">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ old('name') }}"
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Name" required>
                            </div>

                            <label for="permissions" class="form-label">Assign Permissions</label>

                            <table class="table table-striped">
                                <thead>
                                    <th scope="col" width="1%"><input type="checkbox" name="all_permission" id="checkbox_all"></th>
                                    <th scope="col" width="20%">Name</th>
                                    <th scope="col" width="1%">Guard</th>
                                </thead>

                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>
                                            <input type="checkbox"
                                            name="permission[{{ $permission->name }}]"
                                            value="{{ $permission->name }}"
                                            class='checkbox'>
                                        </td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                    </tr>
                                @endforeach
                            </table>

                            <button type="submit" class="btn btn-primary">Save user</button>
                            <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
