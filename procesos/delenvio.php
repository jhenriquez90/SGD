<?php require_once '../class/conexion.php';
$id=$_POST['id'];


if($id!=""){
		
	$delete="delete from movimientos where id_mov=$id";
	mysql_query($delete,Conectar::con());
	echo 1;	

}else{
	echo 0;
}


?>
