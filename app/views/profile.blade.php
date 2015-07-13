@extends('layouts.master')
@section('sidebar')
<script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCDNt1biVyfA8h-eCZyZ69CKS6NNBCeEQ">
	</script>
<canvas  class="visuals" id="radarchart" width="200" height="200"></canvas>
<canvas  class="visuals" id="polarchart" width="200" height="200"></canvas>


@stop

@section('content')
<br>
@if(Auth::user()->soundcloud != null)
<iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/<% Auth::user()->soundcloud %>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
@endif
<br>
<h1>DJ Profile</h1>

<img src = "images/<%Auth::user()->profile_pic%>">


<div onload=<?php echo '"initSC('."'".Auth::user()->username."'".')"'?> ng-controller="ProfileController" ng-init=<?php echo '"init('."'".Auth::user()->username."'".')"'?>>
	<form method="PUT" action="/logout" accept-charset="UTF-8"><input name="_token" type="hidden" value="MfIJUX6xxDqjvSKsnYwisjR2MlTTMT4p2BOJAkgj">
			<p>
				<input class="btn btn-primary btn-lg" type="submit" value="Logout!">
				<button class="btn btn-info btn-lg" type="button" ng-click="open()">Edit Profile </button>
				</p>
		</form>
		<br>
		<h3> Song Requests</h3>
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
<!--Angular Modal -->
<div ng-controller="ProfileController">
    <script type="text/ng-template" id="myProfileContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Edit Your Profile</h3>
        </div>
        <div class="modal-body">
				<% Form::open(array('url' => 'api/v1/edituser/'.Auth::user()->id,'files' => true)) %>
				                <h1>Edit</h1>

				                <!-- if there are login errors, show them here -->
				                <p>
				                        <% $errors->first('email') %>
				                        <% $errors->first('password') %>
				                </p>

				               <p>
						<%Form::text('username', Input::old('username'), array('class'=>'request_form_field form-control','id'=>'username','placeholder' => 'DJ name w/o the word DJ')) %>
						 <p>
				                        <% Form::text('email', Input::old('email'), array('id'=>'email','class'=>'request_form_field form-control', 'placeholder' => 'Email')) %>
				                </p>

					<p>
				                        <% Form::password('password', array('id'=>'password','class'=>'request_form_field form-control', 'placeholder' => 'Password')) %>
				                </p>

				                <p>
				                        <% Form::password('password', array('class'=>'request_form_field form-control','placeholder' => 'Repeat Password')) %>
				                </p>

				                <p>
				                        <% Form::textArea('bio', Input::old('bio'),array('class'=>'request_form_field form-control','placeholder' => 'Your Bio')) %>
				                </p>

				                <p>
				                        <% Form::label('Profile Pic','Profile Pic',array('class'=>'request_form_field form-control'))%>
				                        <% Form::file('profile_pic') %>
				                </p>

				                <p><% Form::submit('Save!', array('class' => 'btn btn-success')) %></p>
				        <% Form::close() %>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" ng-click="ok()">Close</button>
        </div>
    </script>

    </div>
</div>
<!--End Angular Modal -->
@stop
