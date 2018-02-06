<?php
require_once '../class/conexion.php';
$id=$_POST['unidadese'];
session_start();

$sql="SELECT a.id as iddepto, a.nombre, a.idunidades, b.id
FROM departamentos AS a
INNER JOIN unidades AS b ON ( a.idunidades = b.id ) 
WHERE a.idunidades =$id order by a.nombre";
$res=mysql_query($sql,Conectar::con());
$conteo=mysql_num_rows($res);


?>
<?php if($conteo>0){ ?>
<div class="form-group">
<label for="departamentos">Departamentos</label>
<select name="departamentos[]" id="departamentos" class="form-control" multiple="multiple" size="<?php echo $conteo; ?>">
<?php while($reg= mysql_fetch_array($res)){ ?>
<option value="<?php echo $reg['iddepto']; ?>"><?php echo $reg['nombre']; ?></option>
<?php } ?>
</select>
<?php } ?>
