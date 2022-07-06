@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

{{-- Default Content Wrapper --}}
<div class="content-wrapper {{ config('adminlte.classes_content_wrapper', '') }}">

    {{-- Content Header --}}
    @hasSection('content_header')
        <div class="content-header">
            <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                @include('adminlte::partials.common.messages')
                @yield('content_header')
            </div>
        </div>{{-- /.content-header --}}
    @endif

    {{-- Main Content --}}
    <section class="content">
        <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
            @yield('content')
        </div>{{-- /.container-fluid --}}
    </section>{{-- /.content --}}

</div>{{-- /.content-wrapper --}}

@section('footer')
    <strong>Copyright &copy; 2022-{{ config('adminlte.copyright_end_year') }} <a href="{{ config('adminlte.author_url') }}">{{ config('adminlte.author') }}</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> {{ config('adminlte.app_version') }}
    </div>
@stop
