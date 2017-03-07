{{-- @extends('templates.TemplateIndex') --}}
@extends('templates.TemplateIndex')

@section('section-content')

  <div class="container">
    <div class="row"  style="font-size:16px;">

      <form class="ui form" style="margin-left:auto;margin-right:auto" action="{{url('/addTeacher')}}"
            role="form" method="POST" enctype="multipart/form-data">
    <section id="my-properties">
      <div class="my-properties">
        {{-- <div class="col-md-2 col-sm-10 pull-right">
            <label class="text-center">Photo de profile</label>
            <img class="ui small image" src="{{asset('img/users.png')}}" id="divUpload" style="cursor:pointer; border:1px dashed">
         <input type="file" name="avatar" id="hidde-new-file" style="display: none">
        </div> --}}

         
          <div class="col-md-7 col-sm-10">
            {{ csrf_field() }}

             <h3 class="ui dividing header" style="font-size:16px;">DONNEES PERSONNELLES</h3>


             <div class="field">
               <label>Nom et prenoms </label>
               <div class="two fields">
                 <div class="field">
                   <input name="teacherFirstName" placeholder="Nom" type="text" value="{{ old('teacherFirstName') }}">
                 </div>
                 <div class="field">
                   <input name="teacherLastName" placeholder="Prenoms" type="text" value="{{ old('teacherLastName') }}">
                 </div>
               </div>
             </div>
             <div class="field">
               <label>Contacts</label>
               <div class="fields">
                 <div class="ten wide field">
                   <input name="teacherEmail" placeholder="Email" type="text" value="{{ old('teacherEmail') }}">
                 </div>
                 <div class="six wide field">
                   <input name="teacherContact" placeholder="Telephone" type="text" value="{{ old('teacherContact') }}">
                 </div>
               </div>
             </div>

             {{-- <div class="field">
               <label>Paramètres de connexion</label>
               <div class="fields">
                 <div class="nine wide field">
                   <input name="email" placeholder="< Email ou telephone > comme nom d'utilisateur" type="text">
                 </div>
                 <div class="seven wide field">
                   <input name="password" placeholder=" < lmjf > est mot de passe par defaut" type="password">
                 </div>
               </div>
             </div> --}}
             <br>

            <h3 class="ui dividing header" style="font-size:16px;">DISCIPLINES</h3>
           
             <div class="field">
               <div class="fields">
                 <div class="sixteen wide field">
                   <select name="courses_id[]" multiple>
                     @foreach($courses as $course)
                         <option value="{{$course->id}}">
                           {{$course->course_name}}
                         </option>
                     @endforeach
                    </select>
                 </div>

               </div>
             </div>


            <br>

            <h3 class="ui dividing header" style="font-size:16px;">CLASSES</h3>
            

             <div class="field">
               <div class="fields">
                 <div  class="sixteen wide field">
                   <select name="classrooms_id[]" multiple>
                     @foreach($classrooms as $classroom)
                         <option value="{{$classroom->id}}">
                           {{$classroom->classroom_name}}
                         </option>
                     @endforeach
                    </select>
                 </div>
               </div>
             </div>

             {{-- <div class="field">
                  <a  class="ui button active" href="#pp" class="btn btn-info" data-toggle="collapse">Est il professeur principal ?</a>
             </div> --}}

              <br>

            <h3 class="ui dividing header" style="font-size:16px;">CLASSE(S) DU PROFESSEUR PRINCIPAL</h3>


             <!--<div class="field">
                  <label>Professeur principal</label>
             </div>-->

             <div class="field">
               <div class="field">
                   {{-- <div class="ui checkbox">
                     <input name="prof_principal" type="checkbox" tabindex="0" class="hidden">
                     <label></label>
                   </div> --}}

                  <div class="inline">
                    <label>Le professeur est il professeur principal ?</label>
                  </div>

                  <div class="radio-inline">
                    <label><input type="radio" value="1" name="prof_principal" ng-model="classepp">Oui</label>
                  </div>
                  <div class="radio-inline">
                    <label><input type="radio" value="0" name="prof_principal" ng-model="classepp">Non</label>
                  </div>

                  </div>

                  <div ng-show="classepp == '1'">

                    <label>Selectionner ses classes</label>
                    <select name="ClassRoomID-pp[]" multiple>
                      @foreach($classrooms as $classroom)
                          <option value="{{$classroom->id}}">
                            {{$classroom->classroom_name}}
                          </option>
                      @endforeach
                    </select>
                  
                  </div>
                  
             </div>

            <br><br>
               <div class="btn-group pull-right">
                  <input class="btn btn-primary" type="submit" name="name" value="Poster le formulaire" style="margin-right:5px;font-weight:bold;">
                  
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
@endsection
