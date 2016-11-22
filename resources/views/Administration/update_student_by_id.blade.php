@extends('home')

@section('menu')
  <div class="container">
    <div class="row" style="font-size:16px;">
      <form class="ui form" action="/update_student_info" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <section id="my-properties">
        <div class="">
          {{-- <div class="col-md-2 col-sm-10 pull-right">
              <label class="text-center">Photo de profile</label>
              <img class="ui small image" src="{{asset('img/Add_user_avatar.png')}}" id="divUpload" style="cursor:pointer; border:1px dashed">
           <input type="file" name="avatar" id="hidde-new-file" style="display: none">
          </div> --}}


      
         <div class="col-md-7">
               <span class="pull-left" style="font-size:20px;">Données de l'élève </span>
         </div>

         <br>
          
        <div class="col-md-7">
               <div class="field">
                 <!--<label style="font-size:17px;">Données de l'élève </label>-->
                 <input type="hidden" name="studentDatas[student_id]" value="{{$student->id}}" type="text">
                 <div class="fields">
                   <div class="six wide field">
                     <input name="studentDatas[student_matricule]" value="{{$student->student_matricule}}" type="text">
                   </div>
                   <div class="ten wide field">
                     <input name="studentDatas[student_name]" value="{{$student->student_name}}" type="text">
                   </div>
                 </div>

                 <div class="fields">
                   <div class="ten wide field">
                     <input name="studentDatas[student_last_name]" value="{{$student->student_last_name}}" type="text">
                   </div>
                   <div class="six wide field">
                     <input name="studentDatas[student_birthdate]" value="{{$student->student_birthdate}}" type="text">
                   </div>
                 </div>
               </div>

               <div class="fields">
                 <div class="fourteen wide field">
                   <input name="studentDatas[student_birthplace]" value="{{$student->student_birthplace}}" type="text">
                 </div>
                 <div class="two wide field">
                   <input name="studentDatas[student_sexe]" value="{{$student->student_sexe}}" value="F" type="text">
                 </div>
               </div>

               <div class="two fields">
                 <div class="field">
                   <input name="studentDatas[student_regime]" value="{{$student->student_regime}}" type="text">
                 </div>
                 <div class="field">
                   <select name="studentDatas[student_affecte]">
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
                   <input name="studentDatas[student_interne]" value="{{$student->student_interne}}" type="text">
                 </div>
                 <div class="five wide field">
                   <select name="studentDatas[student_redoublant]">
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
                 <select name="studentDatas[classroom_id]">
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
                     <input name="studentRespoDatas[parent_name]" value="{{$parent->parent_name}}" type="text">
                   </div>
                   <div class="field">
                     <input name="studentRespoDatas[parent_last_name]" value="{{$parent->parent_last_name}}" type="text">
                   </div>
                 </div>

                 <div class="two fields">
                   <div class="field">
                     <input name="studentRespoDatas[parent_telephone]" value="{{$parent->parent_telephone}}" type="text">
                   </div>
                 </div>

               @endif
               

               <br><br>
               <div class="btn-group pull-right">
                  <input class="btn btn-primary" type="submit" name="name" value="Poster le formulaire" style="margin-right:5px;font-weight:bold;">
                  
                 <a class="btn btn-warning" href="{{url('/home')}}" class="item" style="margin-right:5px" title="" style="font-weight:bold;">
                       &nbsp;Annuler
                  </a>
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
