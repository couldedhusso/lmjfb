@extends('home')
@section('menu')

  <div class="mdl-tabs">
      <div class="mdl-tabs__tab-bar">
          <a href="{{url('/Enseingnants')}}" class="mdl-tabs__tab  header">Enseignants</a>
          <a href="{{url('/Eleves')}}" class="mdl-tabs__tab  header">Elèves</a>
          <a href="{{url('/Evaluations')}}" class="mdl-tabs__tab  header active">Evaluations</a>
      </div>
      <div class="row">
          <div class="mdl-tabs__panel" ng-controller="EnseingnantController">
            <br>
            <div class="col-md-9 pull-left" style="padding:0px;">

              <div class="col-md-12" style="margin-top:10px;">
                <div>
                  <div class="row">
                    <div class="col-md-4">
                      <span class="pull-left" style="font-size:20px;">Evaluations par classe</span>
                    </div>
                    <div class="col-md-8">
                      <div class="btn-group pull-right">
                        <form class="ui form form-inline">

                          <div class="form-group">
                            <select ng-model="trimestre">
                              <option value="">Trimestres</option>
                              <option value="1">1er trimestre</option>
                              <option value="0">2ème trimestre</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <select ng-model="discipline">
                              <option value="">Trimestres</option>
                              <option value="1">1er trimestre</option>
                              <option value="0">2ème trimestre</option>
                            </select>
                          </div>


                          {{-- <div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="" ng-model="querySearch">
                              <div class="input-group-addon"><i class="fa fa-search pull-right"></i></div>
                            </div>
                          </div> --}}
                        </form>


                           {{-- <a href="{{url('ajouter-un-professeur')}}" class="btn btn-white-grey btn-sm" style="margin-right:5px" title=""><i class="fa fa-plus" aria-hidden="true"></i>
                             &nbsp;Ajouter un enseingnant
                           </a> --}}

                           {{-- <a href="{{url('ajouter-un-professeur')}}" class="btn btn-white-green btn-sm" style="margin-right:5px" title=""><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                             &nbsp; liste des enseignants
                           </a>  --}}

                           {{-- <button onclick="event.preventDefault();
                                     document.getElementById('search-teacher').submit()" class="btn btn-white-grey btn-sm" title="Recherche dans la base des professeurs"><i class="fa fa-binoculars"></i>
                           </button> --}}
                       </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-md-12" style="margin-top:10px;">
                <table class="ui orange table">
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
                                <a ng-href="update_teacher_info/@{{teacher.id}}" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Modifier">
                                  <i  class="fa fa-pencil" aria-hidden="true"></i>
                                </a>

                                <a ng-href="delete_teacher/@{{teacher.id}}" class="btn btn-white-red btn-sm" title="Supprimer">
                                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>

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

                    {{-- <a href="{{url('ajouter-un-professeur')}}" class="item"  title=""><i class="fa fa-plus" aria-hidden="true"></i>
                      &nbsp;Ajouter un enseingnant
                    </a>
                    <a ng-href='/api/v1/listeProfesseur' class="item" title=""><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                      &nbsp; Liste des enseignants
                    </a> --}}

                    {{-- <a href="{{url('saisir-les-notes/1')}}" class="item" style="margin-right:5px" title=""><i class="fa fa-plus" aria-hidden="true"></i>
                      &nbsp;Saisir les notes
                    </a> --}}

                    <button type="button" data-toggle="modal" data-target="#studentgrade" class="item" style="margin-right:5px" title=""><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                      &nbsp;importer les notes
                    </button>
                </div>
            </div>
</div>


</div>
</div>


@endsection

<div id="studentgrade" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form class="ui form" style="margin-left:auto;margin-right:auto" action="{{url('/import-note-d-evaluations')}}" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Import des notes d'évluations</h4>
        </div>
        <div class="modal-body">
            {{ csrf_field() }}
            <input type="file" name="notes">

        </div>
        <div class="modal-footer">
          <div class="field">
              <input class="ui button right floated" type="submit" name="name" value="Matière" style="font-size:100%">
          </div>
          {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
        </div>
      </form>
    </div>

  </div>
</div>


{{-- <div class="col-md-12" style="margin-bottom:10px;">
  <div>
      <span class="pull-left" style="font-size:20px;"></span>
      <div class="btn-group pull-right">
           <a href="{{url('saisir-les-notes/1')}}" class="btn btn-white-grey btn-sm" style="margin-right:5px" title=""><i class="fa fa-plus" aria-hidden="true"></i>
             &nbsp;Saisir les notes
           </a>

           <button type="button" data-toggle="modal" data-target="#studentgrade" class="btn btn-white-grey btn-sm show-modal" style="margin-right:5px" title=""><i class="fa fa-file-excel-o" aria-hidden="true"></i>
             &nbsp;importer les notes
           </button>

           {{-- <button type="button" class="mdl-button show-modal">Show Modal</button>
       </div>
  </div>
</div> --}}
