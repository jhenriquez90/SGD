<?php
require_once '../class/conexion.php';
require_once '../class/obj_archivo.php';

$obj_1=new Tarchivos();
$ObtenerUnidades=$obj_1->getUnidades();
?>

        <div class="form-group">
        <label for="unidades">Unidades</label>
        <select id="unidades" name="unidades" class="form-control">
          <option value="" disabled selected >---</option>
          <?php for($i=0;$i<sizeof($ObtenerUnidades);$i++) {?>
          <option value="<?php echo $ObtenerUnidades[$i]['id'] ?>"><?php echo $ObtenerUnidades[$i]['nombre'] ?></option>


          <?php } ?>
           </select>
<div class="form-group">
<label for="mdepto">Departamentos</label>
  <input type="text" name="mdepto" id="mdepto" class="form-control">
</div>

       
       </div>
   
        
 <script src="../js/main.js"></script>
       