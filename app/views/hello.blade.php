
@extends('layouts.master')

@section('sidebar')


@stop

@section('content')
<script src="js/frontpage.js">
/*var app = angular.module("userRequest", []);
app.controller(
"requestController",
function($scope,$http) {
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

var request = $.post('/api/v1/moods',moodObject, function(data) {
alert("Mood Request Successfully Sent!");
});
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
var request = $.post('/api/v1/songs',songObject, function(data) {
alert("Song Request Successfully Submitted");
});

$scope.song_title ="";
$scope.song_artist ="";

return request;
}
}
);
*/
</script>


	<div ng-app="userRequest" ng-controller="requestController" data-ng-init="init()">
		<h1>Make Your Requests Known</h1>
		<div class="song_request">
		<h2>Song Request</h2>
		<form class="request_form">
  <input class="request_form_field" type="text" ng-model="song_requestor_name" placeholder="Your Name"><br><br>
  <input class="request_form_field" type="text" ng-model="song_title" placeholder="Song Title"><br><br>
  <input class="request_form_field" type="text" ng-model="song_artist" placeholder="Artist"><br><br>
  <input class="request_form_field" type="text" ng-model="song_dj_id" placeholder="DJ Name"><br><br>
  <input  ng-click="submitSong()" type="submit"  value="Submit Request" class="btn btn-primary">
</form>
</div>
<div class="mood_request">
<h2>Mood Request</h2>
<form  class="request_form">
  <input class="request_form_field" type="text" ng-model="mood_requestor_name" placeholder="Your Name"><br><br>
  <input class="request_form_field" type="text" ng-model="mood_title" placeholder="What Mood?"><br><br>
  <input class="request_form_field" type="text" ng-model="mood_dj_id" placeholder="DJ Name"><br><br>
  <input  ng-click="submitMood()" type="submit" value="Submit Request" class="btn btn-primary">
</form>	
		</div>
	
</div>
@stop
