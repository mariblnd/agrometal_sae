var myApp = angular.module('MainController', []);

myApp.controller('nosReferences', function($scope,$timeout) {
    $scope.image_dir_logo = 'images/references/clients_logos/';
    $scope.image_dir_socialmedia = 'images/social_media/';
    $scope.selected_client = 0;
    $scope.socialmedia_color = '';

    $scope.data = data;
    $scope.data_regions = data_regions;

    $scope.map_id_cache = "map_x5F_";

    $scope.isRotated = false;
    $scope.isVisible = false;
    $scope.seeMore = function() {
        $scope.isRotated = !$scope.isRotated;
        $scope.isVisible = !$scope.isVisible;
    }

    $scope.getMapBtnActive = function(itemId) {
        if (itemId === $scope.selected_client) {
            return {
                'background-color': 'white'
            };
        } else {
            return {};
        }
    };

    // DEFAULT REGION SELECTED
    $scope.mapHighlightCheck = function(){
        var svgObject = document.getElementById('references-map');
        if (svgObject) {
            var svgDoc = svgObject.contentDocument;
            if (svgDoc) {
                angular.forEach($scope.data_regions.regions, function(value) {
                    var svgElement = svgDoc.getElementById($scope.map_id_cache + value.title);
                    console.log($scope.data[$scope.selected_client].map_point.region);
                    if (value.title === $scope.data[$scope.selected_client].map_point.region) {
                        svgElement.style.fill = '#0059B5';
                    } else {
                        svgElement.style.fill = '#004388';
                    }
                });
            }
        }
    }
    $scope.changeSelectedClient = function(itemId, region){
        if(itemId === $scope.selected_client){
            return {};
        } else{
            $scope.selected_client = itemId;
        }
        var svgObject = document.getElementById('references-map');
        if (svgObject) {
            var svgDoc = svgObject.contentDocument;
            if (svgDoc) {
                angular.forEach($scope.data_regions.regions, function(value) {
                    var svgElement = svgDoc.getElementById($scope.map_id_cache + value.title);
                    if (value.title === region) {
                        svgElement.style.fill = '#0059B5';
                    } else {
                        svgElement.style.fill = '#004388';
                    }
                });
            }
        }
    }
    $timeout(function () {
        $scope.mapHighlightCheck();
    }, 50);
});