<?php session_start(); 
require_once '../class/conexion.php';
$CriterioBusqueda=$_POST['CriterioBusqueda'];
$propietario=$_SESSION['departamento'];

if($CriterioBusqueda!=""){
$sql="select id_docto,name_docto,oficio,asignado,fecha,num_archive,num_gabeta,num_fila,concat(repository,archive) as url,obs from archivos where propietario='".$propietario."' and (oficio LIKE '%".$CriterioBusqueda."%' OR name_docto LIKE '%".$CriterioBusqueda."%')"; 
$res=mysql_query($sql,Conectar::con());
  $count=mysql_num_rows($res);
if($count>=1){  
echo '<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11 ">
<table class="table app-tsearch">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre del Documento</th>
            <th>Número de Oficio</th>
            <th>Fecha de Creación</th> 
            <th>Observación</th>            
            </tr>
        </thead>';
        /*Desarrollado por Jorge Henriquez en colaboracion con el Departamento de Desarrollo de Telemática */
         
      while($reg=mysql_fetch_array($res)){
echo  '<tbody>
<tr>
  <td>'.$reg['id_docto'].'</td>
    <td>'.$reg['name_docto'].'</td>
    <td>'.$reg['oficio'].'</td>
    <td>'.date("d/m/Y ",strtotime($reg['fecha'])).'</td>    
    <td>'.$reg['obs'].'</td>    
    <td><div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="radio" name="optionsRadios" id="optionsRadios" value="'.$reg['id_docto'].'" autocomplete="off"> Seleccionar
  </label>
  </div></td>
     </ul>
</div>
</td>
            </tr>
</tbody></table>';
echo '<div class="btn btn-success EnviarResp" name="EnviarResp">Responder</div>
<div class="app-divider"></div> ';
}
  
	echo '</div><script src="../js/main2.js"></script>';
}elseif($count==""){
  echo 'No se encontraron resultados en la búsqueda...';
}
}else{
	echo 'Ingrese Información para realizar la búsqueda...';
}
/*final if principal*/
?>
