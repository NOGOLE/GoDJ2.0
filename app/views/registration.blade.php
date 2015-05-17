@extends('layouts.master')

@section('sidebar')

@stop

@section('content')
<div class="jumbotron how-to">
If you would like to try GoDJ for yourself, then please create an account using the form below!
</div>
<% Form::open(array('url' => 'api/v1/createuser')) %>
                <h1>Create A New Account</h1>

                <!-- if there are login errors, show them here -->
                <p>
                        <% $errors->first('email') %>
                        <% $errors->first('password') %>
                </p>

               <p>
		<%Form::text('username', Input::old('username'), array('class'=>'request_form_field','id'=>'username','placeholder' => 'DJ name w/o the word DJ')) %>
		 <p>
                        <% Form::text('email', Input::old('email'), array('id'=>'email','class'=>'request_form_field', 'placeholder' => 'Email')) %>
                </p>

	<p>
                        <% Form::password('password', array('id'=>'password','class'=>'request_form_field', 'placeholder' => 'Password')) %>
                </p>

                <p>
                        <% Form::password('password', array('class'=>'request_form_field','placeholder' => 'Repeat Password')) %>
                </p>

                <p><% Form::submit('Register!', array('class' => 'btn btn-primary')) %></p>
        <% Form::close() %>

@stop
