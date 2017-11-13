<?php
require_once '../class/conexion.php';
require_once("../class/obj_archivo.php");
session_start();
if($_SESSION['user']=="")
{
header("location:../procesos/logout.php");
} 
$obj_1=new Tarchivos();
$ObtenerRespuesta=$obj_1->getrespuesta();
?>
<div class="table-responsive">
<section id="tableArchivo">
        <table class="table table-bordered">
        <thead>
        <tr>
            <th>Oficio Principal </th>
            <th>Unidad</th>
            <th>Departamento</th>
            <th>Nombre del Documento</th>
            <th>Número de Oficio de Respuesta</th>
            <th>Fecha de Respuesta</th>
            <th>Archivo</th>
            </tr>
        </thead>
        <?php for($i = 0; $i < sizeof($ObtenerRespuesta); $i++){ ?>
<tbody>
<tr>
    <td><?php echo $ObtenerRespuesta[$i]['OficioO']; ?></td>
    <td><?php echo $ObtenerRespuesta[$i]['unidades']; ?></td>
    <td><?php echo $ObtenerRespuesta[$i]['deptos']; ?></td>
    <td><?php echo $ObtenerRespuesta[$i]['name_docto']; ?></td>
    <td><?php echo $ObtenerRespuesta[$i]['OficioR']; ?></td>
    <td><?php echo $fecha=date("d/m/Y",strtotime($ObtenerRespuesta[$i]['fecha'])); ?></td>                       
            <td><a target="_blank" href="<?php echo $ObtenerRespuesta[$i]['url'] ?>"><img class="app-pdfimg" src="../img/pdf.png"></a></td>
            <!--<td><div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acción <span class="caret"></span>
  </button>
  <ul class="dropdown-menu app-dropdown-menu">
     <li data="<?php echo $ObtenerRespuesta[$i]['id_docto']; ?>"><a href="#" class="edit">Editar</a></li>
    <li role="separator" class="divider"></li>
    <li data="<?php echo $ObtenerRespuesta[$i]['id_docto']; ?>"><a href="#" class="trash">Eliminar</a></li>
  </ul>-->
</div>
</td>
            </tr>
</tbody>
        <?php } ?>
        </table>
        </div>
          
</section>
</div>