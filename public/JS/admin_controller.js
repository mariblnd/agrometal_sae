var myApp = angular.module('AdminController', []);

myApp.controller('adminLogin', ['$scope', function($scope) {
    $scope.checkbox = false;
    $scope.passwordType = "password";
    $scope.checkSwipe = function(){
        if ($scope.checkbox == false) {
            $scope.passwordType = "text";
        } else{
            $scope.passwordType = "password";
        }
    }
}]);