<!-- Stored in app/views/layouts/master.blade.php -->
<!doctype html>
<html lang="en">
<head>

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional: Include the jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <meta charset="UTF-8">
        <title>GoDJ - A NOGOLE App</title>
      <style>
                @import url(//fonts.googleapis.com/css?family=Lato:700);

                body {
                        margin:0;
                        font-family:'Lato', sans-serif;
                        text-align:center;
                        color: #999;


                }

                .welcome {
                        width: 400px;
                        height: 200px;
                        position: absolute;
                        left: 50%;
                        top: 25%;
                        margin-left: -150px;
                        margin-top: -100px;
                }

                a, a:visited {
                        text-decoration:none;
                }

                h1 {
                        font-size: 32px;
                        margin: 16px 0 0 0;
                }

	.side_bar {

	}
        </style>
</head>
    <body>

<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
  <div class="container">
    <a href="http://localhost/godj_api/public/index.php/">Home</a> |
  <a href="http://localhost/godj_api/public/index.php/login">DJ Login</a> |
  <a href="http://localhost/godj_api/public/index.php/register">Registration</a> |
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
