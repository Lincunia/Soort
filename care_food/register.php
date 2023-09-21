<?php
include('./includes/connection.php');
include('./includes/header.php');
?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card">
				<div class="card-body">
					<form action="./functions/create.php" method="POST">
						<h1>Pestaña de registro</h1>
						<div class="form-group">
							<input type="number" class="form-control" name="id" placeholder="Identificación" min="1000000000" max="9999999999" autofocus>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="Nombre de usuario">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="surname" placeholder="Apellido de usuario">
						</div>
						<div class="form-group mb-3">
							<select class="custom-select" name="level_num">
								<option disabled selected>Curso</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
							</select>
							<select class="custom-select" name="level_let">
								<option disabled selected>Salón</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
							</select>
						</div>
						<div class="form-group">
							<input type="number" class="form-control" name="phone_num" placeholder="Teléfono" min="1000000000" max="9999999999">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="pass" placeholder="Contraseña">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Correo electrónico">
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
							<button class="btn btn-success btn-block" name="insert_info">Guargar información</button>
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