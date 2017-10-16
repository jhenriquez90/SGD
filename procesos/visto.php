<?php
require_once '../class/conexion.php';
session_start();
$origen=$_SESSION['departamento'];
$usuario=$_SESSION['user'];
$id=$_POST['id'];


if($id!=""){
	$sql="update movimientos set estado=1, hleido=NOW(), usuario='$usuario' where id_mov=$id and origen!=$origen ";
	mysql_query($sql,Conectar::con());
echo 1;
}else{
	echo 0;
}
?>