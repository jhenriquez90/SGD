<?php session_start();
require_once '../class/conexion.php';
require_once("../class/obj_archivo.php");
$obj_1=new Tarchivos();
$ObtenerRestringir=$obj_1->getrestringir();
$CriterioBusqueda=$_POST['CriterioBusqueda'];
$option1=$_POST['option1'];
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

$propietario=$_SESSION['departamento'];


if($CriterioBusqueda!="" and $option1=='option1'){
  if($fecha1!=""){
	$sql="select id_docto,name_docto,oficio,asignado,fecha,num_archive,num_gabeta,num_fila,concat(repository,archive) as url,obs from archivos where propietario='".$propietario."' and (oficio LIKE '%".$CriterioBusqueda."%' OR name_docto LIKE '%".$CriterioBusqueda."%' OR obs LIKE '%".$CriterioBusqueda."%'  and fecha BETWEEN '".$fecha1."' AND '".$fecha2."') ";
}else{
$sql="select id_docto,name_docto,oficio,asignado,fecha,num_archive,num_gabeta,num_fila,concat(repository,archive) as url,obs from archivos where propietario='".$propietario."' and (oficio LIKE '%".$CriterioBusqueda."%' OR name_docto LIKE '%".$CriterioBusqueda."%' OR obs LIKE '%".$CriterioBusqueda."%') ";

}
  $res=mysql_query($sql,Conectar::con());
  $count=mysql_num_rows($res);
if($count>=1){  
echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
<table class="table app-tsearch">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre del Documento</th>
            <th>Número de Oficio</th>
            <th>Fecha de Creación</th> 
            <th>Usuario de Creación</th>          
            <th>Observación</th>
            <th>Respuestas</th>
            <th>Archivo</th>
            </tr>
        </thead>';
        /*Desarrollado por Jorge Henriquez en colaboracion con el Departamento de Desarrollo de Telemática */
         for ($p=0; $p <sizeof($ObtenerRestringir) ; $p++) { 
      while($reg=mysql_fetch_array($res)){
echo  '<tbody>';
if($reg['url']==""){
echo '<tr bgcolor="#efe44c">';
}
  echo '<td>'.$reg['id_docto'].'</td>
    <td>'.$reg['name_docto'].'</td>
    <td>'.$reg['oficio'].'</td>
    <td>'.date("d/m/Y ",strtotime($reg['fecha'])).'</td>
    <td>'.$reg['asignado'].'</td>
    <td>'.$reg['obs'].'</td>    
     <td data="'.$reg['id_docto'].'"><span class="ver glyphicon glyphicon-eye-open"></span></td>';
     if($reg['url']!=""){
       echo '<td><a target="_blank" href="'.$reg['url'].'"><img class="app-pdfimg" src="../img/pdf.png"></a></td>';
        }else{ echo '<td data="'.$reg['id_docto'].'"><a class="plus" href="#"><img class="app-pdfimg" src="../img/spdf.png"></a></td>';}
         echo '<td><div class="btn-group">
             
     
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acción <span class="caret"></span>
  </button>
  <ul class="dropdown-menu app-dropdown-menu">';
  if($reg['url']!=""){
    echo '<li><a href="enviar?id='.$reg['id_docto'].'" class="">Enviar</a></li>';
  }else{echo '<li><a class="label label-danger">Falta Archivo</a></li>'; }
    if($ObtenerRestringir[$p]['editar']==1){
   echo '<li data="'.$reg['id_docto'].'"><a href="#" class="edit2">Editar</a></li>';
     }
     if($ObtenerRestringir[$p]['eliminar']==1){
   echo '<li role="separator" class="divider"></li>
    <li data="'.$reg['id_docto'].'"><a href="#" class="trash2">Eliminar</a></li>';
  }
 echo '</ul>
</div>
</td>
            </tr>
</tbody>';
}
  }
	echo '</table></div> <script src="../js/main2.js"></script>';
}elseif($count==""){
  echo 'No se encontraron resultados en la búsqueda...';
}
}/*final if principal*/
elseif($CriterioBusqueda!="" and $option1=='option2'){
  if($fecha1!="" and $fecha2!=""){
$sql="SELECT b.id_mov,a.id_docto,c.nombre as origen,d.nombre as destino,a.name_docto,a.oficio,concat(a.repository,a.archive) as url,b.henviado,b.hleido,b.usuario,a.asignado,e.estado,a.obs FROM archivos as a inner join movimientos as b on (a.id_docto=b.id_docto) left join departamentos as c on(b.origen=c.id) inner join departamentos as d on (b.destino=d.id) inner join estados as e on (e.id_estado=b.estado) where origen='".$propietario."' and (a.oficio LIKE '%".$CriterioBusqueda."%' OR a.name_docto LIKE '%".$CriterioBusqueda."%' OR d.nombre LIKE '%".$CriterioBusqueda."%' OR a.obs LIKE '%".$CriterioBusqueda."%' and (CAST(b.henviado as DATE) BETWEEN '".$fecha1."' AND '".$fecha2."') ) group by id_docto  ";
}else{
  $sql="SELECT b.id_mov,a.id_docto,c.nombre as origen,d.nombre as destino,a.name_docto,a.oficio,concat(a.repository,a.archive) as url,b.henviado,b.hleido,b.usuario,a.asignado,e.estado,a.obs FROM archivos as a inner join movimientos as b on (a.id_docto=b.id_docto) left join departamentos as c on(b.origen=c.id) inner join departamentos as d on (b.destino=d.id) inner join estados as e on (e.id_estado=b.estado) where origen='".$propietario."' and (oficio LIKE '%".$CriterioBusqueda."%' OR name_docto LIKE '%".$CriterioBusqueda."%' OR d.nombre LIKE '%".$CriterioBusqueda."%') OR a.obs LIKE '%".$CriterioBusqueda."%' group by id_docto  ";
}
  $res=mysql_query($sql,Conectar::con());
  $count=mysql_num_rows($res);
if($count>=1){  
echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
<table class="table app-tsearch">
        <thead>
        <tr>
            
            <th>Origen del Documento</th>
            <th>Destinatario del Documento</th>
            <th>Nombre del Documento</th>
            <th>Número de Oficio</th>
            <th>Receptor</th>
            <th>Estado</th>
            <th>Observación</th>
            <th>Fecha que se Envió el documento</th>
            <th>Fecha que Recibió el documento</th>
            <th>Respuestas</th>
            <th>Archivo</th>
            </tr>
        </thead>';
        /*Desarrollado por Jorge Henriquez en colaboracion con el Departamento de Desarrollo de Telemática */
         for ($p=0; $p <sizeof($ObtenerRestringir) ; $p++) { 
      while($reg=mysql_fetch_array($res)){
echo  '<tbody>
<tr>
    
    <td>'.$reg['origen'].'</td>
    <td>'.$reg['destino'].'</td>
    <td>'.$reg['name_docto'].'</td>
     <td>'.$reg['oficio'].'</td>
          <td>'.$reg['usuario'].'</td>
          <td>'.$reg['estado'].'</td>
           <td>'.$reg['obs'].'</td>
            <td>'.$fecha=date("d/m/Y h:i:s",strtotime($reg['henviado'])).'</td>
            <td>'.$fecha=date("d/m/Y h:i:s",strtotime($reg['hleido'])).'</td>
            <td data="'.$reg['id_docto'].'"><span class="ver glyphicon glyphicon-eye-open"></span></td>
            <td><a target="_blank" href="'.$reg['url'].'"><img class="app-pdfimg" src="../img/pdf.png"></a></td>
            <td><div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acción <span class="caret"></span>
  </button>
  <ul class="dropdown-menu app-dropdown-menu">
     <li><a href="respuesta?id='.$reg['id_docto'].'" class="fin">Respuesta</a></li>';
    if($ObtenerRestringir[$p]['editar']==1){
   echo '<li data="'.$reg['id_docto'].'"><a href="#" class="edit">Editar</a></li>';
     }
    echo '<li data="'.$reg['id_docto'].'"><a href="#" class="detalle">Detalle</a></li>';
    if($ObtenerRestringir[$p]['eliminar']==1){
    echo '<li role="separator" class="divider"></li>
    <li data="'.$reg['id_mov'].'"><a href="#" class="trashE">Eliminar</a></li>';
     }
 echo' </ul>
</div>
</td>
            </tr>
</tbody>';
}
  }
  echo '</table></div> <script src="../js/main2.js"></script> ';
}elseif($count==""){
  echo 'No se encontraron resultados en la búsqueda...';
}


}/*final 2do if principal*/


