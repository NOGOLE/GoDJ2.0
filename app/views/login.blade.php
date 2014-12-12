@extends('layouts.master')

@section('sidebar')

@stop

@section('content')
<div class="jumbotron">
If you would like to try GoDJ for yourself, then please create an account using the form below!
</div>
{{ Form::open(array('url' => 'login')) }}
		<h1>Login</h1>

		<!-- if there are login errors, show them here -->
		<p>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
		</p>

		<p>
			{{ Form::text('email', Input::old('email'), array('class'=>'request_form_field','placeholder' => 'Email')) }}
		</p>

		<p>
			{{ Form::password('password', array('class'=>'request_form_field','placeholder' => 'Password')) }}
		</p>

		<p>{{ Form::submit('LogON!', array('class' => 'btn btn-primary')) }}</p>
	{{ Form::close() }}
@stop
