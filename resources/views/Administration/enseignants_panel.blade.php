@extends('home')
@section('menu')

  <div class="mdl-tabs">
      <div class="mdl-tabs__tab-bar">
          <a href="{{url('/Enseingnants')}}" class="mdl-tabs__tab  header active">Enseignants</a>
          <a href="{{url('/Eleves')}}" class="mdl-tabs__tab  header">Elèves</a>
          <a href="{{url('/Evaluations')}}" class="mdl-tabs__tab  header">Evaluations</a>
      </div>
      <div class="row">
          <div class="mdl-tabs__panel is-active" id="enseignants-panel" ng-controller="EnseingnantController">
            <br>
            <div class="col-md-9 pull-left" style="padding:0px;">

              {{-- TODO : Enseingnants :  Lier les classes aux profs et faire une bare de recherche unique -> saisir la disciple ou la classe
              modal qui permet de modifier les infos du prof sur la meme page etc
              exporter les nattes et les notes d' une classe ...

              TODO : Elèves :  Lier les students aux  classes, aux cycle et etc ...  faire une bare de recherche unique -> saisir la disciple ou la classe
              modal qui permet de modifier les infos de l élève sur la meme page etc
              afficher les graphes(soon) ...

              TODO : Evaluqtions : appliquer un filtre sur les notes recuperer les notes d'une classe
              et autres ... --}}

              {{-- <pagination total-items = "teachers.length" ng-model="currentPage" items-per-page="pageSize"></pagination> --}}

              <div class="col-md-12" style="margin-top:10px;">
                <div>
                  <div class="row">
                    <div class="col-md-5">
                      <span class="pull-left" style="font-size:20px;">Liste des professeurs</span>
                    </div>
                    <div class="col-md-7">
                      <div class="btn-group pull-right">
                        {{-- <form class="ui form">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="" ng-model="querySearch">
                              <div class="input-group-addon"><i class="fa fa-search pull-right"></i></div>
                            </div>
                          </div>
                        </form> --}}


                           {{-- <a href="{{url('ajouter-un-professeur')}}" class="btn btn-white-grey btn-sm" style="margin-right:5px" title=""><i class="fa fa-plus" aria-hidden="true"></i>
                             &nbsp;Ajouter un enseingnant
                           </a> --}}

                           {{-- <a href="{{url('ajouter-un-professeur')}}" class="btn btn-white-green btn-sm" style="margin-right:5px" title=""><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                             &nbsp; liste des enseignants
                           </a>  --}}

                           <button onclick="event.preventDefault();
                                     document.getElementById('search-teacher').submit()" class="btn btn-white-grey btn-sm" title="Recherche dans la base des professeurs"><i class="fa fa-binoculars"></i>
                           </button>
                       </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-md-12" style="margin-top:10px;">
                <table class="ui orange table">

                {{-- @if($allTeacher->count() == 0)
                  <tr class="unread">
                    <th>Nom & prenoms</th>
                    <th>Contact</th>
                    <th>Discipline</th>
                  </tr>

                @else --}}
                 <thead>
                    <tr>
                      <th>Nom & prenoms</th>
                       <th>Contact</th>
                      <th>Discipline</th>
                      <th></th>
                    </tr>
                 </thead>
                 <tbody ng-repeat="teacher in teachers.slice(((currentPage-1)*itemsPerPage),
                    ((currentPage)*itemsPerPage))|orderBy:'user_name' | filter:querySearch">

                   {{-- @foreach($allTeacher as $teacher) --}}
                     <tr class="unread">
                         {{-- <td class="">{{$teacher->user_name .' '.$teacher->user_last_name}}</td> --}}
                         <td class="">@{{teacher.user_name}} @{{teacher.user_last_name}}</td>
                         <td >@{{teacher.user_contact}} </td>
                         <td >@{{teacher.course_name}}</td>
                         <td class="actions">
                           <div class="btn-group pull-right">
                             {{-- onclick="event.preventDefault();
                                      document.getElementById('modifier-teacher').submit();" --}}

                              <a > </a>
                                <a ng-href="update_teacher_info/@{{teacher.id}}" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Modifier"
                                 ><i  class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Modifier</a>

                                <a ng-href="delete_teacher/@{{teacher.id}}" class="btn btn-white-red btn-sm" title="Supprimer"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                         {{-- <form id="supprimer-teacher" action="{{ url('/delete-teacher') }}" method="POST" style="display: none;">
                                             {{ csrf_field() }}
                                             <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                                         </form> --}}
                                {{-- <a href="{{url('notes-des-evalautions')}}" class="btn btn-white-grey btn-sm" title="Saisir les notes"><i class="fa fa-plus"></i></a> --}}
                            </div>
                         </td>
                       </tr>
                   {{-- @endforeach --}}
                 </tbody>
                {{-- @endif --}}
              </table>

              <pagination total-items="totalItems" ng-model="currentPage"  class="ui pagination menu" items-per-page="itemsPerPage" style="font-size:90%"></pagination>


              </div>

            </div>
            <div class="col-md-3 contexttuel">

                   <div class="ui secondary vertical pointing menu" style="width:100%; font-size:100%;">

                    <a href="{{url('Enregistrer/Enseingnant')}}" class="item"  title=""><i class="fa fa-plus" aria-hidden="true"></i>
                      &nbsp;Ajouter un enseingnant
                    </a>
                    <a ng-href='/api/v1/listeProfesseur' class="item" title=""><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                      &nbsp; Liste des enseignants
                    </a>

                  <div>
            </div>
          </div>

          {{-- <div class="mdl-tabs__panel" id="eleves-panel" ng-controller="EnseingnantController">
              @include('Administration.eleves_panel')
          </div>

          <div class="mdl-tabs__panel" id="evaluations-panel" ng-controller="EnseingnantController">
            @include('Administration.evaluations_panel')
          </div> --}}

          {{-- <div class="mdl-tabs__panel" id="eleves-panel">
              @include('Administration.eleves_panel')
          </div> --}}


          {{-- <div class="mdl-tabs__panel" id="classes-panel">
             @include('Administration.classes_panel')
          </div> --}}

     </div>
</div>

@endsection
