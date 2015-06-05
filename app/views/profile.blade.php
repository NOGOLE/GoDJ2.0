@extends('layouts.master')
@section('sidebar')
<script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCDNt1biVyfA8h-eCZyZ69CKS6NNBCeEQ">
	</script>
	<script type="text/javascript">
	      function initialize() {
	        var mapOptions = {
	          center: { lat: -34.397, lng: 150.644},
	          zoom: 8
	        };
	        var map = new google.maps.Map(document.getElementById('map'),
	            mapOptions);
	      }
	      google.maps.event.addDomListener(window, 'load', initialize);
	    </script>
<div id="map">
</div>
<canvas  class="visuals" id="radarchart" width="200" height="200"></canvas>
<canvas  class="visuals" id="polarchart" width="200" height="200"></canvas>


@stop

@section('content')
<br>
<form method="PUT" action="/logout" accept-charset="UTF-8"><input name="_token" type="hidden" value="MfIJUX6xxDqjvSKsnYwisjR2MlTTMT4p2BOJAkgj">

		<p>
			<button class="btn btn-info btn-lg" type="button">Edit Profile </button>
			<input class="btn btn-primary btn-lg" type="submit" value="Logout!">
			</p>
	</form>




<h1>DJ Profile</h1>
<h3> Song Requests</h3>
<div ng-controller="ProfileController" ng-init=<?php echo '"init('."'".Auth::user()->username."'".')"'?>>
<table class="table jumbotron" id="songTable">
<tr>
<th>Title</th>
<th>Artist</th>
<th>Requestor</th>
</tr>

<tr ng-repeat="x in songRequests">
<td>{{x.title}}</td>
<td>{{x.artist}}</td>
<td>{{x.requestor_name}}</td>
<td><button ng-click="deleteSong($index)" type="button" data-loading-text="Deleting..." class="btn-danger btn">Delete</button>

</tr>

</table>

<h3> Mood Requests</h3>
<table class="table jumbotron" id="moodTable">
<tr>
<th>Mood</th>
<th>Requestor</th>
</tr>
<tr ng-repeat="x in moodRequests">
<td>{{x.title}}</td>
<td>{{x.requestor_name}}</td>
<td><button ng-click="deleteMood($index)" type="button" data-loading-text="Deleting..." class="btn-danger btn">Delete</button>

</tr>

</table>

<div class="party_form">
<h3>Add Party</h3>
<form  role="form">
	<fieldset>

		<input class="form-control" type="text" ng-model="party_name" placeholder="Party Name"><br>
		<textarea class="form-control" type="text" ng-model="party_description" placeholder="Party Description"></textarea><br>


<input class="form-control" type="text" ng-model="party_address" placeholder="Party Address"><br>



<input class="form-control" type="text" ng-model="party_city" placeholder="Party City"><br>

<style>
label {
	color:black;
}
</style>

<input class="form-control " type="text" ng-model="party_state" placeholder="Party State"><br>
<input class="form-control " type="text" ng-model="party_zip" placeholder="Party Zip"><br>


                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' id="party_start_time" class="form-control" placeholder="Start Date and Time"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>

<br>

                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' id ="party_end_time" class="form-control" placeholder="End Date and Time"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker();
            });
        </script>
				<br>

{{party_start_time}}

<input  ng-click=<?php echo '"submitParty('."'".Auth::user()->id."'".')"'?> type="button"  value="Submit party" class="btn btn-primary" data-toggle="modal" data-target="#myModal">

</fieldset>
</form>

</div>

@stop
