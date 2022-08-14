<?php
$query='SELECT * FROM client;';
foreach($defConn->query($query) as $row){
    echo "
<tr>
    <td>{$row['id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['level']}</td>
    <td>{$row['amount_mon']}
</tr>";
}
?>
