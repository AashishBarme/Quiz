<?php define(HOME_URL,"http://localhost/php/php_quiz/frontend/"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Play Quiz</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= HOME_URL; ?>assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

<section class="header">
		<nav class="navbar navbar-light bg-light">
  		<a class="navbar-brand" href="#">
    		<img src="" width="30" height="30" class="d-inline-block align-top" alt="">
  		</a>
		</nav>
</section>

	<section class="quiz" style="padding-bottom:50px;">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div id="quiz">
				</div>
				<button id="submit" class="btn btn-primary">
					Submit
				</button>
				<button id="reload" class=" btn btn-danger">
					Reload
				</button>
			</div>

			<div class="col-md-4">
				Your Marks : <span id="mark"></span>
				<div id="gif-welldone">
					<iframe src="https://giphy.com/embed/Zcm5DaspYzhTxstkF4" width="100%" height="350" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
				</div>
				<div id="gif-bad">
					<iframe src="https://giphy.com/embed/ReliTw4LKkIgTNiB5e" width="100%" height="350" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="<?= HOME_URL; ?>assets/js/main.js"></script>
</body>
</html>

