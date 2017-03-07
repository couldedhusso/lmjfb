@extends('home')
@section('menu')


<div class="col-md-9 pull-left" style="padding:0px;">
  <div class="col-md-12" style="margin-top:10px;">
      <div class="row">
        <form class="ui form form-inline" action="{{url('/update_mark')}}" method="post">
          {{ csrf_field() }}

          <input type="hidden" name="trimestre" value="{{$trimestre}}">
          <input type="hidden" name="testid" value="{{$testid}}">
          <input type="hidden" name="classromid" value="{{$classroomid}}">

        <div class="col-md-4">
          <span class="pull-left" style="font-size:20px;">Notes d' évaluation </span>
        </div>

        <div class="col-md-8">

              <div class="input-group btn-group pull-right">
                 <input style="font-size:100%" class="ui primary button right floated" type="submit" name="name" value="Mettre à jour">
              </div>

          </div>

          <div class="col-md-12">

            <table class="ui orange table" style="margin-top:10px;">
               <thead>
                  <tr>
                    <th>Matricule</th>
                    <th>Nom et prenoms</th>
                     <th>Note</th>
                  </tr>
               </thead>
               <tbody
               {{-- <tbody ng-repeat="grade in grades.slice(((currentPage-1)*itemsPerPage),
                  ((currentPage)*itemsPerPage))|orderBy:'user_name' | filter:querySearch">

                  <tr class="read">
                      <td width="20%" class="">@{{grade.student_matricule}}</td>
                      <td width="70%" class="">@{{grade.student_name}} @{{grade.student_last_name}}</td>
                      <td width="10%" class="">
                        <input type="text" value="@{{grade.grade}}" name="notes[@{{grade.student_id}}]">
                      </td>
                  </tr>
               </tbody> --}}

                 @foreach($eval as $classe)
                           <tr class="read">
                               <td width="20%" class="">{{$classe->student_matricule}}</td>
                               <td width="65%" class="">{{$classe->student_name." ".$classe->student_last_name}}</td>
                               <td width="15%" class="">
                                 <input type="number" value="{{$classe->grade}}" max="{{$testcourse->max_grade_value}}" name="notes[{{$classe->student_id}}]">
                               </td>
                           </tr>
                   @endforeach
               </tbody>
           </table>
           {{-- <pagination total-items="totalItems" ng-model="currentPage"  class="ui pagination menu" items-per-page="itemsPerPage" style="font-size:90%"></pagination> --}}

          </div>

      </form>

</div>
</div>
</div>

<div class="col-md-3 contexttuel">

       <div class="ui secondary vertical pointing menu" style="width:100%; font-size:100%;">

           <a ng-href="{{url('/Evaluations') }}" class="item"  style="margin-right:5px" title="Liste">
              <i class="fa fa-arrow-left" aria-hidden="true"> </i>  retour à la liste d'évaluations
           </a>

          <a ng-href="/api/v1/download/grades/{{$testid}}/{{$classroomid}}/{{$trimestre}}" class="item" style="margin-right:5px" title=""><i class="fa fa-download" aria-hidden="true"></i>
            &nbsp;Telecharger la liste
          </a>

          {{-- <button type="button" data-toggle="collapse" data-target="#natte" class="item" style="margin-right:5px" title=""><i class="fa fa-file-excel-o" aria-hidden="true"></i>
            &nbsp;Generer la natte de la <span>@{{classroom}}</span>
          </button> --}}

     </div>
</div>

@endsection
