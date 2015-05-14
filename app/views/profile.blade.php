@extends('layouts.master')
@section('sidebar')
<div id="google_map">
</div>
@stop

@section('content')

<form method="PUT" action="http://godj.nogole.com/logout" accept-charset="UTF-8"><input name="_token" type="hidden" value="MfIJUX6xxDqjvSKsnYwisjR2MlTTMT4p2BOJAkgj">

		<p><input class="btn btn-primary btn-lg" type="submit" value="Logout!"></p>
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
@foreach ($dj->moods as $mood)
<tr>
<td>{{$mood->title}}</td>
<td>{{$mood->requestor_name}}</td>
<td><button onclick="deleteMood({{$mood->id}})" type="button" id={{$mood->id}} data-loading-text="Deleting..." class="btn-danger btn">Delete</button>

</tr>
@endforeach
</table>
</div>
@stop
