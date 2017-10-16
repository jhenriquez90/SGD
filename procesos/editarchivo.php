<?php
require_once '../class/conexion.php';
$id=$_POST['id'];
$name_docto=$_POST['name_docto'];
$oficio=$_POST['oficio'];
$num_archive=$_POST['num_archive'];
$num_gabeta=$_POST['num_gabeta'];
$num_fila=$_POST['num_fila'];
$fecha=$_POST['fecha'];
$fechai=$_POST['fechai'];
$asignado=$_POST['asignado'];
$estado=$_POST['estado'];
$obs=$_POST['obs'];

if($id!=""){
$sql="update archivos set name_docto='$name_docto', oficio='$oficio', num_archive='$num_archive', num_gabeta='$num_gabeta', num_fila='$num_fila', fecha='$fecha',fechai='$fechai', asignado='$asignado', estado='$estado', obs='$obs' where id_docto=$id";
mysql_query($sql,Conectar::con());
echo 1;
}else{
	echo 0;
}


?>