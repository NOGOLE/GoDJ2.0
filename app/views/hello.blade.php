
@extends('layouts.master')

@section('sidebar')


@stop

@section('content')
<script>
var app = angular.module("userRequest", []);
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
//submit mood request
$scope.submitMood = function() {
var moodObject = {requestor_name:$scope.mood_requestor_name,
title:$scope.mood_title,
dj_id:$scope.mood_dj_id
};
console.log(moodObject);
var request = $http.post('/api/v1/moods',moodObject);
return request;
}
//submit song request
$scope.submitSong = function() {
//create JSON object to insert into post
var songObject = {requestor_name:$scope.song_requestor_name, 
title:$scope.song_title, 
artist:$scope.song_artist,
dj_id:$scope.song_dj_id };
console.log(songObject);
var request = $http.post('/api/v1/songs',songObject);
return request;
}
}
);
var latitude=0.0;
var longitude = 0.0;

window.onload=function(){
if(navigator.geolocation)
{
navigator.geolocation.getCurrentPosition(showPosition);
}
else
{
alert("Geolocation is not supported by this browser.");
}
}
function showPosition(pos){
latitude = pos.coords.latitude;
longitude = pos.coords.longitude;
}
function submitSong1() {
var _requestor =  document.getElementById("song_requestor_name").value;
var _title = document.getElementById("song_title").value;
var _artist = document.getElementById("song_artist").value;
var _dj = document.getElementById("song_dj_id").value;
$.post("/api/v1/songs",
  {
    requestor_name:_requestor,
    title:_title,
    artist:_artist,
    dj_id:_dj,
    lat:latitude,
    long:longitude
  },
  function(data){
    alert("TEST");
  });

}

function submitMood() {
var _requestor =  document.getElementById("mood_requestor_name").value;
var _title = document.getElementById("mood_title").value;
var _dj = document.getElementById("mood_dj_id").value;
$.post("/api/v1/moods",
  {
    requestor_name:_requestor,
    title:_title,
    dj_id:_dj,
    lat:latitude,
    long:longitude
  },
  function(data){
    alert("TEST");
  });

}
</script>


	<div ng-app="userRequest" ng-controller="requestController">
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
