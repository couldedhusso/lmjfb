@extends('templates.TemplateIndex')

@section('section-content')
  {{-- <div class="col-md-3 col-sm-2">
      <section id="sidebar">
          <header><h3>Espace administrateur</h3></header>
          @include('layouts.sidebar-admin')
      </section><!-- /#sidebar -->
  </div><!-- /.col-md-3 --> --}}
  <!-- My Properties -->
<form class="ui form" action="/studReg" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
<section id="my-properties">
  <div class="my-properties">
    {{-- <div class="col-md-2 col-sm-10 pull-right">
        <label class="text-center">Photo de profile</label>
        <img class="ui small image" src="{{asset('img/Add_user_avatar.png')}}" id="divUpload" style="cursor:pointer; border:1px dashed">
     <input type="file" name="avatar" id="hidde-new-file" style="display: none">
    </div> --}}
  <div class="col-md-7 col-sm-10" style="font-size:16px;">

   <h3 class="ui dividing header" style="font-size:16px;">DONNEES DE L'ELEVE  </h3>

         <input type="hidden" name="studentDatas[anneeScolaire]" value="{{$aYear->academic_year}}">
         <div class="field">
           <div class="fields">
             <div class="six wide field">
               <input name="studentDatas[matricule]" placeholder="Matricule" type="text">
             </div>
             <div class="ten wide field">
               <input name="studentDatas[nom]" placeholder="Nom" type="text">
             </div>
           </div>

           <div class="fields">
             <div class="ten wide field">
               <input name="studentDatas[prenoms]" placeholder="Prenoms" type="text">
             </div>
             <div class="six wide field">
               <input name="studentDatas[birthdate]" placeholder="Date de naissance" type="text">
             </div>
           </div>
         </div>

         <div class="fields">
           <div class="fourteen wide field">
             <input name="studentDatas[birthplace]" placeholder="Lieu de naissance" type="text">
           </div>
           <div class="two wide field">
             <input name="studentDatas[sexe]" placeholder="Feminin" value="F" type="text">
           </div>
         </div>

         <div class="two fields">
           <div class="field">
             <input name="studentDatas[regime]" placeholder="Regime" type="text">
           </div>
           <div class="field">
             <select name="studentDatas[affecte]">
               <option value="">Affecté(e)</option>
                   <option value="NON">
                     NON
                   </option>
                   <option value="OUI">
                     OUI
                   </option>
              </select>
           </div>
         </div>

         <div class="fields">
           <div class="eleven wide field">
             <input name="studentDatas[interne]" placeholder="Interne" type="text">
           </div>
           <div class="five wide field">
             <select name="studentDatas[doublant]">
               <option value="">Redoublant</option>
                   <option value="0">
                     NON
                   </option>
                   <option value="1">
                     OUI
                   </option>
              </select>
           </div>
         </div>

         <div class="two fields">
           <select name="studentDatas[classroom]">
             @foreach($classrooms as $classroom)
                 <option value="{{$classroom->id}}">
                   {{$classroom->classroom_name}}
                 </option>
             @endforeach
            </select>
         </div>

          <br>
          <h3 class="ui dividing header" style="font-size:16px;">REFERENCES DU PARENT D'ELEVE </h3>

          <!--<h4 class="ui dividing header">Références du parent d'élève</h4>-->

          <div class="two fields">
            <div class="field">
              <input name="studentRespoDatas[nom]" placeholder="Nom" type="text">
            </div>
            <div class="field">
              <input name="studentRespoDatas[prenom]" placeholder="prenoms" type="text">
            </div>
          </div>

          <div class="two fields">
            <div class="field">
              <input name="studentRespoDatas[contact]" placeholder="Contact Telephonique" type="text">
            </div>
          </div>

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

@endsection
