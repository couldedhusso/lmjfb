<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.slider.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}" type="text/css">
	  <link rel="stylesheet" href="{{asset('assets/css/fileinput.min.css')}}" type="text/css">


    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css">

		<!-- Semantic-ui core CSS     -->
		<link href="{{asset('assets/semantic/semantic.min.css')}}" rel="stylesheet" />

		<!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    {{-- <link href="//cdn.materialdesignicons.com/1.7.22/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" /> --}}
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <title>LMJF | Espace Admin. </title>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style media="screen">

    .content-wrapper{
        margin-left: auto;
        margin-right: auto;
    }

    .contexttuel .ui.secondary.vertical.pointing.menu {
          border-bottom-width: 0;
          border-left-width: 2px;
          border-left-style: solid;
          border-left-color: rgba(34,36,38,.15);

          border-right-width: 0px;
          border-right-style: none;
          border-rright-color:inherit;
    }

    .ui.form, ui.button, .ui.buttons .button, .header  {
        font-size:inherit;
      }

      .ui.form, ui.button {
          width: 100%;
        }

        .floating-action-button {
          position: fixed;
          bottom: 40px;
          right: 40px;
         }


        .mdl-tabs .mdl-tabs__panel .is-active{
          border-bottom: 2px solid rgba(231, 108, 17, 0.9);
        }

        .mdl-tabs__tab.active {
            color: rgba(231, 108, 17, 0.9);
            border-bottom: 2px solid rgba(231, 108, 17, 0.9);
        }

        .mdl-tabs__tab .mdl-tabs__ripple-container .mdl-ripple {
            background: rgba(231, 108, 17, 0.9);
        }

        .mdl-tabs.is-upgraded .mdl-tabs__tab.active {
          color: rgba(231, 108, 17, 0.9);
        }

    .mdl-tabs.is-upgraded .mdl-tabs__tab.active:after {
        height: 2px;
        width: 100%;
        display: block;
        content: " ";
        bottom: 0px;
        left: 0px;
        position: absolute;
        background: rgba(231, 108, 17, 0.9);
        -webkit-animation: border-expand 0.2s cubic-bezier(0.4, 0, 0.4, 1) 0.01s alternate forwards;
                animation: border-expand 0.2s cubic-bezier(0.4, 0, 0.4, 1) 0.01s alternate forwards;
        transition: all 1s cubic-bezier(0.4, 0, 1, 1);
      }

        .mdl-tabs__tab-bar {
            display: inherit;
            /*/display: -ms-flexbox;*/
            display: inline-block;;
            width: 100%;
            border-bottom: 2px solid #e0e0e0;
        }
        .mdl-tabs__tab {
            display: inline-block;
            padding: 20px 12px 21px;
            text-decoration: none;
            text-transform:capitalize;;
            font-size: 16px;
            line-height: 1;
            font-weight: 700;
            transition: border-bottom-color .1s ease-out;
            user-select: none;
            float: left;
        }

        .mdl-tabs.is-upgraded .mdl-tabs__tab.is-active:active,
        .mdl-tabs__tab .header:hover,
        .mdl-tabs.is-upgraded  .mdl-tabs__tab .header:active{
            text-decoration: none;
        }

        .pagination>li>a, .pagination>li>span {
          /*position: relative;
          float: left;
          padding: 6px 12px;
          line-height: 1.6;
          text-decoration: none;*/
          color: rgba(0,0,0,.87);;
          /*background-color: #fff;
          border: 1px solid #ddd;
          margin-left: -1px;*/
      }

      .pagination .active{
        border-color: #e0e0e0;
      }

      .android-content{
        background-color: #F3F3F3;
      }
      #view-source {
        position: fixed;
        display: block;
        right: 0;
        bottom: 0;
        margin-right: 40px;
        margin-bottom: 40px;
        z-index: 900;
      }

      .mdl-radio__inner-circle {
        background: #f9ac0e;
      }

      .mdl-radio.is-checked .mdl-radio__outer-circle {
        border: 2px solid rgba(0,0,0,.54);;
      }

      .android-title {
        color: #f9ac0e;
        font-weight: bolder;
      }

      .android-navigation .mdl-navigation__link:hover {
          color: #f9ac0e;
          border-bottom: 4px solid #f9ac0e;
      }

      .mdl-mega-footer--right-section a:hover{
        color: #f9ac0e;
      }

      .android-drawer .mdl-layout-title {
        position: relative;
        background: #f9ac0e;
        height: 160px;
      }
      .mdl-layout__drawer > .mdl-layout__title,
      .mdl-layout__drawer > .mdl-layout-title {
          line-height: 64px;
          padding-left: 40px;
          color: #fff;
      }

      .android-link {

          color: #f9ac0e !important;
      }

      .mdl-layout__header-row {
        padding: 0 40px 0 40px;
     }

     .mdl-layout__header-row {
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-flex-direction: row;
      -ms-flex-direction: row;
      flex-direction: row;
      -webkit-flex-wrap: nowrap;
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap;
      -webkit-flex-shrink: 0;
      -ms-flex-negative: 0;
      flex-shrink: 0;
      box-sizing: border-box;
      -webkit-align-self: stretch;
      -ms-flex-item-align: stretch;
      align-self: stretch;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
      height: 64px;
      margin: 0;
      padding: 0 40px 0 80px;
      color: #fff;
  }

    .mdl-layout__header {

        background-color: nonw;
        color: #fff;
        box-shadow: 0;
        transition-duration: .2s;
        transition-timing-function: cubic-bezier(.4,0,.2,1);
        transition-property: max-height,box-shadow;
    }

    .mdl-mega-footer {
        padding: 16px 40px;
        color: #9e9e9e;
        background-color: #424242;
    }

    /*.devsite-user-avatar, .devsite-user-link, .devsite-user-signin {
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
    }
    img, video {
        border: 0;
        max-width: 100%;
    }*/

      </style>

