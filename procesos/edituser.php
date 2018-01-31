<?php
require_once'../class/conexion.php';
$id=$_POST['id'];
$name=$_POST['name'];
$last_name=$_POST['last_name'];
$user=$_POST['user'];
$psw=$_POST['psw'];
$cargo=$_POST['cargo'];
$unidad=$_POST['unidad'];
$departamento=$_POST['departamento'];

if($id==""){
echo 0;
}elseif($psw!=""){
	$psw=md5($_POST['psw']);
	$sql="update login set name='$name',last_name='$last_name',user='$user',password='$psw',permisos='$cargo',unidad='$unidad',departamento='$departamento' where id=$id";
mysql_query($sql,Conectar::con());
echo 1;
	
}else{
	$sql="update login set name='$name',last_name='$last_name',user='$user',permisos='$cargo',unidad='$unidad',departamento='$departamento' where id=$id";
mysql_query($sql,Conectar::con());
echo 1;
}


?>