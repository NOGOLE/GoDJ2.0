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
                      //  margin:0;
                       // font-family:'Lato', sans-serif;
                       // text-align:center;
                       // color: #999;
			margin: 0;
	padding: 0;
	color: #FFF;
	font: normal 10pt "Trebuchet MS",Helvetica,sans-serif;
	//background: #EFEFEF;
       background-color: #F0A830;
       background-image:url(http://godj.nogole.com/images/background.jpg) ;
	background-size:115%;
 	

                }

                .welcome {
                        width: 400px;
                        height: 200px;
                        position: absolute;
                        left: 40%;
                        top: 25%;
			//right: 50%
			//bottom: 50%
                        margin-left: -150px;
                        margin-top: -100px;
			color: #FFF;
                }
		.request_form {
		}

		.request_form_field {
			//background-color: #666;
	
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
	.container {
	padding: 20px;
	margin: 30px 100px;
	font-size: 1.0em;
	text-align: center;
	left:40%;
	border-top: 1px solid #C9E0ED;
	}
        </style>
</head>
    <body>

<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
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
