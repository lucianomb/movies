var angular = angular || [];

var app = angular.module('app', []);

app.controller('MoviesCtrl', ['$scope', '$sce', function($scope, $sce){

  
  $scope.initCtrl = function() {
    $scope.currentMovie = '';
    $scope.bgHidden = false;
  };

  $scope.getHtml = function(html) {
    return $sce.trustAsHtml(html);
  };

  $scope.catalog = [{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMjE0NDA0MTkzOF5BMl5BanBnXkFtZTgwOTM2OTk2NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  },{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMjQwOTc0Mzg3Nl5BMl5BanBnXkFtZTgwOTg3NjI2NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  },{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMTc1MjcxNzcwMV5BMl5BanBnXkFtZTgwMTE0NTE2NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  },{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMjAwNzMyMDg4N15BMl5BanBnXkFtZTgwNjIxOTI0NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  },{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMjE0NDA0MTkzOF5BMl5BanBnXkFtZTgwOTM2OTk2NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  },{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMjE0NDA0MTkzOF5BMl5BanBnXkFtZTgwOTM2OTk2NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  },{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMjE0NDA0MTkzOF5BMl5BanBnXkFtZTgwOTM2OTk2NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  },{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMjE0NDA0MTkzOF5BMl5BanBnXkFtZTgwOTM2OTk2NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  },{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMjE0NDA0MTkzOF5BMl5BanBnXkFtZTgwOTM2OTk2NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  },{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMjE0NDA0MTkzOF5BMl5BanBnXkFtZTgwOTM2OTk2NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  },{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMjE0NDA0MTkzOF5BMl5BanBnXkFtZTgwOTM2OTk2NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  },{
    title: 'Dirty Grandpa',
    poster_url: 'http://ia.media-imdb.com/images/M/MV5BMjE0NDA0MTkzOF5BMl5BanBnXkFtZTgwOTM2OTk2NzE@._V1__SX1305_SY607_.jpg',
    rating: 10,
    year: 2015,
    short_description: '<p>Right before his wedding, an uptight guy is tricked into driving his grandfather, a perverted former Army general, to Florida for spring break.</p>'
  }];

  $scope.initCtrl();

}]);