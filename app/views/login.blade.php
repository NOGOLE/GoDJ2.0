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
@stop
