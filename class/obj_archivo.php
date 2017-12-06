<?php
require_once ('conexion.php');

class Tarchivos{
private $verenviados;
private $verrecibidos;
private $editar;
private $respuesta;
private $user;
private $noti;
private $verPermisos;
private $restringir;
private $archivos;
private $unidades;
private $detalle;
private $SinArchivo;




public function __construct(){
	$this->verenviados=array();
	$this->verrecibidos=array();
	$this->editar=array();
	$this->user=array();
	$this->noti=array();
	$this->verPermisos=array();
	$this->archivos=array();		
	$this->unidades=array();
	$this->restringir=array();
	$this->detalle=array();
	$this->respuesta=array();
	$this->SinArchivo=array();
	
}


public function getDetalle(){
	$id=$_POST['id'];
$sql="SELECT b.nombre as origen,c.nombre as destino,d.estado,a.usuario,a.henviado,a.hleido FROM movimientos as a left join departamentos as b on (a.origen=b.id) left join departamentos as c on (a.destino=c.id) left join estados as d on (a.estado=d.id_estado) where id_docto= ".$id."";
$res=mysql_query($sql,Conectar::con());
while($reg=mysql_fetch_assoc($res)){
	$this->detalle[]=$reg;
}
return $this->detalle;
}

public function getArchivos(){
$sql="SELECT id_docto,name_docto,oficio,num_archive,num_gabeta,num_fila,fecha,asignado,concat(repository,archive) as url,obs FROM archivos where propietario=".$_SESSION['departamento']." order by fecha desc limit 0,10";
$res=mysql_query($sql,Conectar::con());
while($reg = mysql_fetch_assoc($res)){
				$this->archivos[] = $reg;
			}
			return $this->archivos;

}
public function getenviados(){
		$sql="SELECT b.id_mov,a.id_docto,c.nombre as origen,d.nombre as destino,a.name_docto,a.oficio,concat(a.repository,a.archive) as url,b.henviado,b.hleido,b.usuario,a.asignado,e.estado,a.obs FROM archivos as a inner join movimientos as b on (a.id_docto=b.id_docto) left join departamentos as c on(b.origen=c.id) inner join departamentos as d on (b.destino=d.id) inner join estados as e on (e.id_estado=b.estado) where origen=".$_SESSION['departamento']." group by id_docto desc order by henviado desc  limit 0,10";
$res=mysql_query($sql,Conectar::con());
while($reg = mysql_fetch_assoc($res)){
				$this->verenviados[] = $reg;
			}
			return $this->verenviados;
		
}
public function getrecibidos(){
$sql="SELECT b.id_mov,a.id_docto,c.nombre as destino,d.nombre as origen,a.name_docto,a.oficio,a.num_archive,a.num_gabeta,a.num_fila,concat(a.repository,a.archive) as url,b.henviado,b.hleido,a.asignado,a.obs,e.id_estado FROM archivos as a inner join movimientos as b on (a.id_docto=b.id_docto) left join departamentos as c on(b.destino=c.id) inner join departamentos as d on (b.origen=d.id) inner join estados as e on (e.id_estado=b.estado) where destino=".$_SESSION['departamento']." order by id_estado desc limit 0,10";
$res=mysql_query($sql,Conectar::con());
while($reg = mysql_fetch_assoc($res)){
				$this->verrecibidos[] = $reg;
			}
			return $this->verrecibidos;

}
public function getnoti(){
		$sql="SELECT count(estado) as estado FROM movimientos where estado=2 and destino=".$_SESSION['departamento']." ";
$res=mysql_query($sql,Conectar::con());
while($reg = mysql_fetch_assoc($res)){
				$this->noti[] = $reg;
			}
			return $this->noti;
		
}

public function getSinArchivo(){
		$sql="SELECT count(repository) as Total, (Select count(repository) from archivos where propietario=".$_SESSION['departamento']." and repository='' ) as Conteo  FROM archivos where propietario=".$_SESSION['departamento']." ";
$res=mysql_query($sql,Conectar::con());
while($reg = mysql_fetch_array($res)){
				$this->SinArchivo[] = $reg;
			}
			return $this->SinArchivo;
		
}
public function getedit(){
	$id=$_POST['id'];
	$sql="select*from archivos where id_docto=$id";
$res=mysql_query($sql,Conectar::con());
while($reg = mysql_fetch_assoc($res)){
				$this->editar[] = $reg;
			}
			return $this->editar;
}

public function getrespuesta(){
	$id=$_POST['id'];
	
	$sql="SELECT a.id_resp,a.id_docto,b.oficio as OficioO,e.nombre as unidades,d.nombre as deptos,a.fecha,b.name_docto,c.oficio as OficioR,concat(c.repository,c.archive)as url FROM respuesta as a right join archivos as b on (a.id_docto=b.id_docto) right join archivos as c on (a.id_resp=c.id_docto) right join departamentos as d on (c.propietario=d.id)right join unidades as e on (d.idunidades=e.id) where a.id_docto= $id";
$res=mysql_query($sql,Conectar::con());
while($reg = mysql_fetch_assoc($res)){
				$this->respuesta[] = $reg;
			}
			return $this->respuesta;
		
}

public function getuser(){
		
	$sql="SELECT a.id,a.name,a.last_name,a.user,d.ncargo as permisos,b.nombre as unidades,c.nombre as departamentos,a.estado FROM login as a left join unidades as b on (a.unidad=b.id) left join departamentos as c on (a.departamento=c.id) left join permisos as d on (a.permisos=d.id)";
$res=mysql_query($sql,Conectar::con());
while($reg = mysql_fetch_assoc($res)){
				$this->user[] = $reg;
			}
			return $this->user;
		
}

public function getPermisos(){
	$sql="SELECT*FROM permisos";
$res=mysql_query($sql,Conectar::con());
while($reg = mysql_fetch_assoc($res)){
				$this->verPermisos[] = $reg;
			}
			return $this->verPermisos;
}
public function getRestringir(){
	$sql="SELECT*FROM permisos where id=".$_SESSION['cargo']."";
$res=mysql_query($sql,Conectar::con());
while($reg = mysql_fetch_assoc($res)){
				$this->restringir[] = $reg;
			}
			return $this->restringir;
}

public function getUnidades(){

$sql="SELECT*FROM unidades order by nombre asc";
$res=mysql_query($sql,Conectar::con());
while($reg=mysql_fetch_assoc($res)){
	$this->unidades[]=$reg;
}
return $this->unidades;
}


}




?>