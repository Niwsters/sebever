'use strict';

var app = angular.module('sebever', ['ngRoute', 'ngResource', 'ngSanitize']);

app.config(['$routeProvider', function ($routeProvider) {
  $routeProvider
    .when('/', {
      templateUrl: 'frontpage.html'
    })
    .when('/about', {
      templateUrl: 'about.html'
    })
    .when('/crowdmath', {
      templateUrl: 'crowdmath.html'
    })
    .when('/blog', {
      templateUrl: 'blog.html'
    });
}]);

app.controller('SebeverCtrl', ['$scope', '$location', 'Post',
  function ($scope, $location, Post) {
    $scope.navMenu = [
      {
        label: "Home",
        path: "/"
      },
      {
        label: "About",
        path: "/about"
      },
      {
        label: "Crowdmath",
        path: "/crowdmath"
      },
      {
        label: "Blog",
        path: "/blog"
      }
    ];

    $scope.isActivePath = function (path) {
      return path === $location.path();
    };
  }
]);

app.factory('Post', ['$resource', function ($resource) {
  var Post = $resource('/post/', {}, {});

  return Post;
}]);

app.directive('blogposts', ['Post', function(Post) {
  return {
    template: '<div class="blogpost" ng-repeat="post in posts" ng-bind-html="post"></div>',
    link: function(scope) {
      scope.posts = Post.query();
    }
  };
}]);