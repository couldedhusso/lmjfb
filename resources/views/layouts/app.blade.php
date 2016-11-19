<!DOCTYPE html>
<html lang="en" ng-app="LMJFBouakeApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LMJF</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/multiple-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css">

    <!-- Semantic-ui core CSS     -->
    <link href="{{asset('assets/semantic/semantic.min.css')}}" rel="stylesheet" />

    <!--     Fonts and icons     -->
      {{-- <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css"> --}}
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    {{-- <link href="//cdn.materialdesignicons.com/1.7.22/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'> --}}

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- Styles -->
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">

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

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        @include('Includes.navbar')

        @yield('content')
        {{-- <div class="btn-group dropup floating-action-button">
    <button type="button" class="btn btn-info btn-fab btn-raised dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">save</i></button>
    <ul class="dropdown-menu dropdown-menu-right" style="min-width:0; background-color:transparent;">
        <li><a href="#" class="btn btn-danger btn-fab btn-raised"><i class="material-icons">clear</i></a></li>
    </ul> --}}


    <div class="container-fluid">

          <footer >

              {{-- <div class="mdl-mega-footer--bottom-section">

                <div class="mdl-mega-footer--middle-section">
                  <p class="mdl-typography--font-light">Lycée Moderne Jeunes Filles Bouaké: © 2016</p>
                </div>
              </div> --}}

          </footer>

        </div>
  </div>
    {{-- <a href="https://github.com/google/material-design-lite/blob/mdl-1.x/templates/text-only/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast" data-upgraded=",MaterialButton,MaterialRipple">View Source<span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 255.952px; height: 255.952px; transform: translate(-50%, -50%) translate(70px, 17px);"></span></span></a> --}}
    {{-- </div> --}}


        <script type="text/javascript" src="{{asset('assets/js/jquery-2.1.0.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

    {{-- <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery-2.1.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script> --}}

    <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular.min.js"></script> --}}
    <script type="text/javascript" src="{{asset('assets/js/multiple-select.js')}}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular.min.js"></script> --}}

    <!-- Reference needed scripts. See scripts section above for details on
    each script-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-resource.js"></script>
    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.11.0.js"></script>

    <!-- Semantic-ui core js     -->
    <script src="{{asset('assets/semantic/semantic.min.js')}}"></script>

    <script type="text/javascript">
        $('select.dropdown').dropdown();
        $('.ui.checkbox').checkbox();
        $('.ui.radio.checkbox').checkbox();
        $('.ui.dropdown').dropdown();
    </script>

    <script>
    $(function() {
        $('#addclassroom').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });

        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
   </script>

   <script type="text/javascript" src="{{asset('js/angular/angularApp.js')}}"></script>


    <!-- Scripts -->
    {{-- <script src="/js/app.js"></script> --}}
        {{-- <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script> --}}
</body>
</html>
