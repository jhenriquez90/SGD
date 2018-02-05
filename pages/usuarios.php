<?php 
define("PERPAGE_LIMIT",6);
require_once '../class/conexion.php';
require_once("../class/obj_archivo.php");
session_start();
if($_SESSION['user']=="")
{
header("location:../procesos/logout.php");
} 
$obj_1=new Tarchivos();

$ObtenerRestringir=$obj_1->getrestringir();

function getFAQ() {
$sql = "SELECT a.id,a.name,a.last_name,a.user,d.ncargo as permisos,b.nombre as unidades,c.nombre as departamentos,a.estado,a.fechain,a.fechaout,datediff((NOW()),(fechaout))as DiasUltimaConexion, timediff((NOW()),(fechaout))as TiempoUltimaConexion,datediff((NOW()),(fechain))as DiasdeConexion,timediff((NOW()),(fechain))as TiempodeConexion FROM login as a left join unidades as b on (a.unidad=b.id) left join departamentos as c on (a.departamento=c.id) left join permisos as d on (a.permisos=d.id) order by a.estado desc";


// getting parameters required for pagination
$currentPage = 1;
if(isset($_GET['pageNumber'])){
$currentPage = $_GET['pageNumber'];
}
$startPage = ($currentPage-1)*PERPAGE_LIMIT;
if($startPage < 0) $startPage = 0;
$href = "usuarios?";

//adding limits to select query
$query =  $sql . " limit " . $startPage . "," . PERPAGE_LIMIT; 
$result = mysql_query($query,Conectar::con());

while($row=mysql_fetch_array($result)) {
$questions[] = $row;

}


if(is_array($questions)){
$questions["page_links"] = paginateResults($sql,$href);
return $questions;
}
}

//function creates page links
function pagination($count, $href) {
$output = '';
if(!isset($_REQUEST["pageNumber"])) $_REQUEST["pageNumber"] = 1;
if(PERPAGE_LIMIT != 0)
$pages  = ceil($count/PERPAGE_LIMIT);

//if pages exists after loop's lower limit
if($pages>1) {
if(($_REQUEST["pageNumber"]-3)>0) {
$output = $output . '<li><a href="' . $href . 'pageNumber=1" class="page">1</a></li>';
}
/*if(($_REQUEST["pageNumber"]-3)>1) {
$output = $output . '...';
}*/

//Loop for provides links for 2 pages before and after current page
for($i=($_REQUEST["pageNumber"]-2); $i<=($_REQUEST["pageNumber"]+2); $i++)  {
if($i<1) continue;
if($i>$pages) break;
if($_REQUEST["pageNumber"] == $i)
$output = $output . '<li class="active"><a id='.$i.' class="current">'.$i.'</a></li>';
else        
$output = $output . '<li><a href="' . $href . "pageNumber=".$i . '" class="page">'.$i.'</a></li>';
}

//if pages exists after loop's upper limit
/*if(($pages-($_REQUEST["pageNumber"]+2))>1) {
$output = $output . '...';
}*/
if(($pages-($_REQUEST["pageNumber"]+2))>0) {
if($_REQUEST["pageNumber"] == $pages)
$output = $output . '<li class="active"><a id=' . ($pages) .' class="current">' . ($pages) .'</a></li>';
else        
$output = $output . '<li><a href="' . $href .  "pageNumber=" .($pages) .'" class="page">' . ($pages) .'</a></li>';
}

}
return $output;
}

//function calculate total records count and trigger pagination function  
function paginateResults($sql, $href) {
$result  = mysql_query($sql,Conectar::con());
$count   = mysql_num_rows($result);
$page_links = pagination($count, $href);
return $page_links;
}
?>



