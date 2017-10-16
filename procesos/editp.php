<?php
require_once'../class/conexion.php';
$id=$_POST['id'];
$iPermiso=$_POST['iPermiso'];
$Crear=$_POST['Crear'];
$Editar=$_POST['Editar'];
$Eliminar=$_POST['Eliminar'];
$Usuarios=$_POST['Usuarios'];
$Cargos=$_POST['Cargos'];
$Catalogo=$_POST['Catalogo'];
$Estado=$_POST['Estado'];


if($id!=""){
$sql="update permisos set ncargo='$iPermiso',crear='$Crear',editar='$Editar',eliminar='$Eliminar', usuarios='$Usuarios',cargos='$Cargos', catalogo='$Catalogo', estado='$Estado' where id=$id";
mysql_query($sql,Conectar::con());
echo 1;
}else{
	echo 0;
}
?>