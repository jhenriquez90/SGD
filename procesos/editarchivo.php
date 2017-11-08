<?php
require_once '../class/conexion.php';
$id=$_POST['id'];
$name_docto=$_POST['name_docto'];
$oficio=$_POST['oficio'];
$num_archive=$_POST['num_archive'];
$num_gabeta=$_POST['num_gabeta'];
$num_fila=$_POST['num_fila'];
$fechai=$_POST['fechai'];
$obs=$_POST['obs'];

if($id!=""){
$sql="update archivos set name_docto='$name_docto', oficio='$oficio', num_archive='$num_archive', num_gabeta='$num_gabeta', num_fila='$num_fila', fechai='$fechai', obs='$obs' where id_docto=$id";
mysql_query($sql,Conectar::con());
echo 1;
}else{
	echo 0;
}


?>