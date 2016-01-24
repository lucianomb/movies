var angular = angular || [];

var app = angular.module('app', []);

app.controller('MoviesCtrl', ['$scope', '$sce', '$http', function($scope, $sce, $http){
  
  $scope.initCtrl = function() {
    $scope.bg = {
      currentMovie: '',
      bgHidden: false
    };
    $scope.catalog = [];
 
    $scope.getMovies();
  };

  $scope.getMovies = function() {
    var movies = {
      method: 'GET',
      url: 'movies.json'
    };

    $http(movies).then(function(response){
      $scope.catalog = response.data.data;
    });
  };

  $scope.getHtml = function(html) {
    return $sce.trustAsHtml(html);
  };

  $scope.initCtrl();

}]);