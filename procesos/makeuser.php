
<?php 
require_once '../class/conexion.php';
session_start();
$name=$_POST['name'];
$last_name=$_POST['last_name'];
$user=$_POST['user'];
$psw=md5($_POST['psw']);
$unidad=$_POST['unidad'];
$depto=$_POST['depto'];
$cargo=$_POST['cargo'];

if($name!="" and $last_name!="" and $user!="" and $psw!="" and $cargo!=""){
$sql="insert into login (name,last_name,user,password,permisos,unidad,departamento) values('$name','$last_name','$user','$psw','$cargo','$unidad','$depto')";
	mysql_query($sql,Conectar::con());
	echo 1;
}else{
	echo 0;
}

?>