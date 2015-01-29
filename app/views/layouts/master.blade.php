<!-- Stored in app/views/layouts/master.blade.php -->
<!doctype html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!-- Google Tracking Code -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57631954-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>
<!-- Load Angular -->
<script src="bower_resources/angular/angular.min.js"></script>
<!-- Optional: Include the jQuery library -->

<script src="bower_resources/jquery/dist/jquery.min.js"></script>

 <!-- Latest compiled and minified CSS -->
<link  rel="stylesheet" href="bower_resources/bootstrap/dist/css/bootstrap.min.css"/>

<!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
<script src="bower_resources/bootstrap/dist/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <title>GoDJ - A NOGOLE App</title>

<link rel="stylesheet" href="css/master.css"/>
</head>
    <body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/profile">DJ Dashboard</a> |
    <a href="/register">Registration</a> |
    <a href="/contribute">Help Contribute</a> |
  </div>
</nav>




<div class="side_bar">
	@yield('sidebar')
</div>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
