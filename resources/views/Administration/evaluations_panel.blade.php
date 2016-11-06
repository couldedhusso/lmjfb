
<div class="col-md-12" style="margin-bottom:10px;">
  <div>
      <span class="pull-left" style="font-size:20px;">Evaluations par classe</span>
      <div class="btn-group pull-right">
           <a href="{{url('saisir-les-notes/1')}}" class="btn btn-white-grey btn-sm" style="margin-right:5px" title=""><i class="fa fa-plus" aria-hidden="true"></i>
             &nbsp;Saisir les notes
           </a>

           <button type="button" data-toggle="modal" data-target="#studentgrade" class="btn btn-white-grey btn-sm show-modal" style="margin-right:5px" title=""><i class="fa fa-plus" aria-hidden="true"></i>
             &nbsp;importer les notes
           </button>

           {{-- <button type="button" class="mdl-button show-modal">Show Modal</button> --}}
       </div>
  </div>
</div>

<dialog class="mdl-dialog">
    <div class="mdl-dialog__content">
      <p>
        Allow this site to collect usage data to improve your experience?
      </p>
    </div>
    <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
      <button type="button" class="mdl-button">Agree</button>
      <button type="button" class="mdl-button close">Disagree</button>
    </div>
  </dialog>


<!-- Modal -->
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

<div class="col-md-12">

  <table class="ui orange table">

  @if($currentTrimesterEval->count() == 0)
    <tr class="unread">
      <th>classe</th>
      <th>Note sur</th>
    </tr>

  @else
   <thead>
      <tr>
        <th>classe</th>
        <th>Note sur</th>
        <th></th>
      </tr>
   </thead>
   <tbody>
     @foreach($currentTrimesterEval as $test)
       <tr class="unread">
           <td class="">{{$test->classroom_name}}</td>
           <td >{{$test->max_grade_value}}</td>
           <td class="actions">
             <div class="btn-group pull-right">
               {{-- onclick="event.preventDefault();
                        document.getElementById('modifier-teacher').submit();" --}}
                  <a href="{{url('update_student_mark').'/'.$test->id.'/'.$test->classroom_id}}" class="btn btn-white-grey btn-sm"  style="margin-right:5px" title="Modifier"
                   ><i  class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Modifier</a>

                  <a href="{{url('delete_Coursetest').'/'.$test->id}}" class="btn btn-white-red btn-sm" title="Supprimer"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                           <form id="supprimer-teacher" action="{{ url('/delete-evaluation') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                           </form>
                  {{-- <a href="{{url('notes-des-evalautions')}}" class="btn btn-white-grey btn-sm" title="Saisir les notes"><i class="fa fa-plus"></i></a> --}}
              </div>
           </td>
         </tr>
     @endforeach
   </tbody>
  @endif
</table>

</div>
