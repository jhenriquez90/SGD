<?php 
define("PERPAGE_LIMIT",10);
require_once '../class/conexion.php';
require_once("../class/obj_archivo.php");
session_start();

if($_SESSION['user']=="")
{
header("location:../procesos/logout");
} 
$obj_1=new Tarchivos();

$ObtenerRestringir=$obj_1->getrestringir();


function getFAQ() {
$sql = "SELECT id_docto,name_docto,oficio,num_archive,num_gabeta,num_fila,fecha,asignado,concat(repository,archive) as url,obs FROM archivos where propietario=".$_SESSION['departamento']." and repository=' ' order by fecha desc ";
$ingreso=mysql_query($sql,Conectar::con());
$fila=mysql_num_rows($ingreso);

if($fila==0){

  header('location:archivos');
}

// getting parameters required for pagination
$currentPage = 1;
if(isset($_GET['pageNumber'])){
$currentPage = $_GET['pageNumber'];
}
$startPage = ($currentPage-1)*PERPAGE_LIMIT;
if($startPage < 0) $startPage = 0;
$href = "sinarchivo?";

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
  <?php  for ($p=0; $p <sizeof($ObtenerRestringir) ; $p++) { ?>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
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
           <h1 class="app-h1"><?php echo $_SESSION['nameb']; ?> <br> <?php echo $_SESSION['namec'];?></h1>
          
          </div>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav navbar-right navbar-personalizado">             
                 <?php if($ObtenerRestringir[$p]['crear']==1){?>
                 
                 <?php } ?>  
                 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""> <span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['nombre']."&nbsp".$_SESSION['apellido']; ?> <span class="caret Qs"></span></a>
              <ul class="dropdown-menu navbar-dropdown">
                <li><a href="archivos">Archivos</a></li>
                <li><a href="perfil">Mi Perfil</a></li>
                            <?php if($ObtenerRestringir[$p]['usuarios']==1){?>
               <li><a href="usuarios">Usuarios</a></li>
               <?php } ?>
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
              <li><a href="../procesos/logout">Cerrar Sesion</a></li>
              </ul>
             
              </li>
            </ul>
            
          </div>

          
          </div>
          
         

      </nav>
     </header>
  <div class="container">
    <h3 class="app-head">DOCUMENTOS SIN ARCHIVOS</h3>
<table class="table table-bordered  ">
        <thead>
        <tr>
            <th>Id</th>                     
            <th>Nombre del Documento</th>
            <th>Número de Oficio</th>
            <th>Archivero</th>
            <th>Gaveta</th>
            <th>Número de Fila</th>
            <th>Fecha de Creación</th>
            <th>Usuario de Creación</th>  
            <th>Observación</th>
            <th>Archivo</th>    
            
            </tr>
        </thead>
<?php

$questions = getFAQ();
if(is_array($questions)) {
for($i=0;$i<count($questions)-1;$i++) {
?>
<tbody>

<tr bgcolor="<?php if($questions[$i]['url']==""){ echo '#efe44c';}?>">
    <td><?php echo $i; ?></td>
    <td><?php echo $questions[$i]['name_docto']; ?></td>
     <td><?php echo $questions[$i]['oficio']; ?></td>
     <td><?php echo $questions[$i]['num_archive']; ?></td>
     <td><?php echo $questions[$i]['num_gabeta']; ?></td>
     <td><?php echo $questions[$i]['num_fila']; ?></td>
      <td><?php echo date("d/m/Y",strtotime($questions[$i]['fecha'])); ?></td>
       <td><?php echo $questions[$i]['asignado']; ?></td>              
           <td><?php echo $questions[$i]['obs']; ?></td> 
           <?php if($questions[$i]['url']!=""){?>           
            <td><a target="_blank" href="<?php echo $ObtenerArchivos[$i]['url']?>"><img class="app-pdfimg" src="../img/pdf.png"></a></td>
            <?php }else{ ?>
            <td data="<?php echo $questions[$i]['id_docto']; ?>"><a class="plus" href="#"><img class="app-pdfimg" src="../img/spdf.png"></a></td>
            <?php } ?>
            <td><div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acción <span class="caret"></span>
  </button>
  <ul class="dropdown-menu app-dropdown-menu">
    <?php if($questions[$i]['url']!=""){?>   
  <li ><a href="enviar?id=<?php echo $questions[$i]['id_docto']; ?>" class="">Enviar</a></li>
    <?php }else{ echo '<li><a class="label label-danger">Falta Archivo</a></li>';}?>
  <?php if($ObtenerRestringir[$p]['editar']==1){?>
    <li data="<?php echo $questions[$i]['id_docto']; ?>" ><a href="#" class="edit">Editar</a></li>
    <?php } ?>
    <?php if($ObtenerRestringir[$p]['eliminar']==1){?>
    <li role="separator" class="divider"></li>
    <li data="<?php echo $questions[$i]['id_docto']; ?>" ><a href="#" class="trash">Eliminar</a></li>
    <?php } ?>
  </ul>
</div>
</td>

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
<?php
}
?>
<div id="modalDialog">
      
    </div>
<footer class="app-footer">
   
    <div class="container">
         Desarrollado por Jorge Henriquez en colaboracion con el Departamento de Desarrollo de Telemática 
        <br>Derechos Reservados 2017
    </div>
</footer>
         
        <script src="../js/vendor/jquery-1.11.2.min.js"></script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>
    </body>
      
</html>