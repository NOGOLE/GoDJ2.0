@extends('layouts.master')
@section('sidebar')
TODO:
ADD GOOGLE VISUALS HERE
<div id="google_map" ng-app="google_map">
</div>
@stop

@section('content')
<script>
function deleteSong(id) {
    if (confirm('Delete this song request?')) {
        $.ajax({
            type: "DELETE",
            url: '/api/v1/songs/' + id, //resource
            success: function(affectedRows) {
                //if something was deleted, we redirect the user to the users page, and automaticaly tne user that he deleted will disapear
		location.reload();         
   }
        });
    }
}

function deleteMood(id) {
    if (confirm('Delete this mood request?')) {
        $.ajax({
            type: "DELETE",
            url: '/api/v1/moods/' + id, //resource
            success: function(affectedRows) {
                //if something was deleted, we redirect the user to the users page, and automaticaly tne user that he deleted will disapear
                location.reload();         
   }
        });
    }
}
</script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script>
	var app = angular.module("google_map", []);
	var requests = $.get("/api/v1/songs");
	console.log(requests);
    google.load('visualization', '1', { 'packages': ['map'] });
    google.setOnLoadCallback(drawMap);

    function drawMap() {
      var data = google.visualization.arrayToDataTable([
        ['Country', 'Population'],
        ['China', 'China: 1,363,800,000'],
        ['India', 'India: 1,242,620,000'],
        ['US', 'US: 317,842,000'],
        ['Indonesia', 'Indonesia: 247,424,598'],
        ['Brazil', 'Brazil: 201,032,714'],
        ['Pakistan', 'Pakistan: 186,134,000'],
        ['Nigeria', 'Nigeria: 173,615,000'],
        ['Bangladesh', 'Bangladesh: 152,518,015'],
        ['Russia', 'Russia: 146,019,512'],
        ['Japan', 'Japan: 127,120,000']
      ]);

    var options = { showTip: true,zoomLevel:1,  };

    var map = new google.visualization.Map(document.getElementById('google_map'));

    map.draw(data, options);
  };
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
