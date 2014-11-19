@extends('layouts.master')

@section('sidebar')

@stop

@section('content')
{{ Form::open(array('url' => 'login')) }}
		<h1>Login</h1>

		<!-- if there are login errors, show them here -->
		<p>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
		</p>

		<p>
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email')) }}
		</p>

		<p>
			{{ Form::password('password', array('placeholder' => 'Password')) }}
		</p>

		<p>{{ Form::submit('LogON!', array('class' => 'btn btn-primary')) }}</p>
	{{ Form::close() }}
@stop
