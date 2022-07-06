<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ route('home') }}" class="nav-link px-2 text-white">Home</a></li>
        @auth
          @role('Admin')
          <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-white">Users</a></li>
          <li><a href="{{ route('roles.index') }}" class="nav-link px-2 text-white">Roles</a></li>
          <li><a href="{{ route('permissions.index') }}" class="nav-link px-2 text-white">Permissions</a></li>
          @endrole
          <li><a href="{{ route('posts.index') }}" class="nav-link px-2 text-white">Posts</a></li>
        @endauth
      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
      </form>

      @auth
        {{auth()->user()->name}}&nbsp;
        <div class="text-end">
            @php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )

            @if (config('adminlte.use_route_url', false))
                @php( $logout_url = $logout_url ? route($logout_url) : '' )
            @else
                @php( $logout_url = $logout_url ? url($logout_url) : '' )
            @endif

            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('adminlte::adminlte.log_out') }}
            </a>
            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                @if(config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif
                {{ csrf_field() }}
            </form>

        </div>
      @endauth

      @guest
        <div class="text-end">
          <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
          <a href="{{ route('register') }}" class="btn btn-warning">Sign-up</a>
        </div>
      @endguest
    </div>
  </div>
</header>
