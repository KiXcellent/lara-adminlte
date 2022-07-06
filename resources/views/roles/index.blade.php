@extends('adminlte::page')

@section('title', 'Roles' . ' - ' . config('adminlte.title', 'AdminLTE 3'))

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Roles</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="lead">
                        Manage your roles here.
                        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add role</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- Setup data for datatables --}}
                    @php
                    $heads = [
                        '#',
                        'Name',
                        ['label' => 'Actions', 'no-export' => false, 'width' => 5, 'class' => 'text-center'],
                    ];

                    $config = [
                        'order' => [[0, 'asc']],
                        'columns' => [null, null, ['orderable' => false]],
                    ];
                    @endphp

                    {{-- Minimal example / fill data using the component slot --}}
                    <x-adminlte-datatable id="table1" head-theme="dark" striped hoverable bordered compressed with-buttons
                        :heads="$heads"
                        :config="$config"
                        >
                        @php ($i = 1)
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $role->name }}</td>
                            <td><nobr>{!! action_buttons('roles', $role->id ) !!}</nobr></td>
                        </tr>
                        @php ($i++)
                        @endforeach
                    </x-adminlte-datatable>
                    {{-- <div class="d-flex">
                        {!! $roles->links() !!}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