</head>

<body class="page-sub-page page-profile page-account" id="page-top">
<!-- Wrapper -->
<div class="wrapper">

  <nav class="navbar navbar-default navbar-static-top">
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
              <a class="navbar-brand android-title mdl-layout-title android-title" href="{{ url('/home') }}">
                  {{-- {{ config('app.name', 'LMJF') }} --}}

                  LMJF | Espace Numérique de Travail
              </a>
          </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <!-- Left Side Of Navbar -->
              <ul class="nav navbar-nav">
                  &nbsp;
              </ul>

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

                      {{-- <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->userFirstName .' '.Auth::user()->userLastName }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                              <li>
                                  <a href="{{ url('/logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Se deconnecter
                                  </a>

                                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li> --}}

                  @endif
              </ul>
          </div>
      </div>
  </nav>



    <!-- Page Content -->
    <div id="page-content" style="position:inherit !important;">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb" style="padding:0 !important; background-color:inherit !important;">
                <li><a href="{{url('/home')}}">Acceuil</a></li>
                <li><a href="#">Espace Administrateur</a></li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                @yield('section-content')
          </div>
    </div>
  </div>
    <!-- end Page Content -->
    {{-- <!-- Page Footer -->
    <footer id="page-footer">
        <div class="inner">
            <aside id="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <article>

                            </article>
                        </div><!-- /.col-sm-6 -->
                        <div class="col-md-3 col-sm-3">
                            <article>

                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <!-- <h3>Меню</h3> -->

                            </article>
                        </div><!-- /.col-sm-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </aside><!-- /#footer-main -->
            <aside id="footer-thumbnails" class="footer-thumbnails"></aside><!-- /#footer-thumbnails -->
            <aside id="footer-copyright">
                <div class="container">
                    <span>Copyright © 2016. All Rights Reserved.</span>
                    <span class="pull-right"><a href="#page-top" class="roll"><i class="fa fa-arrow-up">&nbsp; Haut</i></a></span>
                </div>
            </aside>
        </div><!-- /.inner -->
    </footer>
    <!-- end Page Footer --> --}}
</div>

<script type="text/javascript" src="{{asset('assets/js/jquery-2.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/smoothscroll.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/retina-1.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/fileinput.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular.min.js"></script>
<script type="text/javascript" src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/scrollReveal.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>

<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->

<!-- Semantic-ui core js     -->
<script src="{{asset('assets/semantic/semantic.min.js')}}"></script>

<!-- Metro js     -->
<script src="{{asset('assets/metro/js/metro.js')}}"></script>

<!-- Angular js  -->
{{-- <script src="{{asset('js/angular/angularApp.js')}}"></script> --}}


<script type="text/javascript">
    $('select.dropdown').dropdown();
    $('.ui.checkbox').checkbox();
    $('.ui.radio.checkbox').checkbox();
    $('.ui.dropdown').dropdown();

		$("#divUpload").on("click", function() {
		   $('#hidde-new-file').click();
		});
</script>




</body>
</html>
