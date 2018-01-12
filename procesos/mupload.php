<?php
require_once '../class/conexion.php';

$id=$_POST['id'];

$data="select*from archivos where id_docto=$id";
$data2=mysql_query($data,Conectar::con());
while($row=mysql_fetch_array($data2)){
/*Ruta de copia de imagen en carpeta*/
$oficio=$row['oficio'];
$rutaEnServidor='../archivospdf/'.$oficio;

$rutaTemporal=$_FILES['mimg']['tmp_name'];
$nombreImagen=$oficio.'.pdf';
$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;

if (!file_exists($rutaEnServidor)) {
    mkdir(utf8_decode($rutaEnServidor), 0777, true);
    move_uploaded_file($rutaTemporal,utf8_decode($rutaDestino));
}else{
move_uploaded_file($rutaTemporal,utf8_decode($rutaDestino));
}

/*ruta en BD de imagen en carpeta*/

$rutaEnBD='../archivospdf/'.$oficio.'/';



if($id!="" and $rutaTemporal!=""){
$sql="update archivos set repository='$rutaEnBD', archive='$nombreImagen' where id_docto=$id";
mysql_query($sql,Conectar::con());
echo 1;
}else{
	echo 0;
}
}
?>