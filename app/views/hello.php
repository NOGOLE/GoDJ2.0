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
			width: 400px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 25%;
			margin-left: -150px;
			margin-top: -100px;
		}

		.song_request {
		}

		.mood_request {
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
	Go DJ - A NOGOLE App
	<div class="welcome">
		<h1>Make Your Requests Known</h1>
		<div class="song_request">
		<h2>Song Request</h2>
		<form action="http://localhost/godj_api/public/index.php/api/v1/songs" method="POST">
  <input type="text" name="requestor_name" placeholder="Your Name"><br>
  <input type="text" name="title" placeholder="Song Title"><br>
  <input type="text" name="artist" placeholder="Artist"><br>
  <input type="text" name="dj_id" placeholder="DJ Name"><br>
  <input type="submit" value="Submit Request">
</form>
</div>
<div class="mood_request">
<h2>Mood Request</h2>
<form action="http://localhost/godj_api/public/index.php/api/v1/moods" method="POST">
  <input type="text" name="requestor_name" placeholder="Your Name"><br>
  <input type="text" name="title" placeholder="What Mood Are You Looking For?"><br>
  <input type="text" name="dj_id" placeholder="DJ Name"><br>
  <input type="submit" value="Submit Request">
</form>	
		</div>
	
</div>
</body>
</html>
