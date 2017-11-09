<?php 
require_once '../class/conexion.php';
session_start();
$id=$_POST['id'];
$sql="select*from permisos where id=$id";
$res=mysql_query($sql,Conectar::con());
while($row=mysql_fetch_array($res)){
	$ncargo=$row['ncargo'];
  $Crear=$row['crear'];
  $Editar=$row['editar'];
  $Eliminar=$row['eliminar'];
  $Usuarios=$row['usuarios'];
  $Cargos=$row['cargos'];
  $Catalogo=$row['catalogo'];
  $Estado=$row['estado'];
  $Respuesta=$row['respuesta'];


if($Crear==1){$texto1='Si'; $optionval1=1;}else{$texto1='No'; $optionval1=0;}
if($Crear==1){$texto2='No'; $optionval2=0;}else{$texto2='Si'; $optionval2=1;}

if($Editar==1){$texto3='Si'; $optionval3=1;}else{$texto3='No'; $optionval3=0;}
if($Editar==1){$texto4='No'; $optionval4=0;}else{$texto4='Si'; $optionval4=1;}

if($Eliminar==1){$texto5='Si'; $optionval5=1;}else{$texto5='No'; $optionval5=0;}
if($Eliminar==1){$texto6='No'; $optionval6=0;}else{$texto6='Si'; $optionval6=1;}

if($Usuarios==1){$texto7='Si'; $optionval7=1;}else{$texto7='No'; $optionval7=0;}
if($Usuarios==1){$texto8='No'; $optionval8=0;}else{$texto8='Si'; $optionval8=1;}

if($Cargos==1){$texto9='Si'; $optionval9=1;}else{$texto9='No'; $optionval9=0;}
if($Cargos==1){$texto10='No'; $optionval10=0;}else{$texto10='Si'; $optionval10=1;}

if($Catalogo==1){$texto11='Si'; $optionval11=1;}else{$texto11='No'; $optionval11=0;}
if($Catalogo==1){$texto12='No'; $optionval12=0;}else{$texto12='Si'; $optionval12=1;}

if($Estado==1){$texto13='Si'; $optionval13=1;}else{$texto13='No'; $optionval13=0;}
if($Estado==1){$texto14='No'; $optionval14=0;}else{$texto14='Si'; $optionval14=1;}

if($Respuesta==1){$texto15='Si'; $optionval15=1;}else{$texto15='No'; $optionval15=0;}
if($Respuesta==1){$texto16='No'; $optionval16=0;}else{$texto16='Si'; $optionval16=1;}

echo '<div class="form-group">
    <label for="iPermiso">Nombre del Cargo</label>
    <input type="text" class="form-control" id="iPermiso" placeholder="" value="'.$ncargo.'">
  </div>
<div class="form-group">
<label for="Crear">Crear</label>
<select class="form-control" name="Crear" id="Crear">
  <option value="'.$optionval1.'">'.$texto1.'</option>
  <option value="'.$optionval2.'">'.$texto2.'</option>
</select>
</div>
<div class="form-group">
<label for="Editar">Editar</label>
<select class="form-control" name="Editar" id="Editar">
  <option value="'.$optionval3.'">'.$texto3.'</option>
  <option value="'.$optionval4.'">'.$texto4.'</option>
</select>
</div>
<div class="form-group">
<label for="Eliminar">Eliminar</label>
<select class="form-control" name="Eliminar" id="Eliminar">
  <option value="'.$optionval5.'">'.$texto5.'</option>
  <option value="'.$optionval6.'">'.$texto6.'</option>
</select>
</div>
<div class="form-group">
<label for="Usuarios">Usuarios</label>
<select class="form-control" name="Usuarios" id="Usuarios">
  <option value="'.$optionval7.'">'.$texto7.'</option>
  <option value="'.$optionval8.'">'.$texto8.'</option>
</select>
</div>
<div class="form-group">
<label for="Cargos">Cargos</label>
<select class="form-control" name="Cargos" id="Cargos">
  <option value="'.$optionval9.'">'.$texto9.'</option>
  <option value="'.$optionval10.'">'.$texto10.'</option>
</select>
</div>
<div class="form-group">
<label for="Catalogo">Catalogo</label>
<select class="form-control" name="Catalogo" id="Catalogo">
  <option value="'.$optionval11.'">'.$texto11.'</option>
  <option value="'.$optionval12.'">'.$texto12.'</option>
</select>
</div>
<div class="form-group">
<label for="Estado">Estado</label>
<select class="form-control" name="Estado" id="Estado">
  <option value="'.$optionval13.'">'.$texto13.'</option>
  <option value="'.$optionval14.'">'.$texto14.'</option>
</select>
</div>
<div class="form-group">
<label for="Respuesta">Respuesta</label>
<select class="form-control" name="Respuesta" id="Respuesta">
  <option value="'.$optionval15.'">'.$texto15.'</option>
  <option value="'.$optionval16.'">'.$texto16.'</option>
</select>
</div>
<input type="hidden" name="id" id="id" value="'.$id.'">';

}
?>