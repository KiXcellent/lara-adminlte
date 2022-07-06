@extends('adminlte::page')

@section('title', 'Permissions' . ' - ' . config('adminlte.title', 'AdminLTE 3'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Edit Permission</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
                <li class="breadcrumb-item active">Edit Permission</li>
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
                        Editing permission.
                    </div>

                    <div class="container mt-4">

                        <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                            @method('patch')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ $permission->name }}"
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Name" required>

                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Save permission</button>
                            <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
