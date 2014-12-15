
@extends('layouts.master')

@section('sidebar')
	 

@stop

@section('content')
<script src="js/frontpage.js">
</script>


	<div  ng-app="userRequest" ng-controller="requestController" data-ng-init="init()">
		
<div class ="container-fluid">
<h2>Make Your Requests Known</h2>
		<div class="song_request">
		<h3>Song Request</h3>
		<form class="request_form">
  <input class="request_form_field row col-xs-" type="text" ng-model="song_requestor_name" placeholder="Your Name"><br><br>
  <input class="request_form_field row col-xs-" type="text" ng-model="song_title" placeholder="Song Title"><br><br>
  <input class="request_form_field row col-xs-" type="text" ng-model="song_artist" placeholder="Artist"><br><br>
  <input class="request_form_field row col-xs-" type="text" ng-model="song_dj_id" placeholder="DJ Name"><br><br>
  <input  ng-click="submitSong() " type="submit"  value="Submit Request" class="btn btn-primary">
</form>
</div>
<div class="mood_request">
<h3>Mood Request</h3>
<form  class="request_form">
  <input class="request_form_field row col-xs-" type="text" ng-model="mood_requestor_name" placeholder="Your Name"><br><br>
  <input class="request_form_field row col-xs-" type="text" ng-model="mood_title" placeholder="What Mood?"><br><br>
  <input class="request_form_field row col-xs-" type="text" ng-model="mood_dj_id" placeholder="DJ Name"><br><br>
  <input  ng-click="submitMood() " type="submit" value="Submit Request" class="btn btn-primary">
</form>	
		</div>
</div>	
</div>
@stop
