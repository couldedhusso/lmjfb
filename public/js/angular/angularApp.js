// (function(){
//   // 'use stric';

  var LMJFBouakeApp = angular.module('LMJFBouakeApp', ['ui.bootstrap']);
  //
  LMJFBouakeApp.config(['$interpolateProvider', '$locationProvider',
      function($interpolateProvider, $locationProvider) {

          // $interpolateProvider.startSymbol('{>');
          // $interpolateProvider.endSymbol('<}');

          $locationProvider.html5Mode({ enabled: true,   requireBase: false });
      }
  ]);


  LMJFBouakeApp.controller("EnseingnantController", ['$scope', '$http', function($scope,  $http){

    var url = '/home/ListeEnseignant';

    $scope.teachers = [];

    $http.get(url).then(function(response, status) {
           $scope.teachers = response.data;
           console.log(response);

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
             $scope.totalItems = $scope.students.length;

      }).then(function(response) {
              // console.log(response);
              // alert('This is embarassing. An error has occured. Please check the log for details');
      });


      // Liste de classe
      var url = '/api/v1/classe/liste';
      $scope.liste = [];
      $http.get(url).then(function(response, status) {
             $scope.liste = response.data;
             console.log($scope.liste);
             $scope.totalItems = $scope.liste.length;

      }).then(function(response) {
              // console.log(response);
              // alert('This is embarassing. An error has occured. Please check the log for details');
      });


      $scope.currentPage = 1;
      $scope.itemsPerPage = 20;

      $scope.setPage = function (pageNo) {
        $scope.currentPage = pageNo;
      };

  }]);
  //
  // LMJFBouakeApp.controller("EvaluationsController", ['$scope', '$http', function($scope,  $http) {
  //
  //   var url = '/';
  //
  //   $scope.evaluations = [];
  //
  //   $http.get(url).success(function(response) {
  //          $scope.evaluations = response;
  //          $scope.totalItems = $scope.evaluations.length;
  //
  //   }).error(function(response) {
  //           // console.log(response);
  //           // alert('This is embarassing. An error has occured. Please check the log for details');
  //   });
  //
  //   $scope.currentPage = 1;
  //   $scope.itemsPerPage = 4;
  //
  //   $scope.setPage = function (pageNo) {
  //     $scope.currentPage = pageNo;
  //   };
  //
  //
  // }]);

// });
