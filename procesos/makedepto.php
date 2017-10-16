<?php 
require_once '../class/conexion.php';
$id=$_POST['id'];
$Cdepto=$_POST['Cdepto'];

if($id!="" and $Cdepto!=""){
	$sql="insert into departamentos (nombre,idunidades) value('$Cdepto','$id')";
	mysql_query($sql,Conectar::con());
	echo 1;
}else{
	echo 0;
}