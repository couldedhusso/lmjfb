@extends('templates.TemplateIndex')

@section('section-content')
  <div class="container">
    <div class="row">
      <form class="ui form" action="/update_student_info" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <section id="my-properties">
        <div class="my-properties">
          {{-- <div class="col-md-2 col-sm-10 pull-right">
              <label class="text-center">Photo de profile</label>
              <img class="ui small image" src="{{asset('img/Add_user_avatar.png')}}" id="divUpload" style="cursor:pointer; border:1px dashed">
           <input type="file" name="avatar" id="hidde-new-file" style="display: none">
          </div> --}}
        <div class="col-md-7 col-sm-10">
               <div class="field">
                 <label>Données de l'élève </label>
                 <div class="fields">
                   <div class="six wide field">
                     <input name="studentDatas[studentMatricule]" value="{{$student->student_matricule}}" type="text">
                   </div>
                   <div class="ten wide field">
                     <input name="studentDatas[studentName]" value="{{$student->student_name}}" type="text">
                   </div>
                 </div>

                 <div class="fields">
                   <div class="ten wide field">
                     <input name="studentDatas[studentLastName]" value="{{$student->student_last_name}}" type="text">
                   </div>
                   <div class="six wide field">
                     <input name="studentDatas[studentBirthdate]" value="{{$student->student_birthdate}}" type="text">
                   </div>
                 </div>
               </div>

               <div class="fields">
                 <div class="fourteen wide field">
                   <input name="studentDatas[studentBirthPlace]" value="{{$student->student_birthplace}}" type="text">
                 </div>
                 <div class="two wide field">
                   <input name="studentDatas[studentSexe]" value="{{$student->student_sexe}}" value="F" type="text">
                 </div>
               </div>

               <div class="two fields">
                 <div class="field">
                   <input name="studentDatas[studentRegime]" value="{{$student->student_regime}}" type="text">
                 </div>
                 <div class="field">
                   <select name="studentDatas[studentAffecte]">
                     <option value="">Affecté</option>
                         @if($student->student_affecte == "NON")
                           <option selected="NON" value="NON">
                             NON
                           </option>
                           <option value="OUI">
                             OUI
                           </option>
                         @else
                           <option  value="NON">
                             NON
                           </option>
                           <option selected="OUI" value="OUI">
                             OUI
                           </option>
                         @endif

                    </select>
                 </div>
               </div>

               <div class="fields">
                 <div class="eleven wide field">
                   <input name="studentDatas[studentInterne]" value="{{$student->student_interne}}" type="text">
                 </div>
                 <div class="five wide field">
                   <select name="studentDatas[studentRedoublant]">
                       <option value="">Redoublant</option>

                       @if($student->student_redoublant == "NON")
                         <option selected="NON" value="N">
                           NON
                         </option>
                         <option value="OUI">
                           OUI
                         </option>
                       @else
                         <option value="NON">
                           NON
                         </option>
                         <option selected="OUI" value="OUI">
                           OUI
                         </option>
                       @endif

                    </select>
                 </div>
               </div>

               <div class="two fields">
                 <select name="studentDatas[classRoomID]">
                   @foreach($classrooms as $classroom)
                     @if(true)
                       <option selected="{{$classroom->classroom_name}}" value="{{$classroom->id}}">
                         {{$classroom->classroom_name}}
                       </option>
                     {{-- @else
                       <option value="{{$classroom->id}}">
                         {{$classroom->classroom_name}}
                       </option> --}}
                     @endif

                   @endforeach
                  </select>
               </div>
               @if($parent != null)
                 <h4 class="ui dividing header">Références du parent d'élève</h4>

                 <div class="two fields">
                   <div class="field">
                     <input type="hidden" name="studentRespoDatas[id]" value="{{$parent->id}}" >
                     <input name="studentRespoDatas[nom]" value="{{$parent->parent_name}}" type="text">
                   </div>
                   <div class="field">
                     <input name="studentRespoDatas[prenom]" value="{{$parent->parent_last_name}}" type="text">
                   </div>
                 </div>

                 <div class="two fields">
                   <div class="field">
                     <input name="studentRespoDatas[contact]" value="{{$parent->parent_telephone}}" type="text">
                   </div>
                 </div>

               @endif

               <br><br>
               <div class="field">
                  <input class="ui primary button right floated" type="submit" name="name" value="Poster le formulaire">
               </div>
               <br><br>
      </div><!-- /.col-md-9 -->

      </div><!-- /.my-properties -->
      <!-- end My Properties -->
      </section><!-- /#my-properties -->
      </form>
      <br><br>
      <!-- end My Properties -->
    </div>
  </div>

@endsection
