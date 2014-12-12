@extends('layouts.master')
@section('sidebar')
<div id="google_map">
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
    google.load('visualization', '1', { 'packages': ['geochart'] });
    google.setOnLoadCallback(drawMap);
    
    

    function drawMap() {
	 var jsonData = $.ajax({
          url: "api/v1/songs",
          dataType:"json",
          async: false
          }).responseText;

	
      var data = new google.visualization.DataTable(jsonData);


	

    var options = {height:200,keepAspectRatio:true};

    var map = new google.visualization.GeoChart(document.getElementById('google_map'));

    map.draw(data, options);
  };

  </script>
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
