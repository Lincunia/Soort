<?php
if($_SERVER['PHP_SELF']=='/Alejandra/php/sub/check.php'){
    $query=mysqli_query($link, "SELECT name FROM students WHERE id={$_SESSION['result'][2]};");
    while($row = mysqli_fetch_array($query)) {
	$name=$row["name"];
    }
    unset($query);
    $disp_query=mysqli_query($link, "SELECT * FROM shopping WHERE name_student='{$name}';");
    if(!$disp_query){
	die('No hay productos para comprar');
    }
    if ($disp_query->num_rows > 0) {
	while($row = $disp_query->fetch_assoc()) {

	    echo "<tr>
		<td>{$row['name_prod']}</td>
		<td>{$row['date_of_purch']}</td>
		<td>{$row['amount_mon']}</td>
		<td>{$row['name_student']}</td>
		</tr>";
	}
    } else {
	echo "0 results";
    }
}
if($_SERVER['PHP_SELF']=='/Alejandra/php/sub/list.php'){
    $disp_query=mysqli_query($link, "SELECT * FROM products;");
    if(!$disp_query){
	die('No hay productos para comprar');
    }
    $prod=array();
    foreach($disp_query as $row){

	$tea=str_replace(array('_'), ' ', $row['name']);
	$tea=ucfirst($tea);
	$coffee=$row['prize'];
	$prod=array_merge($prod, array($tea => $coffee));
?>
    <div>
	<input type="checkbox" name="prod_for_them[]" value="<?= $tea ?>">
	<?= $tea ?>
	<label> $ <?= $coffee ?> </label>
    </div>
<?php } } ?>
