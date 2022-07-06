@extends('adminlte::page')

@section('title', 'Users' . ' - ' . config('adminlte.title', 'AdminLTE 3'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{ $user->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">User's Profile</li>
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

                <div class="mt-4">
                    <div>
                        Name: {{ $user->name }}
                    </div>
                    <div>
                        Email: {{ $user->email }}
                    </div>
                    <div>
                        Username: {{ $user->username }}
                    </div>
                </div>

                <div class="mt-4">
                    @if( $user->id == auth()->user()->id)
                        <a href="{{ route('profile.edit') }}" class="btn btn-info">
                    @else
                        <a href="{{ route('users.edit', encodeId($user->id) ) }}" class="btn btn-info">
                    @endif
                        Edit</a>
                    <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
