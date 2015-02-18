@extends('layouts.master')
@section('sidebar')
<div id="google_map">
</div>
@stop

@section('content')
<script type="text/javascript" src="js/profile-page-song-functions.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="js/profile-page-geoChart.js"></script>

<script>
(function() {

    var larapush = new Larapush('ws://godj.nogole.com:8080');

larapush.watch('demoChannel').on('generic.event', function(msgEvent)
    {
        console.log('generic.event has been fired!', msgEvent.message);
    });

    larapush.watch('mastashake08').on('song.request', function(msgEvent)
    {
var object =JSON.parse(msgEvent.message);
        console.log(object);

        var table = document.getElementById("songTable");
        // Create an empty <tr> element and add it to the 1st position of the table:
var row = table.insertRow(table.rows.length);

// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);
var cell3 = row.insertCell(2);
var cell4 = row.insertCell(3);
// Add some text to the new cells:
cell1.innerHTML = object.title;
cell2.innerHTML = object.artist;
cell3.innerHTML = object.requestor_name;
var  btd = '<td>';
var etd = '</td>';
var button = '<button onclick=';
var deleteFunc  ='"deleteSong('+object.id+')"';
var id = 'id ="' +object.id+ '"';
 button = button.concat(deleteFunc).concat(id);;
button = button.concat('type="button" data-loading-text="Deleting..." class="btn-danger btn">Delete</button>');
cell4.innerHTML = btd+button+etd;

drawMap();

 });

  

    larapush.watch('mastashake08').on('mood.request', function(msgEvent)
    {

	var object =JSON.parse(msgEvent.message); 
        console.log(object);

	var table = document.getElementById("moodTable");
	// Create an empty <tr> element and add it to the 1st position of the table:
var row = table.insertRow(table.rows.length);

// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);
var cell3 = row.insertCell(2);
// Add some text to the new cells:
cell1.innerHTML = object.title;
cell2.innerHTML = object.requestor_name;
var  btd = '<td>';
var etd = '</td>';
var button = '<button onclick=';
var deleteFunc  ='"deleteMood('+object.id+')"';
var id = 'id ="' +object.id+ '"';
 button = button.concat(deleteFunc).concat(id);;
button = button.concat('type="button" data-loading-text="Deleting..." class="btn-danger btn">Delete</button>');
cell3.innerHTML = btd+button+etd;  
 });


})();</script>

<h1>DJ Profile</h1>
<h3> Song Requests</h3>
<table class="table jumbotron" id="songTable">
<tr>
<th>Title</th>
<th>Artist</th>
<th>Requestor</th>
</tr>
@foreach ($dj->songs as $song)
<tr>
<td>{{$song->title}}</td>
<td>{{$song->artist}}</td>
<td>{{$song->requestor_name}}</td>
<td><button onclick="deleteSong({{$song->id}})" type="button" id={{$song->id}} data-loading-text="Deleting..." class="btn-danger btn">Delete</button>

</tr>	
@endforeach
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
@stop
