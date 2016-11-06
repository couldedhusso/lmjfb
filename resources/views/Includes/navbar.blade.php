<nav class="navbar navbar-default navbar-static-top" id="page-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            @if(Auth::check())
              <a class="navbar-brand" href="{{ url('/home') }}">
                  {{-- {{ config('app.name', 'LMJF') }} --}}
                  <span class="android-title mdl-layout-title android-title">LMJF | Espace Numérique de Travail</span>
              </a>
            @else
              <a class="navbar-brand android-title mdl-layout-title android-title" href="{{ url('/login') }}">
                  {{-- {{ config('app.name', 'LMJF') }} --}}
                  LMJF | Espace Numérique de Travail
              </a>
            @endif
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            {{-- <ul class="nav navbar-nav">
                &nbsp;
            </ul> --}}

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Se connecter</a></li>
                    {{-- <li><a href="{{ url('/register') }}">Register</a></li> --}}
                @else
                  <li><a href="#"><img class="ui avatar image" src="{{asset('img/users.png')}}">
                      <span>{{ Auth::user()->user_name .' '.Auth::user()->user_last_name }}</span></a>
                  </li>
                  <li><a href="{{ url('/auth/logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> Se deconnecter</a></li>
                           <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                           </form>

                @endif
            </ul>
        </div>
    </div>
</nav>
