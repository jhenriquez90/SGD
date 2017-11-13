<?php
require_once'../class/conexion.php';
$id=$_POST['id'];
$name=$_POST['name'];
$last_name=$_POST['last_name'];
$user=$_POST['user'];
$psw=$_POST['psw'];


if($id==""){
echo 0;
}elseif($psw!=""){
	$psw=md5($_POST['psw']);
	$sql="update login set name='$name',last_name='$last_name',password='$psw',fecha=NOW() where id=$id";
mysql_query($sql,Conectar::con());
echo 1;
	
}else{
	$sql="update login set name='$name',last_name='$last_name' where id=$id";
mysql_query($sql,Conectar::con());
echo 1;
}


?>