
@extends('layouts.master')

@section('sidebar')



@stop

@section('content')




	<div  ng-controller="RequestController" data-ng-init="init()">
		<div id ="dj-request">
		<div ng-repeat="x in songRequests">
			<p>{{x}}</p>
		</div>
		</div>


<div class ="container-fluid">
<h2>Make Your Requests Known</h2>
		<div class="song_request">
		<h3>Song Request</h3>
		<form class="request_form form-horizontal" role="form">
			<fieldset>
				<div class ="form-group">
					
  <input class="form-control request_form_field row " type="text" ng-model="song_requestor_name" placeholder="Your Name"><br><br>

</div>
	<div class="form-group">
		
	<input class="form-control request_form_field row " type="text" ng-model="song_title" placeholder="Song Title"><br><br>

</div>
<div class="form-group">

	<input class="form-control request_form_field row " type="text" ng-model="song_artist" placeholder="Artist"><br><br>

</div>
<div class="form-group">

	<input class="request_form_field row form-control " type="text" ng-model="song_dj_id" placeholder="DJ Name"><br><br>

</div>
<div class="form-group">
	
	<input  ng-click="submitSong() " type="submit"  value="Submit Request" class="btn btn-primary">

</div>
</fieldset>
</form>
</div>
<div class="mood_request">
<h3>Mood Request</h3>
<form class="request_form form-horizontal" role="form">
	<fieldset>
		<div class ="form-group">
			
			  <input class="request_form_field row form-control " type="text" ng-model="mood_requestor_name" placeholder="Your Name"><br><br>
  
</div>
	<div class ="form-group">

	<input class="request_form_field row form-control" type="text" ng-model="mood_title" placeholder="What Mood?"><br><br>

</div>
<div class ="form-group">

	<input class="request_form_field row form-control " type="text" ng-model="mood_dj_id" placeholder="DJ Name"><br><br>

</div>
<div class ="form-group">

	<input  ng-click="submitMood() " type="submit" value="Submit Request" class="btn btn-primary">

</div>
</fieldset>
</form>
		</div>
</div>
</div>
@stop
