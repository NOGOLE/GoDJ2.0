@extends('layouts.master')

@section('sidebar')

@stop

@section('content')
<div class="jumbotron">
Login Below To Access DJ Dashboard.
</div>
<% Form::open(array('url' => 'login')) %>
		<h1>Login</h1>

		<!-- if there are login errors, show them here -->
		<p>
			<% $errors->first('email') %>
			<% $errors->first('password') %>
		</p>

		<p>
			<% Form::text('email', Input::old('email'), array('class'=>'request_form_field form-control','placeholder' => 'Email')) %>
		</p>

		<p>
			<% Form::password('password', array('class'=>'request_form_field form-control','placeholder' => 'Password')) %>
		</p>

		<p><% Form::submit('LogON!', array('class' => 'btn btn-primary')) %></p>
	<% Form::close() %>
	<form role="form" ng-controller="LoginController">
	  <fieldset>
			<input name="_token" type="hidden" value="Tgsx2gYOyzpx2NEFg2kIcROmR1bU1mf2myxByBfQ">
	    <input type="email" class="form-control" placeholder="Email Address" id="email" ng-model="email"></input>


	    <input type="password" class="form-control" id="pwd" placeholder="Password" ng-model="password"></input>

	  <button type="submit" class="btn btn-success" ng-click="login()">Login</button>
	</fieldset>
	</form>

@stop
