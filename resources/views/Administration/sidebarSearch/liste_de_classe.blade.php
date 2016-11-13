

@extends('home')
@section('menu')

  <div class="mdl-tabs">

      <div class="row">
          <div class="mdl-tabs__panel is-active" id="enseignants-panel" ng-controller="StudentsController">
            <br>
            <div class="col-md-9 pull-left" style="padding:0px;">


              <div class="col-md-12" style="margin-top:10px;">
                <div>
                  <div class="row">
                    <div class="col-md-5">
                      <span class="pull-left" style="font-size:20px;">Liste de classe de la  {{$classroom->classroom_name}}</span>
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
                     <th>Nom et prenoms</th>
                     <th>Date de naissance</th>
                     <th></th>
                   </tr>
                 </thead>
                 <tbody ng-repeat="student in liste.slice(((currentPage-1)*itemsPerPage),
                    ((currentPage)*itemsPerPage))|orderBy:'student_name' | filter:querySearch">

                   {{-- @foreach($allTeacher as $teacher) --}}
                     <tr class="unread">
                         <td class="">@{{student.student_name }}  @{{student.student_last_name }}</td>
                         <td class="">@{{student.student_birthdate}}</td>
                         <td class="actions">
                           <div class="btn-group pull-right">

                               <a ng-href="/get_student/@{{student.classroom_id}}/@{{student.student_matricule}}" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Modifier"
                                ><i  class="fa fa-pencil" aria-hidden="true"></i>
                               </a>

                               <a ng-href="/delete_student/@{{student.student_matricule}}" class="btn btn-white-red btn-sm" title="Supprimer">
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

                     <a ng-href="{{url('/Eleves') }}" class="item"  style="margin-right:5px" title="Liste">
                        <i class="fa fa-arrow-left" aria-hidden="true"> </i>  retour à la liste de classes
                     </a>

                     <a ng-href="{{url('api/v1/Student/Liste').'/'.$classroom->id }}" class="item"  style="margin-right:5px" title="Liste">
                        <i class="fa fa-file-excel-o" aria-hidden="true"> </i>  Exporter cette liste
                     </a>
                  <div>
            </div>
          </div>
     </div>
</div>

@endsection
