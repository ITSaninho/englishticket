angular.module('MyApp', ['ngCookies']);

angular.module('MyApp').controller('appCtrl',['$rootScope', '$scope', 'request', function($rootScope, $scope, request) {
	
	$scope.initData = {};
	$scope.contactMessage = false;
	$scope.checkboxWord = {};
	$scope.checkboxWord.word_id = '';
	$scope.checkboxWord.phrase_id = '';
	$scope.checkboxWord.checkbox = '';
	$scope.mysearch = {};
	$scope.mysearch.q;
	$scope.q = '';
	$scope.searchResult;
	$scope.searchVariant = true;
	$scope.userLanguage = 'en-En';
	$scope.library_style = true;
	$scope.library_phone_style = false;
	$scope.library_small_phone_style = false;


    $scope.visibleLibrary = function() {
        if (document.documentElement.clientWidth < 450) {
            $scope.library_style = false;
            $scope.library_phone_style = true;
            $scope.library_small_phone_style = false;
        }
        if(document.documentElement.clientWidth < 290) {
        	$scope.library_style = false;
        	$scope.library_phone_style = false;
        	$scope.library_small_phone_style = true;
        }
    };

	$scope.sendMessage = function(contact) {
        request.send('/savecontact', $scope.contact, function(data) {
        	$scope.contactMessage = data;
        });
    };

    $scope.read = function(word_id, checkbox) {
		$scope.checkboxWord.word_id = word_id;
		$scope.checkboxWord.checkbox = checkbox;
		request.send('/profile/read', $scope.checkboxWord, function(data) {
			
        });
    };

    $scope.checkLanguage = function() {
    	$scope.userLanguage = (navigator.language||navigator.browserLanguage);
    	console.log($scope.userLanguage);
    };

    $scope.searchGo = function(q) {
		$scope.mysearch.q = q;
		$scope.checkLanguage();
		request.send('/searchpost/'+$scope.userLanguage , $scope.mysearch, function(data) {
			$scope.searchResult = data;
        });
		$scope.searchVariant = true;
    };

    $scope.searchCheck = function(check) {
    	$scope.q = angular.copy(check);
		$scope.searchGo($scope.q);
		$scope.searchVariant = false;
    };

}]);