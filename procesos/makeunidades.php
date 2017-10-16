<?php
require_once '../class/conexion.php';

$unidad=$_POST['Cuni'];

if($unidad!=""){
$sql="insert into unidades (nombre) value('$unidad')";
mysql_query($sql,Conectar::con());	
	echo 1;
}else{
	echo 0;
}

?>