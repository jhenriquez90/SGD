<?php
session_start();
require_once '../class/conexion.php';
$num_oficio=$_GET['num_oficio'];
$propietario=$_SESSION['departamento'];

if($num_oficio!=""){
$sql="SELECT * FROM archivos where oficio like '%".$num_oficio."%' and propietario=$propietario";
$res=mysql_query($sql,Conectar::con());
$reg=mysql_num_rows($res);
if($reg>=1){
	echo 1;
}else{
	echo 0;
}

}
?>