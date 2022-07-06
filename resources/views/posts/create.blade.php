@extends('adminlte::page')

@section('title', 'Posts' . ' - ' . config('adminlte.title', 'AdminLTE 3'))

@section('content_header')
    <h1 class="m-0 text-dark">Add new post</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="lead">
                        Add new post.
                    </div>

                    <div class="container mt-4">

                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input value="{{ old('title') }}"
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    placeholder="Title" required>

                                @if ($errors->has('title'))
                                    <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input value="{{ old('description') }}"
                                    type="text"
                                    class="form-control"
                                    name="description"
                                    placeholder="Description" required>

                                @if ($errors->has('description'))
                                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <textarea class="form-control"
                                    name="body"
                                    placeholder="Body" required>{{ old('body') }}</textarea>

                                @if ($errors->has('body'))
                                    <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                                @endif
                            </div>


                            <button type="submit" class="btn btn-primary">Save post</button>
                            <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
