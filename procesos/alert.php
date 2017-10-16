<?php session_start();
require_once '../class/conexion.php';
$propietario=$_SESSION['departamento'];


$sql="SELECT count(estado) as nuevos FROM movimientos where destino=$propietario and estado=2";
$res=mysql_query($sql,Conectar::con());

while($nuevos=mysql_fetch_array($res)){
echo	$nuevos['nuevos'];
}

?>