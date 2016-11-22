<nav class="navbar navbar-default navbar-static-top" id="page-top">
    <div class="container-fluid">
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

          {{-- <div class="col-md-5" style="padding-top: 10px; border:1px solid;">
            <div class="ui search" style="with:100%">
              <div class="ui icon input" >
                <input class="prompt" placeholder="Search countries..." type="text">
                <i class="search icon"></i>
              </div>
              <div class="results"></div>
            </div>
          </div> --}}

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                {{-- <ul class="nav navbar-nav">
                    &nbsp;
                </ul> --}}

                {{-- <div class="android-navigation-container">
                  <nav class="android-navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Enseingnants</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Elèves</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Evaluations</a>
                  </nav> --}}

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right android-header">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a  class="mdl-navigation__link mdl-typography--text-uppercase" href="{{ url('/login') }}">Se connecter</a></li>
                        {{-- <li><a href="{{ url('/register') }}">Register</a></li> --}}
                    @else
                      <li><a  class="mdl-navigation__link mdl-typography--text-uppercase" href="#"><img class="ui avatar image" src="{{asset('img/users.png')}}">
                          <span>{{ Auth::user()->user_name .' '.Auth::user()->user_last_name }}</span></a>
                      </li>
                      <li><a class="mdl-navigation__link mdl-typography--text-uppercase" href="{{ url('/auth/logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> Se deconnecter</a></li>
                               <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                               </form>

                    @endif
                </ul>
            </div>
    </div>
</nav>
