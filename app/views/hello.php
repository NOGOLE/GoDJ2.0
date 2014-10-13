<!doctype html>
<html lang="en">
<head>
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
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
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
	</style>
</head>
<body>
	<div class="welcome">
		<h1>Make Your Requests Known</h1>
	</div>
		<div class="song_request">
		<h2>Song Request</h2>
		<form action="http://localhost/godj_api/public/index.php/api/v1/songs" method="POST">
  Name:<input type="text" name="requestor_name"><br>
  Title: <input type="text" name="title"><br>
  Artist:<input type="text" name="artist"><br>
  DJ: <input type="text" name="dj_id" ><br>
  <input type="submit">
</form>
<div>
<div class="mood_request">
<h2>Mood Request</h2>
<form action="http://localhost/godj_api/public/index.php/api/v1/moods" method="POST">
  Name:<input type="text" name="requestor_name"><br>
  Title: <input type="text" name="title"><br>
  DJ: <input type="text" name="dj_id" ><br>
  <input type="submit">
</form>	
		</div>
	
	
</body>
</html>
