@extends('layouts.app')

@section('content')
<div class="container">

 @if(Auth::user()->hasRole('Admin'))

<div class="content-wrapper">

<div class="row">
  {{-- <div class="col-md-8">
      <h1 class="ui header">Anneé académique {{$aYear->academicYear}}</h1>
  </div> --}}
</div>
<div class="row ui">

      <div class="col-md-12" style="margin-bottom:20px;">
          @yield('menu')
       </div>

       @endif


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


@endsection
