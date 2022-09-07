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
	array_push($prod, $row['name'], $row['prize'], $row['aux_name']);
    }
    for($i=0; $i<count($prod); $i+=3){
?>
    <div name="<?= $prod[$i+2]?>" id="<?= $prod[$i+2]?>">
	    <a href="#<?= $prod[$i+2]?>"> <?= $prod[$i]?>    $ <?=$prod[$i+1]?> </a>
	    <p>
	    <input type="submit" name="<?= $prod[$i+2]?>" value="Comprar">
	    </p>
	</div>
<?php } } ?>
