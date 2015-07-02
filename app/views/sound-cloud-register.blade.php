@extends('layouts.master')

@section('sidebar')

@stop
@section('content')

<form method="POST" action="/api/v1/createuser" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="7cZxlJUtRXOhIhZE3w56G9QszEanS8Swpx1G0oIq">
                <h1>Create A New Account</h1>

                <!-- if there are login errors, show them here -->
                <p>

<input name="soundcloud-pic" type="hidden" value="<% $user->avatar_url %>">
                </p>

               <p>
		<input class="request_form_field form-control" id="username" placeholder="DJ name w/o the word DJ" name="username" type="text" value="<% $user->permalink%>">
		 <p>
                        <input id="email" class="request_form_field form-control" placeholder="Email" name="email" type="text">
                </p>

	<p>
                        <input id="password" class="request_form_field form-control" placeholder="Password" name="password" type="password" value="">
                </p>

                <p>
                        <input class="request_form_field form-control" placeholder="Repeat Password" name="password" type="password" value="">
                </p>

                <p>
                        <textarea class="request_form_field form-control" placeholder="Your Bio" name="bio" cols="50" rows="10" ><% $user->description %></textarea>
                </p>

                <p>
                        <img class="img-rounded" src="<% $user->avatar_url %>">
                </p>

                <p><input class="btn btn-success" type="submit" value="Register!"> </p>
        </form>
@stop
