var adminApp = angular.module('adminApp', [
  'ngRoute',
  'ui.bootstrap',
  'appControllers'
]);

adminApp.config(['$routeProvider', function($routeProvider) {
  $routeProvider.
  when('/home/:char', {
    templateUrl: 'partials/home.html',
    controller: 'HomeController'
  }).
  otherwise({
    redirectTo: '/home/A'
  });
}]);