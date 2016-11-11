(function()){
  'use stric';

	var LMJFBouake = angular.module('app', ['ui.bootstrap']);

	LMJFBouake.config(['$interpolateProvider', '$locationProvider',
	    function($interpolateProvider, $locationProvider) {
	        $locationProvider.html5Mode({
	          enabled: true,
	          requireBase: false
	        });
	    }
	]);


	LMJFBouake.controller("EnseingnantController", ['$scope', '$http', function($scope,  $http){

	  var url = '/ListeEnseignant';

	  $scope.teachers = [];

	  $http.get(url).success(function(response) {
	         $scope.teachers = response;
	         console.log($scope.teachers);

	         $scope.totalItems = $scope.teachers.length;

	  }).error(function(response) {
	          // console.log(response);
	          // alert('This is embarassing. An error has occured. Please check the log for details');
	  });

	  $scope.currentPage = 1;
	  $scope.itemsPerPage = 4;

	  $scope.setPage = function (pageNo) {
	    $scope.currentPage = pageNo;
	  };

	}]);

	LMJFBouake.controller("StudentsController", ['$scope', '$http', function($scope,  $http){

	    var url = '/';

	    $scope.students = [];

	    $http.get(url).success(function(response) {
	           $scope.students = response;
	           $scope.totalItems = $scope.students.length;

	    }).error(function(response) {
	            // console.log(response);
	            // alert('This is embarassing. An error has occured. Please check the log for details');
	    });

	    $scope.currentPage = 1;
	    $scope.itemsPerPage = 4;

	    $scope.setPage = function (pageNo) {
	      $scope.currentPage = pageNo;
	    };

	}]);

	LMJFBouake.controller("EvaluationsController", ['$scope', '$http', function($scope,  $http) {

	  var url = '/';

	  $scope.evaluations = [];

	  $http.get(url).success(function(response) {
	         $scope.evaluations = response;
	         $scope.totalItems = $scope.evaluations.length;

	  }).error(function(response) {
	          // console.log(response);
	          // alert('This is embarassing. An error has occured. Please check the log for details');
	  });

	  $scope.currentPage = 1;
	  $scope.itemsPerPage = 4;

	  $scope.setPage = function (pageNo) {
	    $scope.currentPage = pageNo;
	  };


	}]);
}
