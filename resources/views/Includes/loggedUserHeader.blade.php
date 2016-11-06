<div class="mdl-layout__header-row">
  {{-- <span class="mdl-layout-title">Title</span> --}}
<!-- Add spacer, to align navigation to the right -->
  <span class="android-title mdl-layout-title">
    LMJFB | Espace Numérique de Travail
    {{-- <img class="android-logo-image" src="img/logolmjf.png"> --}}
  </span>
  <!-- Add spacer, to align navigation to the right in desktop -->
  <div class="android-header-spacer mdl-layout-spacer"></div>

  <!-- Navigation -->
  <div class="android-navigation-container">
    <nav class="android-navigation mdl-navigation">
      <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Enseingnants</a>
      <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Elèves</a>
      <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Evaluations</a>
    </nav>
  </div>
  {{-- <span class="android-mobile-title mdl-layout-title">
    LMJFB | ENT
  </span> --}}
  <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
    <i class="material-icons">more_vert</i>
  </button>
  <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
    <li class="mdl-menu__item">
      <span>Bob Odenkirk</span>
    </li>
    <li class="mdl-menu__item">
      <a href="#">Se deconnecter</a>
    </li>
  </ul>
</div>
