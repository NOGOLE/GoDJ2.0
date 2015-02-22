
var app = angular.module("godj", ['ngRoute']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'partials/home.html',
        //controller: 'PhoneListCtrl'
      })
		);

//REST
app.factory("Song", function($http) {
	return {
	get: function() {
	return $http.get('/api/v1/songs');
	},

save: function(songObject) {
        var request = $.post('/api/v1/songs',songObject, function(data) {
alert("Song Request Successfully Sent!");
return data;
});
	},
	destroy: function(id) {
	return $http.delete('/api/v1/songs/' + id);
}
}

});
app.factory("Mood", function($http) {
	return {
	get: function() {
	return $http.get('/api/v1/moods');
	},

	save: function(moodObject) {
	//return $.post('/api/v1/moods',data);
	var request = $.post('/api/v1/moods',moodObject, function(data) {
alert("Mood Request Successfully Sent!");
console.log(moodObject);
return data;
});

	},
	destroy: function(id) {
	return $http.delete('/api/v1/moods/' + id);
}
}

});

//

app.controller(
"requestController",
function($scope,Mood, Song) {
$scope.song_requestor_name="";
$scope.song_title="";
$scope.song_artist="";
$scope.song_dj_id="";
$scope.mood_requestor_name="";
$scope.mood_title="";
$scope.mood_dj_id="";
$scope.lat=0.0;
$scope.long=0.0;
//init function
$scope.init = function() {
if(navigator.geolocation){
navigator.geolocation.getCurrentPosition(showPosition);
}
else{
alert("Geolocation is not supported by this browser.");
}
};

function showPosition(pos){
$scope.lat = pos.coords.latitude;
$scope.long = pos.coords.longitude;
}


//submit mood request
$scope.submitMood = function() {
var moodObject = {requestor_name:$scope.mood_requestor_name,
title:$scope.mood_title,
dj_id:$scope.mood_dj_id,
lat:$scope.lat,
long:$scope.long
};

var request = Mood.save(moodObject);
$scope.mood_title ="";
return request;

}
//submit song request
$scope.submitSong = function() {
//create JSON object to insert into post
var songObject = {requestor_name:$scope.song_requestor_name,
title:$scope.song_title,
artist:$scope.song_artist,
dj_id:$scope.song_dj_id,
lat:$scope.lat,
long:$scope.long };

var request = Song.save(songObject);
$scope.song_title ="";
$scope.song_artist ="";

return request;
}
}
);
