<?php 
require_once '../class/conexion.php';
session_start();

$id=$_POST['id'];
$departamentos=$_POST['departamentos'];

/*var_dump( explode( ',', $departamentos ) );*/
 $arreglo=explode( ',', $departamentos );

if($departamentos!="undefined" and $departamentos!="null"){
for ($i=0; $i < count($arreglo) ; $i++) { 
	
$sql="insert into movimientos (id_docto,origen,destino,henviado) value(".$id.",".$_SESSION['departamento'].",".$arreglo[$i].",NOW())";
mysql_query($sql,Conectar::con());

}
echo 1;
}
else{
	echo 0;
}
?>