<?php
require_once '../class/conexion.php';
session_start();
$docto=$_POST['docto'];
$oficio=$_POST['oficio'];
$num_archive=$_POST['num_archive'];
$num_gaveta=$_POST['num_gaveta'];
$num_fila=$_POST['num_fila'];
$obs=$_POST['obs'];
$usersubio=$_SESSION['user'];
$propietario=$_SESSION['departamento'];

if($docto!="" and $oficio!=""){
$sql="insert into archivos (name_docto,oficio,propietario,num_archive,num_gabeta,num_fila,obs,fecha,asignado) values('$docto','$oficio','$propietario','$num_archive','$num_gaveta','$num_fila','$obs',NOW(),'$usersubio')";
mysql_query($sql,Conectar::con());

echo 1;	
}else{
	echo 0;
}

?>