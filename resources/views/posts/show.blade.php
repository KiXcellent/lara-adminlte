@extends('adminlte::page')

@section('title', 'Posts' . ' - ' . config('adminlte.title', 'AdminLTE 3'))

@section('content_header')
    <h1 class="m-0 text-dark">Show post</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="lead">
                    </div>

                    <div class="container mt-4">
                        <div>
                            Title: {{ $post->title }}
                        </div>
                        <div>
                            Description: {{ $post->description }}
                        </div>
                        <div>
                            Body: {{ $post->body }}
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
