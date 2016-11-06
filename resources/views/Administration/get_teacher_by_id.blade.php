@extends('templates.TemplateIndex')

@section('section-content')
  <div class="container">
    <div class="row">

      <form class="ui form" style="margin-left:auto;margin-right:auto" action="{{url('/teacherUpdate')}}" method="POST" enctype="multipart/form-data">
          <section id="my-properties">
              <div class="my-properties">

                <input type="hidden" name="users[id]" value="{{$user->id}}">

                  <div class="col-md-7 col-sm-10">
                    {{ csrf_field() }}

                     <div class="field">
                       <label>Nom & Prenoms </label>
                       <div class="two fields">
                            <div class="field">
                              <input name="users[user_name]" value="{{$user->user_name}}" type="text">
                            </div>
                            <div class="field">
                              <input name="users[user_last_name]" value="{{$user->user_last_name}}" type="text">
                            </div>
                       </div>
                     </div>
                     <div class="field">
                       <label>Contacts</label>
                       <div class="fields">
                         <div class="ten wide field">
                                 <input name="users[email]" value="{{$user->email}}" type="text">
                               </div>
                               <div class="six wide field">
                                 <input name="users[user_contact]" value="{{$user->user_contact}}" type="text">
                               </div>
                       </div>
                     </div>

                     <h4 class="ui dividing header">Classes </h4>
                     <div class="field">

                       <table class="ui table">

                         <tbody>
                               @foreach($teacher_classroom as $tclassrooms)
                                <tr class="unread">
                                      <td style="width:30%">{{$tclassrooms->classroom_name}}</td>
                                      <td style="width:60%; padding-right:10px;">
                                        <div class="checkbox pull-right">
                                         <label><input type="checkbox" name="deletecassroom[]" value="{{$tclassrooms->id}}">
                                           Selectionner la {{$tclassrooms->classroom_name }} pour la supprimer </label>
                                       </div>
                                      </td>
                                </tr>
                              @endforeach
                        </tbody>
                     </table>

                     </div>

                 <div class="field">
                   <div class="fields">

                     <div class="eight wide field">
                       <label> Ajouter de nouvelles classes </label>
                       <select name="addclassroom[]" multiple>
                         @foreach($classrooms as $classroom)
                             <option value="{{$classroom->id}}">
                               {{$classroom->classroom_name}}
                             </option>
                         @endforeach
                        </select>
                     </div>

                   </div>
                 </div>

                  <h4 class="ui dividing header">Professeur principal</h4>

                   @if($isProfprinc)
                     {{-- <input type="hidden" name="pp_new[pp_count]" value="{{$isProfprinc}}"> --}}

                     <div class="field">
                        <table class="ui table">
                         <tbody>
                               @foreach($prof_pricinpal as $ppclassrooms)
                                <tr class="unread">
                                      <td style="width:30%">{{$ppclassrooms->classroom_name}}</td>
                                      <td style="width:60%; padding-right:10px;">
                                        <div class="checkbox pull-right">
                                         <label><input type="checkbox" name="deleteclassroompp[]" value="{{$ppclassrooms->id}}">
                                           Selectionner la {{$ppclassrooms->classroom_name }} pour la supprimer </label>
                                       </div>
                                      </td>
                                </tr>
                              @endforeach
                        </tbody>
                     </table>

                     </div>

                     <div class="field">
                       <div class="fields">
                         <div class="eight wide field">
                           <label>Ajouter de nouvelles classes</label>
                           <select name="addclassroompp[]" multiple>
                             @foreach($classrooms as $classroom)
                                 <option value="{{$classroom->id}}">
                                   {{$classroom->classroom_name}}
                                 </option>
                             @endforeach
                            </select>
                         </div>

                       </div>
                     </div>

                   @else

                     <div class="field">
                          <a  class="ui button active" href="#pp" class="btn btn-info" data-toggle="collapse">Est il professeur principal ?</a>
                     </div>

                     <div id="pp" class="field collapse">
                       <div class="field">
                           {{-- <div class="ui checkbox">
                             <input name="prof_principal" type="checkbox" tabindex="0" class="hidden">
                             <label></label>
                           </div> --}}

                          <div class="radio">
                            <label><input type="radio" value="1" name="prof_principal">Oui</label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" value="0" name="prof_principal">Non</label>
                          </div>

                          </div>
                          <label>Selectionner ses classes</label>
                          <select name="classroomidpp[]" multiple>
                            @foreach($classrooms as $classroom)
                                <option value="{{$classroom->id}}">
                                  {{$classroom->classroom_name}}
                                </option>
                            @endforeach
                           </select>
                     </div>
                   @endif
                   <div class="field">
                      <input class="ui primary button right floated" type="submit" name="name" value="Poster le formulaire">
                   </div>
                =</div><!-- /.col-md-9 -->
        </div><!-- /.my-properties -->
        <!-- end My Properties -->
        </section><!-- /#my-properties -->
        </form>
    <!-- end My Properties -->

    </div>
  </div>
  <br><br><br>
@endsection
