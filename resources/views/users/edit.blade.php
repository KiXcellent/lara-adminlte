@extends('adminlte::page')

@section('title', 'Users' . ' - ' . config('adminlte.title', 'AdminLTE 3'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Edit User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">Edit User</li>
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
                    <form method="post" action="{{ route('users.update',  encodeId($user->id) ) }}">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ $user->name }}"
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Name" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ $user->email }}"
                                type="email"
                                class="form-control"
                                name="email"
                                placeholder="Email address" required>
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input value="{{ $user->username }}"
                                type="text"
                                class="form-control"
                                name="username"
                                placeholder="Username" required>
                            @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <small>(leave blank if you don't want to change your password)</small></label>
                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        @can('roles.edit')
                            @if($user->id != auth()->user()->id)
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control"
                                    name="role" required>
                                    <option value="">Select role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ in_array($role->name, $userRole)
                                                ? 'selected'
                                                : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                    <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                            @endif
                        @endcan
                        <button type="submit" class="btn btn-primary">Update user</button>
                        <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
