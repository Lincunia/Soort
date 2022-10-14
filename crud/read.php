<?php
if($_SERVER['PHP_SELF']=='/Soort/index.php'){
    $query='SELECT * FROM client;';
    $disp_query=$defConn->query($query);
    if(!$disp_query){
	die('No hay usuarios registrados, inserta uno');
    }
    foreach($disp_query as $row){
	echo "
	<tr>
	    <td>{$row['id']}</td>
	    <td>{$row['name']}</td>
	    <td>{$row['level']}</td>
	    <td>{$row['amount_mon']}
	</tr>";
    }
}
if($_SERVER['PHP_SELF']=='/Soort/sub/list.php'){
    $query='SELECT * FROM products;';
    $disp_query=$defConn->query($query);
    if(!$disp_query){
	die('No hay productos para comprar');
    }
    $prod=array();
    foreach($disp_query as $row){

	$tom=str_replace(array('_'), ' ', $row['name']);
	$tom=ucfirst($tom);
	$tord=$row['prize'];
	$prod=array_merge($prod, array($tom => $tord));
?>
    <div>
	<input type="checkbox" name="dieter_bohlen[]" value="<?= $tom ?>">
	<?= $tom ?>
	<label >$ <?= $tord ?> </label>
	<input type="hidden" name="pecunio[]" value="<?= $tord ?>">
    </div>
<?php } } ?>
