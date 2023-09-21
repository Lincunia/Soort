<?php
include('./includes/connection.php');
include('./includes/header.php');
?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card">
				<div class="card-body">
					<form action="./functions/read.php" method="POST">
						<h1>Iniciar sesión</h1>
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Correo electrónico" value="perdomovelasquezsebastian10c@gmail.com">
						</div>
						<div class="form-group">
							<input type="number" class="form-control" name="id" placeholder="Identificación" value=1013097421>
						</div>
						<?php if (isset($_SESSION['message']) || isset($_SESSION['prop'])) { ?>
							<div class="<?= $_SESSION['prop'] ?>" role="alert">
								<?= $_SESSION['message'] ?>
							</div>
						<?php
							unset($_SESSION);
						}
						?>
						<div class="form-group">
							<button class="btn btn-success btn-block" name="check_out">Guargar información</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include('./includes/footer.php');
?>