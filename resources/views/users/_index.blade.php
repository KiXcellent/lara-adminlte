@extends('adminlte::page')

@section('title', 'Users' . ' - ' . config('adminlte.title', 'AdminLTE 3'))

@section('content_header')
    <h1 class="m-0 text-dark">Users</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="lead">
                        Manage your users here.
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Add new user</a>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" width="1%">#</th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col" width="10%">Username</th>
                                <th scope="col" width="10%">Roles</th>
                                <th scope="col" width="1%" colspan="3" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($i = 1)
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td><a href="{{ route('users.show', $user) }}" class="btn btn-warning btn-sm">Show</a></td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @php ($i++)
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex">
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
