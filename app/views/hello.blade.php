
@extends('layouts.master')

@section('sidebar')


@stop

@section('content')
<script>
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
function submitSong() {
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


	<div>
		<h1>Make Your Requests Known</h1>
		<div class="song_request">
		<h2>Song Request</h2>
		<form class="request_form">
  <input class="request_form_field" type="text" id="song_requestor_name" placeholder="Your Name"><br><br>
  <input class="request_form_field" type="text" id="song_title" placeholder="Song Title"><br><br>
  <input class="request_form_field" type="text" id="song_artist" placeholder="Artist"><br><br>
  <input class="request_form_field" type="text" id="song_dj_id" placeholder="DJ Name"><br><br>
  <input  type="submit" onClick="submitSong()" value="Submit Request" class="btn btn-primary">
</form>
</div>
<div class="mood_request">
<h2>Mood Request</h2>
<form  class="request_form">
  <input class="request_form_field" type="text" id="mood_requestor_name" placeholder="Your Name"><br><br>
  <input class="request_form_field" type="text" id="mood_title" placeholder="What Mood?"><br><br>
  <input class="request_form_field" type="text" id="mood_dj_id" placeholder="DJ Name"><br><br>
  <input  onClick="submitMood()" type="submit" value="Submit Request" class="btn btn-primary">
</form>	
		</div>
	
</div>
@stop
