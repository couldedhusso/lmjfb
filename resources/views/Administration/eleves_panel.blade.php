@extends('home')
@section('menu')

  <div class="mdl-tabs">
      <div class="mdl-tabs__tab-bar">
          <a href="{{url('/Enseingnants')}}" class="mdl-tabs__tab  header">Enseignants</a>
          <a href="{{url('/Eleves')}}" class="mdl-tabs__tab  header active">Elèves</a>
          <a href="{{url('/Evaluations')}}" class="mdl-tabs__tab  header">Evaluations</a>
      </div>
      <div class="row">
          <div class="mdl-tabs__panel is-active" id="enseignants-panel" ng-controller="StudentsController">
            <br>
            <div class="col-md-9 pull-left" style="padding:0px;">


              <div class="col-md-12" style="margin-top:10px;">
                <div>
                  <div class="row">
                    <div class="col-md-5">
                      <span class="pull-left" style="font-size:20px;">Liste de classes</span>
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

                           <button  onclick="event.preventDefault();
                                document.getElementById('search-stud').submit()" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Recherche dans la base des élèves">
                                <i class="fa fa-binoculars" aria-hidden="true"></i>
                           </button>
                       </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-md-12" style="margin-top:10px;">
                <table class="ui orange table">

                 <thead>
                   <tr class="unread">
                     <th>Classe</th>
                      <th>Effectif de la classe</th>
                     <th></th>
                   </tr>
                 </thead>
                 <tbody ng-repeat="student in students.slice(((currentPage-1)*itemsPerPage),
                    ((currentPage)*itemsPerPage))|orderBy:'effectif' | filter:querySearch">

                   {{-- @foreach($allTeacher as $teacher) --}}
                     <tr class="unread">

                         <td class="">@{{student.classroom_name}}</td>
                         <td >@{{student.effectif}}</td>
                         <td class="actions">
                           <div class="btn-group pull-right">

                               <a ng-href="liste/classe/@{{student.classroom_id}}" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Modifier"
                                ><i  class="fa fa-pencil" aria-hidden="true"></i>
                               </a>

                               <a ng-href="api/v1/Student/Liste/@{{student.classroom_id}}" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Liste">
                                  <i class="fa fa-file-excel-o" aria-hidden="true"> </i>
                               </a>

                               <a ng-href="delete_classroom/@{{student.classroom_id}}" class="btn btn-white-red btn-sm" title="Supprimer">
                                 <i class="fa fa-trash-o" aria-hidden="true"> </i>
                               </a>

                            </div>
                         </td>
                       </tr>
                 </tbody>
              </table>

              <pagination total-items="totalItems" ng-model="currentPage"  class="ui pagination menu" items-per-page="itemsPerPage" style="font-size:90%"></pagination>


              </div>

            </div>
            <div class="col-md-3 contexttuel">

                   <div class="ui secondary vertical pointing menu" style="width:100%; font-size:100%;">

                     <a href="{{url('ajouter-un-eleve')}}" class="item" style="margin-right:5px" title=""><i class="fa fa-plus" aria-hidden="true"></i>
                       &nbsp;Ajouter un élève
                     </a>
                    {{-- <a ng-href='/api/v1/listeProfesseur' class="item" title=""><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                      &nbsp; Liste des enseignants
                    </a> --}}

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
