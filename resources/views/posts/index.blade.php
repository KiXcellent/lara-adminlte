@extends('adminlte::page')

@section('title', 'Posts' . ' - ' . config('adminlte.title', 'AdminLTE 3'))

@section('content_header')
    <h1 class="m-0 text-dark">Posts</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="lead">
                        Manage your posts here.
                        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right">Add post</a>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th>Name</th>
                                <th width="3%" colspan="3" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($i = 1)
                            @foreach ($posts as $key => $post)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('posts.show', $post->id) }}">Show</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @php ($i++)
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
