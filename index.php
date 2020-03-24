<?php include("inc/header.php"); ?>
<section class="header">
		<nav class="navbar navbar-light bg-light">
  		<a class="navbar-brand" href="#">
    		<img src="" width="30" height="30" class="d-inline-block align-top" alt="">
  		</a>
		</nav>
</section>

	<section class="quiz">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<!-- Quiz Pattern -->
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
<?php include("inc/footer.php"); ?>
