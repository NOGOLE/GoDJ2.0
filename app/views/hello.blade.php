
@extends('layouts.master')

@section('sidebar')



@stop

@section('content')


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div  ng-controller="RequestController" data-ng-init="init()">
		<div id ="dj-request">
		<div ng-repeat="x in songRequests">
			<b><p>{{x}}</p></b>
		</div>
		</div>


<div class ="container">
<h2>Make Your Requests Known</h2>
		<div class="song_request">
		<h3>Song Request</h3>
		<form  role="form">
			<fieldset>

        <input class="form-control" type="text" ng-model="song_requestor_name" placeholder="Your Name"><br>


	<input class="form-control" type="text" ng-model="song_title" placeholder="Song Title"><br>



	<input class="form-control" type="text" ng-model="song_artist" placeholder="Artist"><br>



	<input class="form-control " type="text" ng-model="song_dj_id" placeholder="DJ Name"><br>



	<input  ng-click="submitSong() " type="button"  value="Submit Request" class="btn btn-primary" data-toggle="modal" data-target="#myModal">

</fieldset>
</form>
</div>
<div class="mood_request">
<h3>Mood Request</h3>
<form role="form">
	<fieldset>

	<input class="form-control " type="text" ng-model="mood_requestor_name" placeholder="Your Name"><br>



	<input class="form-control" type="text" ng-model="mood_title" placeholder="What Mood?"><br>



	<input class="form-control " type="text" ng-model="mood_dj_id" placeholder="DJ Name"><br>



	<input  ng-click="submitMood() " type="button" value="Submit Request" class="btn btn-primary" data-toggle="modal" data-target="#myModal">

</fieldset>
</form>
</div>
</div>
</div>





<!-- Mood Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Mood content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request Sent!</h4>
      </div>
      <div class="modal-body">
        <p><h1>Please Share!</h1>

					<a href="https://twitter.com/intent/tweet?button_hashtag=NOGOLEGoDJ&text=I%20just%20sent%20a%20request%20via%20%20%23GoDJ%20made%20by%20%40nogoleky%20http%3A%2F%2Fgoo.gl%2FV31Ewl" class="twitter-hashtag-button" data-related="mastashake08,nogoleky">Tweet #NOGOLEGoDJ</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					<div class="fb-share-button" data-href="https://www.facebook.com/NOGOLE" data-layout="button_count"></div>
				</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@stop
