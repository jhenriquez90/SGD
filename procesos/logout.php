<?php 
require_once '../class/conexion.php';
session_start(); 
$sql="UPDATE login SET estado=0, fechainout=NOW() where id=".$_SESSION['id']."";
$exec=mysql_query($sql,Conectar::con());

    session_unset();
    session_destroy(); 
	
    header('location:../index.php'); 
?>