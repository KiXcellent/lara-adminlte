@extends('adminlte::page')

@section('title', 'Permissions' . ' - ' . config('adminlte.title', 'AdminLTE 3'))

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Permissions</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Permissions</li>
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
                        Manage your permissions here.
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right">Add permissions</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- Setup data for datatables --}}
                    @php
                    $heads = [
                        '#',
                        'Name',
                        'Guard',
                        ['label' => 'Actions', 'no-export' => false, 'width' => 5, 'class' => 'text-center'],
                    ];

                    $config = [
                        'order' => [[0, 'asc']],
                        'columns' => [null, null, null, ['orderable' => false]],
                    ];
                    @endphp

                    {{-- Minimal example / fill data using the component slot --}}
                    <x-adminlte-datatable id="table1" head-theme="dark" striped hoverable bordered compressed with-buttons
                        :heads="$heads"
                        :config="$config"
                        >
                        @php ($i = 1)
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td><nobr>{!! action_buttons('permissions', $permission->id, false ) !!}</nobr></td>
                            </tr>
                        @php ($i++)
                        @endforeach
                    </x-adminlte-datatable>
                    {{-- {{ $permissions->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
