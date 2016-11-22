<!DOCTYPE html>
<html lang="fr" ng-app="BlankApp" ng-cloak> 
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">

    <!-- Reference Angular Material stylesheet -->
    <!-- Angular Material style sheet -->
   <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('Title')</title>
</head>
<body >

 <md-toolbar  layout-padding class="md-toolbar-tools-bottom md-hue-2">
        <span flex></span>
        <div class="md-toolbar-tools">
            <md-button class="md-icon-button">
                 <md-icon> menu </md-icon>
            </md-button>
            <h1>LMJF | Espace Numérique de Travail</h1>
            <span flex></span>


            <md-menu md-position-mode="target-right target" md-offset="0 40">
                <!-- Trigger for menu -->
                <md-button ng-click="$mdOpenMenu()">
                     Actions
                </md-button>


                
                <!-- Individual menu options and buttons-->
                <md-menu-content width="4">
                    <md-menu-item>
                        <md-button ng-click=”shareHandler()”>
                            Share
                        </md-button>
                    </md-menu-item>
                    <md-menu-item>
                        <md-button ng-click=”tagHandler()”>
                            Tag the page
                        </md-button>
                    </md-menu-item>

                    <md-divider></md-divider>
                    <md-menu-item>
                        <md-button ng-click=”copyHandler()”>
                            Copy link
                        </md-button>
                    </md-menu-item>
                </md-menu-content>
           </md- menu>
        </div>
  </md-toolbar> 

  <md-content layout="row">
      
 </md-content>

<md-bottom-sheet layout-padding class="md-grid" layout="column">
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

    <div class="mdl-mega-footer--bottom-section">

         <div class="mdl-mega-footer--middle-section">
                <p class="mdl-typography--font-light">Lycée Moderne Jeunes Filles Bouaké: © 2016</p>
        </div>
  </div>
</md-bottom-sheet>



 <!--<footer class="mdl-mini-footer">
  <div class="mdl-mini-footer__left-section">
    <div class="mdl-logo">Title</div>
    <ul class="mdl-mini-footer__link-list">
      <li><a href="#">Help</a></li>
      <li><a href="#">Privacy & Terms</a></li>
    </ul>
  </div>
</footer>-->

  

    <!-- Reference needed scripts.-->
    <!--<script type="text/javascript" src="{{asset('assets/js/jquery-2.1.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-aria.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-messages.min.js"></script> -->
    
    <!-- Angular Messages is optional for this sample -->
    <!--<script src="https://cdn.gitcdn.link/cdn/angular/bower-material/v1.1.1/angular-material.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-resource.js"></script>
    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.11.0.js"></script>-->


     <!-- Angular Material requires Angular.js Libraries -->
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-animate.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-aria.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-messages.min.js"></script>

  <!-- Angular Material Library -->
  <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
  
  <!-- Your application bootstrap  -->
  <script type="text/javascript">    
    /**
     * You must include the dependency on 'ngMaterial' 
     */
    angular.module('BlankApp', ['ngMaterial'])
    .config(function($mdIconProvider) {
    $mdIconProvider
       .iconSet('menu', '/img/ic_menu_black_24px.svg', 24)
       .defaultIconSet('/img/ic_menu_black_24px.svg', 24);
   });
    // angular.config(function($mdIconProvider) {
    //    $mdIconProvider.fontSet('md', 'material-icons');
    // });
  </script>

 <script type="text/javascript" src="{{asset('js/angular/angularApp.js')}}"></script>

</body>
</html>