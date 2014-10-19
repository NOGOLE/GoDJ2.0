@extends('layouts.master')

@section('sidebar')


@stop

@if($success = Session::get('success'))
    <div class="bg-primary">
        <h2>{{ $success }}</h2>
    </div>
@endif

@section('content')
	<div class="welcome">
		<h1>Make Your Requests Known</h1>
		<div class="song_request">
		<h2>Song Request</h2>
		<form action="http://localhost/godj_api/public/index.php/api/v1/songs" method="POST">
  <input type="text" name="requestor_name" placeholder="Your Name"><br>
  <input type="text" name="title" placeholder="Song Title"><br>
  <input type="text" name="artist" placeholder="Artist"><br>
  <input type="text" name="dj_id" placeholder="DJ Name"><br>
  <input type="submit" value="Submit Request" class="btn btn-primary">
</form>
</div>
<div class="mood_request">
<h2>Mood Request</h2>
<form action="http://localhost/godj_api/public/index.php/api/v1/moods" method="POST">
  <input type="text" name="requestor_name" placeholder="Your Name"><br>
  <input type="text" name="title" placeholder="What Mood Are You Looking For?"><br>
  <input type="text" name="dj_id" placeholder="DJ Name"><br>
  <input type="submit" value="Submit Request" class="btn btn-primary">
</form>	
		</div>
	
</div>

@stop
