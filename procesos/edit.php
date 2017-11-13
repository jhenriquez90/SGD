<?php
require_once '../class/conexion.php';
require_once "../class/obj_archivo.php";
$obj_1=new Tarchivos();
$ObtenerArchivo=$obj_1->getedit();
 for($i = 0; $i < sizeof($ObtenerArchivo); $i++){ 
 	echo '<div class="row">
      <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <label>Origen del Documento</label>
            <input type="text" id="name_docto" name="name_docto" class="form-control" value="'.$ObtenerArchivo[$i]['name_docto'].'">
            </div>
            </div>

            <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <label>Número de Oficio</label>
            <input type="text" id="oficio" name="oficio" class="form-control" value="'.$ObtenerArchivo[$i]['oficio'].'" >
            </div>
            </div>

            <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <label>Número de archivo</label>
            <input type="text" id="num_archive" name="num_archive" class="form-control" value="'.$ObtenerArchivo[$i]['num_archive'].'">
            </div>
            </div>

            <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <label>Número de gaveta</label>
            <input type="text" id="num_gabeta" name="num_gabeta" class="form-control" value="'.$ObtenerArchivo[$i]['num_gabeta'].'">
            </div>
            </div>

            <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <label>Número de fila</label>
            <input type="text" id="num_fila" name="num_fila" class="form-control" value="'.$ObtenerArchivo[$i]['num_fila'].'">
            </div>
            </div>

            
            <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <label>Fecha que Recibió el documento</label>
            <input type="date" id="fechai" name="fechai" class="form-control" value="'.$ObtenerArchivo[$i]['fecha'].'">
            </div>
            </div>



            <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <label>Observación</label>
            <textarea id="obs" name="obs" class="form-control" cols="30" rows="10">'.$ObtenerArchivo[$i]['obs'].'</textarea>
            </div>
            </div>

          <input type="hidden" name="id" id="id" value="'.$ObtenerArchivo[$i]['id_docto'].'">
          </div>';

 
 	}
?>