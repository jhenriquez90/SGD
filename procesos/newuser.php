<?php 
require_once '../class/conexion.php';

session_start();

$permisos="select id,ncargo from permisos";
$cpermisos=mysql_query($permisos,Conectar::con());
$unidades="select id,nombre from unidades order by nombre";
$cunidades=mysql_query($unidades,Conectar::con());


echo '<div class="container">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="form-group">
<label for="name">Nombre</label>
   <input type="text" class="form-control" id="name">
</div>
<div class="form-group">
<label for="last_name">Apellido</label>
  <input type="text" class="form-control" id="last_name">

</div>
<div class="form-group">
<label for="user">Usuario</label>
  <input type="text" class="form-control" id="user">
</div>
<div class="form-group">
<label for="psw">Contraseña</label>
  <input class="form-control" type="password" id="psw">
</div>
<div class="form-group">
<label for="confpsw">Confirmar Contraseña</label>
  <input type="password" class="form-control" id="confpsw">
</div>

<div class="form-group">
<label for="unidades">Unidades</label>
  <select name="unidades" id="unidades" class="form-control">
  <option value="" disabled selected>---</option>';
while ($runidades=mysql_fetch_array($cunidades)){
echo '<option value="'.$runidades['id'].'">'.$runidades['nombre'].'</option>';
 
}

echo'</select>
</div>

<div id="deptos" class="form-group">
<label for="departamentos">Departamentos</label>
  
</div>

<div class="form-group">
<label for="cargo">Cargo</label>
  <select name="cargo" id="cargo" class="form-control">
  <option value="" disabled selected>---</option>';
while ($row=mysql_fetch_array($cpermisos)){
echo '<option value="'.$row['id'].'">'.$row['ncargo'].'</option>';

}

echo'</select>
</div>
</div>
</div>
<div id="error"></div><script src="../js/main.js"></script>';

?>