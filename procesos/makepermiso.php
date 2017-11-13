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
$Respuesta=$_POST['Respuesta'];

if($iPermiso!="" and $Crear!="" and $Editar!="" and $Eliminar!="" and $Catalogo!="" and $Estado!="" and $Respuesta!=""){
	$sql="insert into permisos (ncargo,crear,editar,eliminar,usuarios,cargos,catalogo,estado,respuesta) values('$iPermiso',$Crear,$Editar,$Eliminar,$Usuarios,$Cargos,$Catalogo,$Estado,$Respuesta)";
	mysql_query($sql,Conectar::con());
	echo 1;
}else{
	echo 0;
}

?>