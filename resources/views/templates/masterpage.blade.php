<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>LMJFB | ENT</title>

    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}" type="text/css">
    {{-- <link rel="stylesheet" href="{{asset('https://design.google.com/css/site.css')}}" type="text/css"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/jquery.slider.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('assets/css/fileinput.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css">

    <!-- Semantic-ui core CSS     -->
    <link href="{{asset('assets/semantic/semantic.min.css')}}" rel="stylesheet" />



    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

      {{-- <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdn.materialdesignicons.com/1.7.22/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'> --}}

    <!-- Styles -->
    {{-- <link href="{{asset('/css/app.css')}}" rel="stylesheet"> --}}


    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
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
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">

        @if(Auth::check())
            @include('Includes.loggedUserHeader')
        @else
            @include('Includes.connectionHeader')
        @endif

      </div>

      {{-- </div> --}}

        <div class="android-content mdl-layout__content">
          <a name="top"></a>

          <div class="android-more-section">
            @yield('section-content')
          </div>
        </div>

        <footer class="android-footer mdl-mega-footer">
          <div class="mdl-mega-footer--top-section">
            <div class="mdl-mega-footer--left-section">
              <button class="mdl-mega-footer--social-btn"></button>
              &nbsp;
              <button class="mdl-mega-footer--social-btn"></button>
              &nbsp;
              <button class="mdl-mega-footer--social-btn"></button>
            </div>
            <div class="mdl-mega-footer--right-section">
              <a class="mdl-typography--font-light" href="#top">
                Back to Top
                <i class="material-icons">expand_less</i>
              </a>
            </div>
          </div>

          {{-- <div class="mdl-mega-footer--middle-section">
            <p class="mdl-typography--font-light">Satellite imagery: © 2014 Astrium, DigitalGlobe</p>
            <p class="mdl-typography--font-light">Some features and devices may not be available in all areas</p>
          </div> --}}

          @if(Auth::check())
            <div class="mdl-mega-footer--bottom-section">
              <a class="android-link android-link-menu mdl-typography--font-light" id="version-dropdown">
                Enseignants
                <i class="material-icons">arrow_drop_up</i>
              </a>
              <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="version-dropdown">
                <li class="mdl-menu__item">4.3 Jelly Bean</li>
                <li class="mdl-menu__item">Android History</li>
              </ul>
              <a class="android-link android-link-menu mdl-typography--font-light" id="developers-dropdown">
                Elèves
                <i class="material-icons">arrow_drop_up</i>
              </a>
              <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="developers-dropdown">
                <li class="mdl-menu__item">Android SDK</li>
                <li class="mdl-menu__item">Android for Work</li>
              </ul>

              <a class="android-link android-link-menu mdl-typography--font-light" id="test-dropdown">
                Evaluations
                <i class="material-icons">arrow_drop_up</i>
              </a>
              <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="test-dropdown">
                <li class="mdl-menu__item">Android SDK</li>
                <li class="mdl-menu__item">Android for Work</li>
              </ul>
              {{-- <a class="android-link mdl-typography--font-light" href="">Blog</a>
              <a class="android-link mdl-typography--font-light" href="">Privacy Policy</a> --}}
            </div>
            <div class="mdl-mega-footer--middle-section">
              <p class="mdl-typography--font-light">Lycée Moderne Jeunes Filles Bouaké: © 2016</p>
            </div>

          @else

            <div class="mdl-mega-footer--bottom-section">

              <div class="mdl-mega-footer--middle-section">
                <p class="mdl-typography--font-light">Lycée Moderne Jeunes Filles Bouaké: © 2016</p>
              </div>
            </div>

          @endif


        </footer>
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

    <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <!--[if gt IE 8]>
    <script type="text/javascript" src="assets/js/ie.js"></script>
    <![endif]-->

    <!-- Semantic-ui core js     -->
    <script src="{{asset('assets/semantic/semantic.min.js')}}"></script>
    <script type="text/javascript">
        $('select.dropdown').dropdown();
        $('.ui.checkbox').checkbox();
        $('.ui.radio.checkbox').checkbox();
        $('.ui.dropdown').dropdown();

    		// $("#divUpload").on("click", function() {
    		//    $('#hidde-new-file').click();
    		// });
    </script>

    {{-- <script>
       var dialog = document.querySelector('dialog');
       var showModalButton = document.querySelector('.show-modal');
       if (! dialog.showModal) {
         dialogPolyfill.registerDialog(dialog);
       }
       showModalButton.addEventListener('click', function() {
         dialog.showModal();
       });
       dialog.querySelector('.close').addEventListener('click', function() {
         dialog.close();
       });
  </script> --}}

  </body>
</html>
