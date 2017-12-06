<?php session_start();
require_once '../class/conexion.php';
require_once("../class/obj_archivo.php");
$obj_1=new Tarchivos();
$ObtenerRestringir=$obj_1->getrestringir();
$CriterioBusqueda=$_POST['CriterioBusqueda'];

if($CriterioBusqueda!=""){
$sql="SELECT a.id,a.name,a.last_name,a.user,d.ncargo as permisos,b.nombre as unidades,c.nombre as departamentos,a.estado FROM login as a left join unidades as b on (a.unidad=b.id) left join departamentos as c on (a.departamento=c.id) left join permisos as d on (a.permisos=d.id) where name LIKE '%".$CriterioBusqueda."%'";
$res=mysql_query($sql,Conectar::con());
$count=mysql_num_rows($res);
if($count>=1){
echo ' <table class="table table-bordered">
        <thead>
          <tr>
             <th>Nombre</th>
             <th>Usuario</th>
             <th>Cargo</th>
             <th>Unidad</th>
             <th>Departamento</th> 
             <th>Estado</th> 
          </tr>
        </thead>';
for ($p=0; $p <sizeof($ObtenerRestringir) ; $p++) { 
  while($row=mysql_fetch_array($res)){
echo '<tbody>
        <tr>
         <td>'.$row["name"]." ". $row["last_name"].'</td>
          <td>'.$row["user"].'</td>
          <td>'.$row["permisos"].'</td>
          <td>'.$row["unidades"].'</td>
          <td>'.$row["departamentos"].'</td>
          <td>';if($row["estado"]==1){echo '<div class="online" data-toggle="tooltip" data-placement="top" title="En Linea"></div>';}else{ echo '<div class="offline" data-toggle="tooltip" data-placement="top" title="Fuera de Linea"></div>';}echo'</td>
          <td><div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acción <span class="caret"></span>
  </button>
  <ul class="dropdown-menu app-dropdown-menu">';
  if($ObtenerRestringir[$p]['editar']==1){
    echo '<li data="'.$row['id'].'"><a href="#" class="editU">Editar</a></li>';
     }
    if($ObtenerRestringir[$p]['eliminar']==1){
    echo '<li data="'.$row['id'].'"><a href="#" class="trashU">Eliminar</a></li>';
     } 
 echo '</ul>
</div></td>
          </tr>
        </tbody>';

}


  }
echo '</table></div><script src="../js/main2.js"></script>';


}elseif($count==""){
	echo 'No se encontraron resultados en la búsqueda...';
}

}else{
	echo 'Ingrese Información para realizar la búsqueda...';
}
?>