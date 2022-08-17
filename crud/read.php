<?php
$query='SELECT * FROM client;';
$disp_query=$defConn->query($query);
if(!$disp_query){
?>
<div>
    No hay usuarios registrados, inserta uno
</div>
<?php
}
else{
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
?>
