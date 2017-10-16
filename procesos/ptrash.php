<?php
require_once '../class/conexion.php';
$id=$_POST['id'];

if($id!=""){
	$sql="delete from permisos where id=$id";
	mysql_query($sql,Conectar::con());
	echo 1;
}else{
	echo 0;
}

?>