
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



	<input class="form-control " type="text" ng-model="dj_id" placeholder="DJ Name"><br>



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



	<input class="form-control " type="text" ng-model="dj_id" placeholder="DJ Name"><br>



	<input  ng-click="submitMood() " type="button" value="Submit Request" class="btn btn-primary" data-toggle="modal" data-target="#myModal">

</fieldset>
</form>
</div>
</div>
</div>


<!--Angular Modal -->
<div ng-controller="RequestController">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Request Sent to DJ {{dj_id}}!</h3>
        </div>
        <div class="modal-body">
        <h1>Please Share!</h1>
				<p>
					Help us get the word out about GoDJ and NOGOLE in general! Tweet about it, or share and like our Facebook Page!
					<br>
          <!--Google Play -->
        <a href="https://play.google.com/store/apps/details?id=com.nogole.godj2">
				  <img alt="Get it on Google Play"
				       src="https://developer.android.com/images/brand/en_generic_rgb_wo_60.png" />
				</a>
        <br>
        <!--Social Media-->


        <a twitter data-lang="en" data-count='vertical' data-url='http://www.godj.nogole.com' data-via='nogoleky' data-size="medium" data-text='#GoDJ a free party #analytics app for #DJs and #Partiers' ></a>

        <div facebook data-name='Fb Share' data-url='http://www.godj.nogole.com'  data-caption='Test' data-shares='shares'> <a href>Share To facebook<a> <p>Number of Shares: {{shares}}</p> </div>


        <!--Shoutout-->
        <p>
        <h1>Send A Shoutout!</h1>
        <h3>Someone's birthday? Anniversary? Just want to be known? Send a shoutout to the DJ NOW!</h3>
        <form  role="form">
          <fieldset>


      <textarea class="form-control" type="text" ng-model="shoutout_message" placeholder="Message"></textarea><br>


      <input  ng-click="submitShoutout()" type="button"  value="Submit Shoutout" class="btn btn-primary">

    </fieldset>
    </form>
  </p>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" ng-click="ok()">Close</button>
        </div>
    </script>

    </div>
</div>

<!--End Angular Modal -->


<!-- Mood Modal -->
<div id="myModal" class="modal fade" role="dialog" ng-controller="RequestController">
  <div class="modal-dialog">

    <!-- Mood content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request Sent! {{dj_id}}</h4>
      </div>
      <div class="modal-body">
        <h1>Please Share!</h1>
				<p>
					Help us get the word out about GoDJ and NOGOLE in general! Tweet about it, or share and like our Facebook Page!
					<br>
					<a href="https://twitter.com/intent/tweet?button_hashtag=NOGOLEGoDJ&text=I%20just%20sent%20a%20request%20via%20%20%23GoDJ%20made%20by%20%40nogoleky%20http%3A%2F%2Fgoo.gl%2FV31Ewl" class="twitter-hashtag-button" data-related="mastashake08,nogoleky">Tweet #NOGOLEGoDJ</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

					<div class="fb-like" data-href="https://www.facebook.com/nogole" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
				<br>
				<br>
				Don't forget to download the app on the Google Play Store!
				<br>
				<a href="https://play.google.com/store/apps/details?id=com.nogole.godj2">
				  <img alt="Get it on Google Play"
				       src="https://developer.android.com/images/brand/en_generic_rgb_wo_60.png" />
				</a>
				</p>
        <p>
        <h1>Send A Shoutout!</h1>
        <h3>Someone's birthday? Anniversary? Just want to be known? Send a shoutout to the DJ NOW!</h3>
    		<form  role="form">
    			<fieldset>


    	<textarea class="form-control" type="text" ng-model="shoutout_message" placeholder="Message"></textarea><br>


    	<input  ng-click="submitShoutout()" type="button"  value="Submit Shoutout" class="btn btn-primary">

    </fieldset>
    </form>
  </p>


  <div ng-show="show == true" class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Success!</strong> Your message has been sent successfully.
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@stop
