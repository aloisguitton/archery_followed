var app = angular.module('archery_followed', ["ngRoute", "ngCookies"])
  .config(function($routeProvider) {
    $routeProvider
    .when("/", {
      templateUrl: "phtml/main.php"
    })
    .when("/performance", {
      templateUrl: "phtml/performance.php"
    })
    .when("/connexion", {
      templateUrl: "phtml/connexion.php"
    })
    .when("/co", {
      templateUrl: "php/co.php"
    })
    .when("/inscription", {
      templateUrl: "phtml/inscription.php"
    })
    .when("/recherche", {
      templateUrl: "phtml/recherche.php"
    })
    .when("/perf/:pseudo", {
      templateUrl: "phtml/perf.php",
      controller: "testctrl"
    })
    .when("/moncompte", {
      templateUrl: "phtml/compte.php",
    })
    .otherwise({
      redirectTo: '/'
    })
  });

app.controller("testctrl", function($scope, $routeParams, $cookies, $http, $window, $route){

  if($cookies.get('recherche') != 1){
    $http.post("phtml/perfo.php", $routeParams.pseudo).then(function successCallback(response) {
      $cookies.put('recherche', 1);
      $window.location.reload();
    }, function errorCallback(response) {
      alert("Erreur lors de l'envoi");
    });
  }
  else {
    $cookies.remove('recherche')
  }

})

function erroradd(){
  alert("Nombre de points incohérents avec la distance");
}
