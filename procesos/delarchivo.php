<?php require_once '../class/conexion.php';
$id=$_POST['id'];
$sql="select concat(repository,archive) as urlp from archivos where id_docto=$id";
$result=mysql_query($sql,Conectar::con());

if($id!=""){

while ($row=mysql_fetch_array($result)){
	$path=$row['urlp'];
	
	if(file_exists($path))
	{
	unlink($path);
	$delete="delete from archivos where id_docto=$id";
	mysql_query($delete,Conectar::con());
	echo 1;
	

}else{
	$delete="delete from archivos where id_docto=$id";
	mysql_query($delete,Conectar::con());
	echo 1;
}
}

}
else{
	echo 0;
}
?>