elseif($CriterioBusqueda!="" and $option1=='option3'){
  if($fecha1){
$sql="SELECT b.id_mov,a.id_docto,c.nombre as destino,d.nombre as origen,a.name_docto,a.oficio,a.num_archive,a.num_gabeta,a.num_fila,concat(a.repository,a.archive) as url,b.henviado,b.hleido,a.asignado,a.obs,e.id_estado FROM archivos as a inner join movimientos as b on (a.id_docto=b.id_docto) left join departamentos as c on(b.destino=c.id) inner join departamentos as d on (b.origen=d.id) inner join estados as e on (e.id_estado=b.estado) where destino='".$propietario."' and (oficio LIKE '%".$CriterioBusqueda."%' OR name_docto LIKE '%".$CriterioBusqueda."%' OR d.nombre LIKE '%".$CriterioBusqueda."%' OR a.obs LIKE '%".$CriterioBusqueda."%' and CAST(b.henviado as DATE) BETWEEN '".$fecha1."' AND '".$fecha2."')  ";
}else{
$sql="SELECT b.id_mov,a.id_docto,c.nombre as destino,d.nombre as origen,a.name_docto,a.oficio,a.num_archive,a.num_gabeta,a.num_fila,concat(a.repository,a.archive) as url,b.henviado,b.hleido,a.asignado,a.obs,e.id_estado FROM archivos as a inner join movimientos as b on (a.id_docto=b.id_docto) left join departamentos as c on(b.destino=c.id) inner join departamentos as d on (b.origen=d.id) inner join estados as e on (e.id_estado=b.estado) where destino='".$propietario."' and (oficio LIKE '%".$CriterioBusqueda."%' OR name_docto LIKE '%".$CriterioBusqueda."%' OR d.nombre LIKE '%".$CriterioBusqueda."%')  ";


}
  $res=mysql_query($sql,Conectar::con());
  $count=mysql_num_rows($res);
if($count>=1){  
echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
<table class="table app-tsearch">
        <thead>
        <tr>
            
             
            <th>Origen del Documento</th>
            <th>Destinatario del Documento</th>
            <th>Nombre del Documento</th>
            <th>Número de Oficio</th>
            <th>Observación</th>
            <th>Fecha que Recibió el documento </th>
            <th>Respuestas</th>
            <th>Archivo</th>
            </tr>
        </thead>';
        /*Desarrollado por Jorge Henriquez en colaboracion con el Departamento de Desarrollo de Telemática */
         for ($p=0; $p <sizeof($ObtenerRestringir) ; $p++) { 
      while($reg=mysql_fetch_array($res)){
echo  '<tbody>
<tr>
    
    <td>'.$reg['origen'].'</td>
    <td>'.$reg['destino'].'</td>
    <td>'.$reg['name_docto'].'</td>
     <td>'.$reg['oficio'].'</td>
          
          
           <td>'.$reg['obs'].'</td>
            <td>'.$fecha=date("d/m/Y h:i:s",strtotime($reg['henviado'])).'</td>
            <td>'.$fecha=date("d/m/Y h:i:s",strtotime($reg['hleido'])).'</td>
            <td data="'.$reg['id_docto'].'"><span class="ver glyphicon glyphicon-eye-open"></span></td>
            <td><a target="_blank" href="'.$reg['url'].'"><img class="app-pdfimg" src="../img/pdf.png"></a></td>
            <td><div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acción <span class="caret"></span>
  </button>
  <ul class="dropdown-menu app-dropdown-menu">
     <li><a href="respuesta?id='.$reg['id_docto'].'" class="fin">Respuesta</a></li>';
    if($ObtenerRestringir[$p]['editar']==1){
   echo '<li data="'.$reg['id_docto'].'"><a href="#" class="edit">Editar</a></li>';
     }
    echo '<li data="'.$reg['id_docto'].'"><a href="#" class="detalle">Detalle</a></li>';
    if($ObtenerRestringir[$p]['eliminar']==1){
    echo '<li role="separator" class="divider"></li>
    <li data="'.$reg['id_mov'].'"><a href="#" class="trashE">Eliminar</a></li>';
     }
 echo' </ul>
</div>
</td>
            </tr>
</tbody>';
}
  }
  echo '</table></div> <script src="../js/main2.js"></script> ';
}elseif($count==""){
  echo 'No se encontraron resultados en la búsqueda...';
}


}/*final 3do if principal*/
else{
	echo 'Ingrese Información para realizar la búsqueda...';
}

 ?>