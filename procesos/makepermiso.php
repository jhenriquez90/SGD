<?php
require_once'../class/conexion.php';
$iPermiso=$_POST['iPermiso'];
$Crear=$_POST['Crear'];
$Editar=$_POST['Editar'];
$Eliminar=$_POST['Eliminar'];
$Usuarios=$_POST['Usuarios'];
$Cargos=$_POST['Cargos'];
$Catalogo=$_POST['Catalogo'];
$Estado=$_POST['Estado'];

if($iPermiso!="" and $Crear!="" and $Editar!="" and $Eliminar!="" and $Catalogo!="" and $Estado!=""){
	$sql="insert into permisos (ncargo,crear,editar,eliminar,usuarios,cargos,catalogo,estado) values('$iPermiso',$Crear,$Editar,$Eliminar,$Usuarios,$Cargos,$Catalogo,$estado)";
	mysql_query($sql,Conectar::con());
	echo 1;
}else{
	echo 0;
}

?>