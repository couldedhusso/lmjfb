@extends('layouts.app')


@section('content')
<div class="container">

  
  @if(Auth::user()->hasRole('Admin'))

 
    <div class="content-wrapper">
  
      <div class="row ui">
              <div class="col-md-12" style="margin-bottom:20px;">
                  @yield('menu')
              </div>

              <form id="search-stud" action="{{ url('/get-search-form') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              <input type="hidden" name="search-key" value="Student">
              </form>

              <form id="search-teacher" action="{{ url('/get-search-form') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              <input type="hidden" name="search-key" value="Teacher">
              </form>

              {{-- <div class="btn-group pull-right floating-action-button" style="boder:1px solid">
                    <button  onclick="event.preventDefault();
                            document.getElementById('search-stud').submit()" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Recherche dans la base des élèves"><i class="fa fa-search" aria-hidden="true"></i></button>


                    <button onclick="event.preventDefault();
                            document.getElementById('search-teacher').submit()" class="btn btn-white-grey btn-sm" title="Recherche dans la base des professeurs"><i class="fa fa-search"></i></button>
              </div> --}}
        </div>
    </div>
  @endif


</div>

<br><br><br>

<div class="container">

          <footer style="background-colour:inherit">

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
          </footer>
  </div>

@endsection


 
