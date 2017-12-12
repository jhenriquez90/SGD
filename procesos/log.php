<?php session_start(); 
require_once '../class/conexion.php';

$user=$_POST['usuario'];
$pasw=md5($_POST['pasw']);
$sql1="UPDATE login set estado=1, fechainout=NOW() where user='$user' and password='$pasw' ";
$query1=mysql_query($sql1,Conectar::con());

$sql="select a.id,a.name,a.last_name,a.user,a.password,a.permisos,a.unidad,a.departamento,b.nombre as nameb,c.nombre as namec,a.estado from login as a inner join unidades as b on a.unidad=b.id inner join departamentos as c on a.departamento=c.id where user='$user' and password='$pasw'";
$query=mysql_query($sql,Conectar::con());
$result=mysql_num_rows($query);


if($result==1){

	
 while($usuarios=mysql_fetch_array($query)){
$_SESSION['id']=$usuarios['id'];
$_SESSION['user']=$usuarios['user'];
$_SESSION['nombre']=$usuarios['name'];
$_SESSION['apellido']=$usuarios['last_name'];
$_SESSION['nameb']=$usuarios['nameb'];
$_SESSION['namec']=$usuarios['namec'];
$_SESSION['cargo']=$usuarios['permisos'];
$_SESSION['unidad']=$usuarios['unidad'];
$_SESSION['departamento']=$usuarios['departamento'];
$_SESSION['estado']=$usuarios['estado'];
}
	echo 1;

}else{
	echo 0;
} 
?>