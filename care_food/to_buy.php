<?php
include('./includes/connection.php');
include('./includes/header.php');

foreach ($_SESSION['result'] as $wea) {
    echo $wea . '<br>';
}
//echo 'Bienvenido, '.$_SESSION['result'][1];
?>


<form>
    <div class="card">
        <div class="card-body justify-content-md-center">
            <label for="cathegory">Categoria</label>
            <select class="form-control" name="cathegory">
                <option value="preschool">Pre-escolar</option>
                <option value="elementary">Primaria</option>
                <option value="baccalaureate">Bachillerato</option>
            </select>
            <br>
            <label for="level">Grado</label>
            <select class="form-control" name="level">
                <option>6</option>
            </select>
        </div>
        <div class="card-body justify-content-md-center">
            <label for="products">Grado</label>
            <select class="form-control" name="products">
                <?php
                $listaproductos = mysqli_query($link, "SELECT * FROM products;");
                if (!$listaproductos) {
                    die('No hay productos para comprar');
                }
                $prod = array();
                foreach ($listaproductos as $producto) {
                ?>
                    <option><?= $producto['name']; ?></option>
                    <?php echo number_format($producto['prize'], 3, '.', '.'); ?>
                <?php } ?>
            </select>
        </div>
    </div>
</form>
<?php
include('./includes/footer.php');
?>