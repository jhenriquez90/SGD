<?php
require_once '../class/conexion.php';
require_once '../class/obj_archivo.php';

$obj_1=new Tarchivos();
$ObtenerDetalle=$obj_1->getDetalle();

?>
<div class="table-responsive">
  <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-table ">
        <table class="table table-bordered  ">
        <thead>
        <tr>
            <th>Id</th>
            <th>Origen</th>
            <th>Destino</th>                     
            <th>Usuario</th>
            <th>Estado</th>
            <th>Fecha de Enviado</th>
            <th>Fecha de Recibido</th>  
               
            
            </tr>
        </thead>
        
        <?php for($i = 0; $i < sizeof($ObtenerDetalle); $i++){  ?>

<tbody>

<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $ObtenerDetalle[$i]['origen']; ?></td>
     <td><?php echo $ObtenerDetalle[$i]['destino']; ?></td>
    <td><?php echo $ObtenerDetalle[$i]['usuario']; ?></td>
       <td><?php echo $ObtenerDetalle[$i]['estado']; ?></td>              
           <td><?php echo date("d/m/Y h:i:s",strtotime($ObtenerDetalle[$i]['henviado'])); ?></td> 
            <td><?php echo date("d/m/Y h:i:s",strtotime($ObtenerDetalle[$i]['hleido'])); ?></td> 
            
            

            </tr>
          
</tbody>

        <?php } ?>
        
        </table>
        </div>
        </div>
        </div>