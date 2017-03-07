(function(){
 'use stric';

  var LMJFBouakeApp = angular.module('LMJFBouakeApp', [ 'ui.bootstrap',
                                                        'ngResource', 
                                                        'ngMaterial'
                                                      ]);


  //
  LMJFBouakeApp.config(['$interpolateProvider', '$locationProvider', '$resourceProvider',
      function($interpolateProvider, $locationProvider, $resourceProvider, mdIconProvider) {

          // $interpolateProvider.startSymbol('{>');
          // $interpolateProvider.endSymbol('<}');

          // Don't strip trailing slashes from calculated URLs
          $resourceProvider.defaults.stripTrailingSlashes = false;

          $locationProvider.html5Mode({ enabled: true,   requireBase: false });

      }
    
  ]);


  LMJFBouakeApp.factory('EvaluationsService',['$resource', function($resource){
      var url  = '/api/v1/evaluations/:trimester/:classroom';
      return $resource(url , {
        trimester: 'trimester',
        classroom: 'classroom'
      });
  }]);

  LMJFBouakeApp.factory('ListeStudentByClassroomService',['$resource', function($resource){
      var url  = '/api/v1/liste/:classroom';
      return $resource(url , { classroom: 'classroom'});
  }]);


  LMJFBouakeApp.factory('GradeService',['$resource', function($resource){

      var url  = '/api/v1/grade';
      return $resource(url , {});
  }]);

  LMJFBouakeApp.controller("EnseingnantController", ['$scope', '$http', function($scope,  $http){

    var url = '/home/ListeEnseignant';

    $scope.teachers = [];

    $http.get(url).then(function(response, status) {
           $scope.teachers = response.data;
           // console.log(response);
           $scope.totalItems = $scope.teachers.length;

    }).then(function(response) {
            // console.log(response);
            // alert('This is embarassing. An error has occured. Please check the log for details');
    });

    $scope.currentPage = 1;
    $scope.itemsPerPage = 10;

    $scope.setPage = function (pageNo) {
      $scope.currentPage = pageNo;
    };

    // "{{url('api/vi/liste')}}"

    $scope.listeProfesseur = function(){

      var url = '/api/vi/listeProfesseur';
      var loading = true;

      $http.get(url).then(function(response, status) {
          //   var loading = false;
          //   $scope.teachers = response.data;
          //   $scope.totalItems = $scope.teachers.length;
          console.log(response.status);

      }).then(function(response) {
              // console.log(response);
              // alert('This is embarassing. An error has occured. Please check the log for details');
      });

    }

  }]);


  LMJFBouakeApp.controller("StudentsController", ['$scope', '$http', function($scope,  $http){

      var url = '/api/v1/eleves';

      $scope.students = [];

      $http.get(url).then(function(response, status) {
             $scope.students = response.data;
             $scope.totalClasse = $scope.students.length;

      }).then(function(response) {
              // console.log(response);
              // alert('This is embarassing. An error has occured. Please check the log for details');
      });


      // Liste de classe
      var url = '/api/v1/classe/liste';
      $scope.liste = [];
      $http.get(url).then(function(response, status) {
             $scope.liste = response.data;
            //  console.log($scope.liste);
             $scope.totalItems = $scope.liste.length;

      }).then(function(response) {
              // console.log(response);
              // alert('This is embarassing. An error has occured. Please check the log for details');
      });


      $scope.currentPage = 1;
      $scope.itemsPerPage = 10;

      $scope.setPage = function (pageNo) {
        $scope.currentPage = pageNo;
      };

  }]);
  //
  LMJFBouakeApp.controller("EvaluationsController", ['$scope', '$http', 
     'EvaluationsService', 'GradeService', function($scope,  $http,
      EvaluationsService , GradeService) {


      $scope.grades = {};
      GradeService.query().$promise.then(function(data)
      { 
        $scope.grades = data;
        $scope.totalGradeItems = $scope.grades.length;
        console.log(data);
      },
      function(error){});



      $scope.showListeClassroom = new Boolean(false);

      $scope.trimestersValue = function(trimestre){
          if (trimestre == '1er trimestre') {
              return  true;
          } else if (trimestre == '2e trimestre') {
              return  true;
          }
      }

      $scope.getCourseTests = function(trimestre, classroom){

          $scope.evaluations = {};
          EvaluationsService.query({trimester: $scope.trimestre, classroom:$scope.classroom})
          .$promise.then(function(data){ $scope.evaluations = data;
            $scope.totalItems = $scope.evaluations.length;
            console.log(data);},
            function(error){console.log(error); });
      }


      $scope.getStudentListe = function(classroom){

        console.log('got liste');

          // $scope.liste_student = {};
          // ListeStudentByClassroomService.query({classroom:$scope.classroom})
          // .$promise.then(function(data){ 
          //   $scope.liste_student = data;
          //   console.log(data); 

          //  },
          //  function(error){console.log(error); });
      }




      $scope.currentPage = 1;
      $scope.itemsPerPage = 10;

      $scope.setPage = function (pageNo) {
        $scope.currentPage = pageNo;
      };



  }]);

 })();
