@extends('layouts.master')

@section('sidebar')

@stop

@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style>
#about {
color: #000;
}
</style>
<div class="jumbotron" id="about">
<p>
You can contribute to GoDJ in 3 major ways:
</p>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Monetarily</h3>
  </div>
  <div class="panel-body">
    Servers cost money, period. Your financial contribution  is valuable to keeping this software up and running.
</br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="NSQUW5ECR9KHC">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

  </div>
</div>


<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Socially</h3>
  </div>
  <div class="panel-body">
We need help getting the word out about this app and NOGOLE in general! Give us a shout out, this is just as important as money!
<br/>
<a href="https://twitter.com/nogoleky" class="twitter-follow-button" data-show-count="false">Follow @nogoleky</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


<div class="fb-like" data-href="https://www.facebook.com/nogole" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
</div>
</div>


<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Programmatically</h3>
  </div>
  <div class="panel-body">
	Currently we only have  one programmer, yet we have a plethora of ideas for this app! Please feel free to fork us from Github
<a  href="https://github.com/NOGOLE/GoDJ2.0"><img style="margin-top:50px; position: absolute; top: 0; left: 0; border: 0;" src="https://camo.githubusercontent.com/567c3a48d796e2fc06ea80409cc9dd82bf714434/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f6461726b626c75655f3132313632312e706e67" 
alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_left_darkblue_121621.png"></a>

  </div>

</div>

</div>
@stop
