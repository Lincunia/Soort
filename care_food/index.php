<?php
include('./includes/connection.php');
include('./includes/header.php');
?>
<div class="content-center-lg">
	<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="img/1.jpg" class="d-block w-100 h-50" alt="banner 1">
				<div class="carousel-caption d-none d-md-block">
					<h5>Tu reserva</h5>
					<a type="button" class="btn btn-secondary" href="./know_more.php">Conoce mas</a>
				</div>
			</div>
			<div class="carousel-item">
				<img src="img/2.jpg" class="d-block w-100" alt="banner 2">
			</div>
			<div class="carousel-item">
				<img src="img/3.jpg" class="d-block w-100" alt="banner 3">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only"></span>
		</button>
		<button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only"></span>
		</button>
	</div>
</div>

<?php
include('./includes/footer.php');
?>