<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Gestión y Control de Documentos</title>
        <link rel="shortcut icon" href="../img/logo.png" />
        <link rel="shortcut icon" href="../img/logo.png" type="image/png" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/main.css">

        <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
   <?php  for ($p=0; $p <sizeof($ObtenerRestringir) ; $p++) { ?> 
 <header id="menunav">
 <div id="logo">
         
        </div>
         <nav class="navbar navbar-personalizado">
        <div class="container">
          <div class="navbar-header">
          <button class="navbar-toggle" data-toggle="collapse" data-target="#menu">
            <span class="icon-bar app-bar"></span>
            <span class="icon-bar app-bar"></span>
            <span class="icon-bar app-bar"></span>
          </button>
          <img id="logo" src="" >
          
          </div>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav navbar-right navbar-personalizado">
              
              
              
                 <li class="dropdown"><a id="Qs" class="dropdown-toggle" data-toggle="dropdown" href=""> <span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['nombre']."&nbsp".$_SESSION['apellido']; ?> <span class="caret Qs"></span></a>
              <ul class="dropdown-menu navbar-dropdown">
              <li><a href="perfil">Mi Perfil</a></li>
              <li><a href="archivos">Archivos</a></li>
              <?php if($ObtenerRestringir[$p]['cargos']==1){?>               
              <li><a href="permisos">Cargos</a></li>
               <?php } ?>
              <?php if($ObtenerRestringir[$p]['catalogo']==1){?>
               <li><a href="catalogo">Catalago</a></li> 
               <?php } ?> 
               <?php if($ObtenerRestringir[$p]['estado']==1){?> 
               <li><a href="estado">Estado</a></li>          
               <?php } ?>
              <li role="separator" class="divider"></li>
              <li><a href="../procesos/logout.php">Cerrar Sesion</a></li>
              </ul>
              </li>
            </ul>
            
          </div>

          
          </div>
          
         

      </nav>
     </header>

   <section id="tableuser">  
<div class="container">
<?php if($ObtenerRestringir[$p]['crear']==1){?>
<button type="button" id="Nuser" name="Nuser" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Usuario</button>
<?php } ?>
      <section id="busqueda">
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
         <label>Búsqueda</label>             
             <div class="input-group">
             <input data-toggle="tooltip" data-placement="bottom" title="Búsqueda por Nombre"  class="form-control" type="text" id="search" name="search" placeholder="Búsqueda...">
            <div id="SearchUser" class="btn input-group-addon SearchUser" for="search">Buscar</div>
            </div> 
            </div>
            </div> 
        </section>


 <section id="TSearch">
        <div id="TableSearch">
           
        </div> 
           
          <span id="Cbusqueda" class="btn btn-default">Cerrar</span> 
          
        </section>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<h3>Tabla de Usuarios</h3>
  <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
             <th>Nombre</th>
             <th>Usuario</th>
             <th>Cargo</th>
             <th>Unidad</th>
             <th>Departamento</th>
             <th>Tiempo de Nueva Conexión</th>
             <th>Ultimo Cierre de Sesión</th>  
             <th>Estado</th>  
          </tr>
        </thead>
<?php $questions = getFAQ();
if(is_array($questions)) {
for($i=0;$i<count($questions)-1;$i++) {
           ?>
        <tbody>
        <tr>
        <td><?php echo $i; ?> </td>
         <td><?php echo $questions[$i]["name"]." ". $questions[$i]["last_name"]; ?> </td>
          <td><?php echo $questions[$i]["user"];?> </td>
          <td><?php echo $questions[$i]["permisos"];?> </td>
          <td><?php echo $questions[$i]["unidades"];?> </td>
          <td><?php echo $questions[$i]["departamentos"];?> </td>
          <td><?php  if($questions[$i]["DiasdeConexion"]==""){
                          echo '0 días';}
                          elseif($questions[$i]["TiempodeConexion"]<24){
                            echo $questions[$i]["TiempodeConexion"].' Horas';
                          }
                          elseif($questions[$i]["DiasdeConexion"]==1){
                            echo $questions[$i]["DiasdeConexion"].' '.'día';
                          }
                          elseif($questions[$i]["DiasdeConexion"]>1){
                            echo $questions[$i]["DiasdeConexion"].' '.'días';
                          }
                          ?>
         </td>
          <td><?php  if($questions[$i]["DiasUltimaConexion"]==""){
                          echo '0 días';}
                          elseif($questions[$i]["TiempoUltimaConexion"]<24){
                            echo $questions[$i]["TiempoUltimaConexion"].' Horas';
                          }
                          elseif($questions[$i]["DiasUltimaConexion"]==1){
                            echo $questions[$i]["DiasUltimaConexion"].' '.'día';
                          }
                          elseif($questions[$i]["DiasUltimaConexion"]>1){
                            echo $questions[$i]["DiasUltimaConexion"].' '.'días';
                          }
                          ?>
         </td>
          <td><?php if($questions[$i]["estado"]==1){echo '<div class="online" data-toggle="tooltip" data-placement="top" title="En Linea"></div>';}else{echo '<div class="offline" data-toggle="tooltip" data-placement="top" title="Fuera de Linea"></div>';}?> </td>
          <td><div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acción <span class="caret"></span>
  </button>
  <ul class="dropdown-menu app-dropdown-menu">
  <?php if($ObtenerRestringir[$p]['editar']==1){?>
    <li data="<?php echo $questions[$i]['id']; ?>"><a href="#" class="editU">Editar</a></li>
    <?php } ?>
    <?php if($ObtenerRestringir[$p]['eliminar']==1){?>
    <li data="<?php echo $questions[$i]['id']; ?>"><a href="#" class="trashU">Eliminar</a></li>
    <?php } ?>
    <li role="separator" class="divider"></li>
    <li data="<?php echo $questions[$i]['id']; ?>"><a href="#" class="logoutad">Cerrar Sesión</a></li>
  </ul>
</div></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>


<nav aria-label="Page navigation">
  <ul class="pagination">
        <?php echo $questions["page_links"]; ?>
   
   
  </ul>
</nav>

<?php
}
?>
</div>
</div>
</div>
<div id="modalDialog"></div>
</section>
<?php } ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
