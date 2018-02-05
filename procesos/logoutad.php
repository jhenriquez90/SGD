<?php
require_once '../class/conexion.php';
$id=$_POST['id'];
if($id==""){
echo "0";
}elseif($id!=""){
	$sql="UPDATE login SET estado=0, fechaout=NOW() where id=$id";
$exec=mysql_query($sql,Conectar::con());
echo "1";
}
?>