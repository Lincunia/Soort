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
	$prod=array_merge($prod, array("{$row['name']}"=>$row['prize']));
    }
    foreach($prod as $tom => $tord){
?>
	<div>
	    <input type="checkbox" name="disp_query[]" value="<?= $tom?>">
<?php
$tom = str_replace(array('_'), ' ', $tom);
echo ucfirst($tom);
?>
	    <label>$ <?= $tord?> </label>
	</div>
<?php }
} ?>
