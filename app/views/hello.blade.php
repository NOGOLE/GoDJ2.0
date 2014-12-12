
@extends('layouts.master')

@section('sidebar')
	 

@stop

@section('content')
<script src="js/frontpage.js">
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
