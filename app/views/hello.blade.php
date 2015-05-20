
@extends('layouts.master')

@section('sidebar')



@stop

@section('content')




	<div  ng-controller="RequestController" data-ng-init="init()">
		<div id ="dj-request">
		<div ng-repeat="x in songRequests">
			<b><p>{{x}}</p></b>
		</div>
		</div>


<div class ="container">
<h2>Make Your Requests Known</h2>
		<div class="song_request">
		<h3>Song Request</h3>
		<form  role="form">
			<fieldset>
					
        <input class="form-control" type="text" ng-model="song_requestor_name" placeholder="Your Name"><br>

		
	<input class="form-control" type="text" ng-model="song_title" placeholder="Song Title"><br>



	<input class="form-control" type="text" ng-model="song_artist" placeholder="Artist"><br>



	<input class="form-control " type="text" ng-model="song_dj_id" placeholder="DJ Name"><br>


	
	<input  ng-click="submitSong() " type="submit"  value="Submit Request" class="btn btn-primary">

</fieldset>
</form>
</div>
<div class="mood_request">
<h3>Mood Request</h3>
<form role="form">
	<fieldset>
			
	<input class="form-control " type="text" ng-model="mood_requestor_name" placeholder="Your Name"><br>
  


	<input class="form-control" type="text" ng-model="mood_title" placeholder="What Mood?"><br>



	<input class="form-control " type="text" ng-model="mood_dj_id" placeholder="DJ Name"><br>



	<input  ng-click="submitMood() " type="submit" value="Submit Request" class="btn btn-primary">

</fieldset>
</form>
</div>
</div>
</div>
@stop
