@extends('templates.TemplateIndex')

@section('section-content')
  <div class="container">
    <div class="row" style="font-size:16px;">

      <form class="ui form" style="margin-left:auto;margin-right:auto" action="{{url('/teacherUpdate')}}" method="POST" enctype="multipart/form-data">
          <section id="my-properties">
              <div class="my-properties">

                <input type="hidden" name="users[id]" value="{{$user->id}}">

                  <div class="col-md-7 col-sm-10">
                    {{ csrf_field() }}


                    <h3 class="ui dividing header" style="font-size:16px;">DONNEES PERSONNELLES </h3>
                    <br>
                     
                     <div class="field">
                       <label>Nom et prenoms </label>
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
                     <br>


                      <h3 class="ui dividing header" style="font-size:16px;">DISCIPLINE(S) </h3>
                     
 
                     <div class="field" style="font-size:17px;">
                      <!--<h4 class="ui dividing header">Classes </h4>-->

                       <table >

                         <tbody>
                               @foreach($teacher_courses as $tcourses)
                                <tr>
                                      <td>
                                        <div class="checkbox">
                                         <label><input type="checkbox" name="deletecourse[]" value="{{$tcourses->courseid}}">
                                           Selectionner  {{$tcourses->course_name }} afin de la retirer  </label>
                                       </div>
                                      </td>
                                </tr>
                              @endforeach
                        </tbody>
                     </table>

                     </div>

                       <div class="field">
                   <div class="fields">

                     <div class="sixteen wide field">
                       <label> Ajouter de nouvelles discplines </label>
                       <select name="addcourse[]" multiple>
                         @foreach($courses as $course)
                             <option value="{{$course->id}}">
                               {{$course->course_name}}
                             </option>
                         @endforeach
                        </select>
                     </div>

                   </div>
                 </div>

                      
                     <h3 class="ui dividing header" style="font-size:16px;">CLASSE(S) </h3>
                     
 
                     <div class="field" style="font-size:17px;">
                      <!--<h4 class="ui dividing header">Classes </h4>-->

                       <table >

                         <tbody>
                               @foreach($teacher_classroom as $tclassrooms)
                                <tr>
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

                     <div class="sixteen wide field">
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

                  <!--<h4 class="ui dividing header">Professeur principal</h4>-->

                   @if($isProfprinc)
                     <br>

                     <h3 class="ui dividing header" style="font-size:16px;">CLASSE(S) DU PROFESSEUR PRINCIPAL</h3>
                     {{-- <input type="hidden" name="pp_new[pp_count]" value="{{$isProfprinc}}"> --}}

                     <div class="field">
                        <table>
                         <tbody>
                               @foreach($prof_pricinpal as $ppclassrooms)
                                <tr>
                                      <td>
                                        <div class="checkbox">
                                         <label><input type="checkbox" name="deleteclassroompp[]" value="{{$ppclassrooms->id}}">
                                           Selectionner la {{$ppclassrooms->classroom_name }} afin de la retirer de sa liste de classes </label>
                                        </div>
                                      </td>
                                </tr>
                              @endforeach
                        </tbody>
                     </table>

                     </div>

                     <div class="field">
                       <div class="fields">
                         <div class="sixteen wide field">
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
                          <a  class="ui button active" href="#pp" class="btn btn-info" data-toggle="collapse" style="font-size:16px;">Est il professeur principal ?</a>
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

                   <br>

                    <div class="btn-group pull-right">
                      <input class="btn btn-primary" type="submit" name="name" value="Poster les modifications" style="margin-right:5px;font-weight:bold;">
                      <!--<input class="btn btn-warning" type="submit" name="name" value="Annuler" style="font-weight:bold;">-->

                      <a class="btn btn-warning" href="{{url('/home')}}" class="item" style="margin-right:5px" title="" style="font-weight:bold;">
                       &nbsp;Annuler
                     </a>
                  </div>
                </div><!-- /.col-md-9 -->
        </div><!-- /.my-properties -->
        <!-- end My Properties -->
        </section><!-- /#my-properties -->
        </form>
    <!-- end My Properties -->

    </div>
  </div>
  <br><br><br>
@endsection
