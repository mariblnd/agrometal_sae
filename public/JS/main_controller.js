var myApp = angular.module('MainController', []);

myApp.controller('contactForm', function($scope) {
    $scope.messageTextNumber = 0;
    $scope.messageTextRED = false;
    $scope.messageTextCount = function() {
        if ($scope.messageText) {
            $scope.messageTextNumber = $scope.messageText.length;
            if ($scope.messageText.length >= 750) {
                $scope.messageTextRED = true;
            } else{
                $scope.messageTextRED = false;
            }
        } else{
            $scope.messageTextNumber  = 0;
        }
    };

    $scope.projectToCreateTextNumber = 0;
    $scope.projectToCreateTextRED = false;
    $scope.projectToCreateTextCount = function() {
        if ($scope.projectToCreateText) {
            $scope.projectToCreateTextNumber = $scope.projectToCreateText.length;
            if ($scope.projectToCreateText.length >= 750) {
                $scope.projectToCreateTextRED = true;
            } else{
                $scope.projectToCreateTextRED = false;
            }
        } else{
            $scope.projectToCreateTextNumber = 0;
        }
    };
});

myApp.controller('nosReferences', function($scope,$timeout) {
    $scope.image_dir_logo = 'images/references/clients_logos/';
    $scope.image_dir_socialmedia = 'images/social_media/';
    $scope.socialmedia_color = '';

    $scope.data = JSON.parse(data);
    $scope.selected_client = $scope.data[0];
    console.log($scope.data);

    $scope.data_regions = data_regions;

    $scope.map_id_cache = "map_x5F_";

    $scope.isRotated = false;
    $scope.isVisible = false;
    $scope.seeMore = function() {
        $scope.isRotated = !$scope.isRotated;
        $scope.isVisible = !$scope.isVisible;
    }

    $scope.getMapBtnActive = function(itemId) {
        if (itemId === $scope.selected_client.id) {
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
                    console.log($scope.selected_client.region);

                    if (value.title === $scope.selected_client.region) {
                        svgElement.style.fill = '#0059B5';
                    } else {
                        svgElement.style.fill = '#004388';
                    }
                });
            }
        }
    }
    $scope.changeSelectedClient = function(itemId, region){
        if(itemId === $scope.selected_client.id){
            return {};
        } else{
            angular.forEach($scope.data, function(value) {
                if (value.id === itemId) {
                    $scope.selected_client = value;
                }
            });
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

myApp.controller('equipementsPage', function($scope) {
    $scope.data_categories = JSON.parse(data_categories);
    console.log($scope.data_categories);

    $scope.data_items = JSON.parse(data_items);
    console.log($scope.data_items);

    $scope.data_params = JSON.parse(data_params);
    console.log($scope.data_params);

    $scope.itemMenuStatus = [];

    $scope.itemPopupStatus = false;

    $scope.itemPopupInfo = $scope.data_items[0];
    $scope.itemPopupParams = [];

    $scope.refreshItemMenuStatus = function () {
        $scope.data_categories.forEach(element => {
            console.log("bool was created" + element);
            $scope.itemMenuStatus.push(false);
        });
    }

    $scope.updateItemMenuStatus = function(index){
        $scope.itemMenuStatus[index] = !$scope.itemMenuStatus[index];
    }

    $scope.openItemPopup = function(index){
       $scope.itemPopupStatus = true;
       $scope.itemPopupParams = [];

       $scope.data_items.forEach(element => {
            if (element.id == index) {
                $scope.itemPopupInfo = element;   
            }
       });

       $scope.data_params.forEach(element => {
            if (element.equipmentsMinusOne.id == index) {
                $scope.itemPopupParams.push(element);
            }
        });
    }

    $scope.closeItemPopup = function(){
        $scope.itemPopupStatus = false;
    }

    $scope.refreshItemMenuStatus();
});