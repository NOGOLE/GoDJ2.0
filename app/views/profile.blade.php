@extends('layouts.master')
@section('sidebar')
TODO:
ADD GOOGLE VISUALS HERE
@stop

@section('content')
<script>

</script>
<h1>DJ Profile</h1>
<h3> Song Requests</h3>
<table class="table" id="songTable">
<tr>
<th>Title</th>
<th>Artist</th>
<th>Requestor</th>
</tr>
@foreach ($dj->songRequests as $song)
<tr>
<td>{{$song->title}}</td>
<td>{{$song->artist}}</td>
<td>{{$song->requestor_name}}</td>
<td><button onclick="deleteSong({{$song->id}})" type="button" id={{$song->id}} data-loading-text="Deleting..." class="btn-danger btn">Delete</button>

</tr>	
@endforeach
</table>

<h3> Mood Requests</h3>
<table class="table" id="moodTable">
<tr>
<th>Mood</th>
<th>Requestor</th>
</tr>
@foreach ($dj->moodRequests as $mood)
<tr>    
<td>{{$mood->title}}</td>
<td>{{$mood->requestor_name}}</td>
<td><button onclick="deleteMood({{$mood->id}})" type="button" id={{$mood->id}} data-loading-text="Deleting..." class="btn-danger btn">Delete</button>

</tr>   
@endforeach
</table>
@stop
