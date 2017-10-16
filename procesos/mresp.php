<?php require_once '../class/conexion.php';
 $id=$_POST['id'];
 $name_docto=$_POST['name_docto'];
 $oficio=$_POST['oficio'];


 $obs=$_POST['obs'];




/*Ruta de copia de imagen en carpeta*/
$rutaEnServidor='../archivospdf/'.$oficio;

$rutaTemporal=$_FILES['mimg2']['tmp_name'];
$nombreImagen=$oficio.'.pdf';
$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;

if (!file_exists($rutaEnServidor)) {
    mkdir($rutaEnServidor, 0777, true);
    move_uploaded_file($rutaTemporal,$rutaDestino);
}else{
move_uploaded_file($rutaTemporal,$rutaDestino);
}

/*ruta en BD de imagen en carpeta*/

$rutaEnBD='../archivospdf/'.$oficio.'/';

if($id!="" and $name_docto!="" and $oficio!="" and $rutaTemporal!=""){
$sql="insert into respuesta (id_docto,name_docto,oficio,repository,archive,obs) values('$id','$name_docto','$oficio','$rutaEnBD','$nombreImagen','$obs')";
mysql_query($sql,Conectar::con());
echo 1;
}else{
	echo 0;
}

?>