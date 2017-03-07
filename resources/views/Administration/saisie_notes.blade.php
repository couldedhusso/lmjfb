@extends('templates.TemplateIndex')

@section('section-content')

  <div class="container" ng-controller="EvaluationsController">
    <div class="row"  style="font-size:16px;">

      <form class="ui form" style="margin-left:auto;margin-right:auto"  action="{{url('/api/v1/post/grades')}}"
        role="form" method="POST">
        <section id="my-properties">
        <div class="my-properties">

          <input type="hidden" name="grade[trimestre_id]" value="{{$newTest->trimestre_id}}">
          <input type="hidden" name="grade[test_id]" value="{{$newTest->id}}">
         
          <div class="col-md-7 col-sm-10">
            {{ csrf_field() }}

             <h3 class="ui dividing header" style="font-size:16px;">REFERENCE DU TEST </h3>

             <div class="field">

              
               <div class="fields">
               
                 <div class="six wide field">
                    <label>Trimestre </label>
                    <input type="text" value="{{$trimestre->trimestre_description}}" readonly>    
                 </div>

                 
                 <div class="seven wide field">
                   <label>Nom de l'évaluation </label>
                   <input type="text" value="{{$newTest->test_name}}" readonly >
                 </div>

                 
                 <div class="three wide field">
                    <label>Valeur max.</label>
                    <input  type="text" value="{{$newTest->max_grade_value}}" readonly >
                 </div>
               </div>
             </div>

             <div class="field">
              
               <div class="fields">
                 <div class="six wide field">
                    <label>Classe</label>
                    <input  type="text" value="{{$classroom->classroom_name}}" readonly >
                
                 </div>

                 <div class="ten wide field">
                      <label>Discipline</label>
                      <input type="text" value="{{$course_childs}}" readonly>    
                    </select>
                 </div>
               </div>
             </div>

             <br>

            <h3 class="ui dividing header" style="font-size:16px;">LISTE DE CLASSE </h3>
           
             
            <div class="fields">
               <div class="sixteen wide field" style="font-size:14px;">

                    <table class="ui table">

                                     {{-- <table class="table table-hover table-mail"> --}}
                                       <thead class="unread">
                                          <tr>
                                            <th>Matricule</th>
                                            <th>Nom et prenoms</th>
                                            <th>Note</th>
                                          </tr>
                                       </thead>
                                       <tbody>

                                           @foreach($students as $student)
                                            {{--@foreach($classe->Student as $stud) --}}
                                               <tr>
                                                   <td width="20%" class="">{{$student->student_matricule}}</td>
                                                   <td width="65%" class="">{{$student->student_name.' '.$student->student_last_name}} </td>
                                                   <td width="15%" class="">
                                          
                                                     <input type="number" min="0" max="{{$newTest->max_grade_value}}" name="studentsGrade[{!!$student->id!!}]" required>
                                                   </td>
                                               </tr>
                                             @endforeach 
                                       </tbody>
                                   </table>
                   
                </div>
            </div>
         
            <br><br>
               <div class="btn-group pull-right">
                  <input class="btn btn-primary" type="submit" name="name" value="Poster le formulaire" style="margin-right:5px;font-weight:bold;">
                  
                 <a class="btn btn-warning" href="{{url('/Evaluations')}}" class="item" style="margin-right:5px" title="" style="font-weight:bold;">
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
