<?php
include('./includes/connection.php');
include('./includes/header.php');
?>

<div class="container">
	<br /><br />
	<div class="row">
		<div class="jumbotron">
			<h1 class="display-4">Productos</h1>
			<p class="lead">
				Bienvenido a los productos CAREFOOD, donde podras visualizar todos los productos de la cafeteria, cuando
				estes listo, pulsa en el menu, la opcion <strong>"Quiero reservar"</strong>.</p>
			<hr class="my-4">
		</div>

		<?php
		$listaproductos = mysqli_query($link, "SELECT * FROM products;");
		if (!$listaproductos) {
			die('No hay productos para comprar');
		}
		$prod = array();
		foreach ($listaproductos as $producto) {
		?>

			<div class="col-md-3">
				<div class="card w-60">
					<img class="card-img-top" src="./img/<?php echo $producto['image']; ?>.jpg" alt="">
					<div class="card-body">
						<h4 class="card-title">
							<?php echo $producto['name']; ?>
						</h4>
						<h5 class="card-tite">
							<b>$
								<?php echo number_format($producto['prize'], 3, '.', '.'); ?>
							</b>
						</h5>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php
include('./includes/footer.php');
?>