<?php 
require_once '../class/conexion.php';
session_start();

$id=$_POST['id'];
$departamentos=$_POST['departamentos'];

/*var_dump( explode( ',', $departamentos ) );*/
 $arreglo=explode( ',', $departamentos );

if($departamentos!="undefined" and $departamentos!="null"){
for ($i=0; $i < count($arreglo) ; $i++) { 
$query="SELECT a.id_docto,b.id_docto,a.destino,b.propietario FROM movimientos as a inner join archivos as b on (a.id_docto=b.id_docto) where a.id_docto=$id and a.destino=$arreglo[$i]";
$sql1=mysql_query($query,Conectar::con());
$row=mysql_num_rows($sql1);
if($row>=1){
	echo 2;
}
else{
$sql="insert into movimientos (id_docto,origen,destino,henviado) value(".$id.",".$_SESSION['departamento'].",".$arreglo[$i].",NOW())";
mysql_query($sql,Conectar::con());
}
}
echo 1;
}
else{
	echo 0;
}
?>