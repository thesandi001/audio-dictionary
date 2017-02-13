var appControllers = angular.module('appControllers', ['ngAnimate','ui.bootstrap']);

// ************************* START: API end points ******************* //

var baseIp = "http://localhost/dictionary";
var apiUrl = baseIp + "/api";
var apiEndPoint = apiUrl + "/v1/";

// API endpoints
var home = apiEndPoint + "home.php";
var search = apiEndPoint + "search.php";
var add_word = apiEndPoint + "add_word.php";
var get_bookmark = apiEndPoint + "get_bookmark.php";
var add_bookmark = apiEndPoint + "add_bookmark.php";
var delete_bookmark = apiEndPoint + "delete_bookmark.php";
var clear_bookmark = apiEndPoint + "clear_bookmark.php";

// ************************* END: API end points ******************* //

appControllers.controller('HomeController', ['$scope', '$http','$routeParams', function($scope, $http, $routeParams) {
	
	var params = {	
		char : $routeParams.char
	};

	// generate navigation menu

	$scope.letters = [];
	for(var i=65; i<65+26; i++) {
		var chr = String.fromCharCode(i);	
		$scope.letters.push(chr);
	}

	// main activity calls to get home data
	
	// getting the words and descriptions
	$http.get(home, {params})
	.success(function(data){
		$scope.response = data;	
		$scope.bigWordPlaceHolder = "[Selected Word]";
		$scope.bigAudioLink = "";
		$scope.bigBookmarkButton = "";							
		$scope.bigShareButton = "";							
	});

	// getting the bookmarks
	$http.get(get_bookmark, {})
	.success(function(data){			
		$scope.bookmarks = data;					
	});

	// search
	$scope.search = function(q) {
		var params = {	
			q : q
		};
		$http.get(search, {params})
		.success(function(data){			
			$scope.response = data;
		});
	}

	// adding a new word to dictionary
	$scope.addWord = function(word,description,audio_url) {
		var params = {	
			word : word,
			description : description,
			audio_url : audio_url
		};

		$http.get(add_word, {params})
		.success(function(data){			
			$scope.addWordResponse = data;							
		});
	}

	 // laoding a word to the main word holder
	$scope.loadWord = function(word,description,audio_url) {
		$scope.bigWordPlaceHolder = word;
		$scope.bigAudioLink = audio_url;
		$scope.bigBookmarkButton = word;							
		$scope.bigShareButton = word;							
	}

	// adding a bookmark
	$scope.addBookmark = function(word) {
		var params = {	
			word : word
		};

		$http.get(add_bookmark, {params})
		.success(function(data){			
			$scope.bookmarks = data;							
		});
	}

	// delete a single bookamrk
	$scope.deleteBookmark = function(word) {
		var params = {	
			word : word
		};

		$http.get(delete_bookmark, {params})
		.success(function(data){			
			$scope.bookmarks = data;						
		});
	}

	// clear all bookmarks
	$scope.clearBookmark = function() {
		$http.get(clear_bookmark, {})
		.success(function(data){			
			$scope.bookmarks = data;						
		});
	}

	// play word audio
	$scope.playSound = function(el,soundfile) {
		el.mp3 = new Audio(soundfile);
	    el.mp3.play();		
	}

}]);