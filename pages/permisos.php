<?php session_start();
date_default_timezone_set('America/Tegucigalpa');
if($_SESSION['user']=="")
{
header("location:../procesos/logout.php");
} 
$nombre=$_SESSION['nombre'].' '.$_SESSION['apellido'];
require_once("../class/obj_archivo.php");
$obj_1=new Tarchivos();
$ObtenerPermisos=$obj_1->getPermisos();
$ObtenerRestringir=$obj_1->getrestringir();
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
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
              
              <li><a href="archivos">Archivos</a></li>              
               <?php if($ObtenerRestringir[$p]['usuarios']==1){?>
               <li><a href="usuarios">Usuarios</a></li>
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
  <section id="tableuser">  
<div class="container">
<?php if($ObtenerRestringir[$p]['crear']==1){?>
<button type="button" id="Npermiso" name="Npermiso" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Permiso</button>
 <?php } ?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

<h3>Tabla de Permisos</h3>
  <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
             <th>Nombre</th>
             <th>Crear</th>
             <th>Editar</th>
             <th>Eliminar</th>
             <th>Usuarios</th>
             <th>Cargos</th>
             <th>Catalago</th>
             <th>Estado</th> 
             <th>Respuesta</th>  
          </tr>
        </thead>
<?php
          for($i = 0; $i < sizeof($ObtenerPermisos); $i++){
            ?>
        <tbody>
        <tr>
        <td><?php echo $i;?> </td>          
          <td><?php echo $ObtenerPermisos[$i]["ncargo"];?> </td>
           <td><span class="glyphicon <?php if($ObtenerPermisos[$i]["crear"]==1){echo 'glyphicon-ok-circle';}else{echo 'glyphicon-ban-circle';}?> "></span></td>
            <td><span class="glyphicon <?php if($ObtenerPermisos[$i]["editar"]==1){echo 'glyphicon-ok-circle';}else{echo 'glyphicon-ban-circle';}?> "></span></td>
             <td><span class="glyphicon <?php if($ObtenerPermisos[$i]["eliminar"]==1){echo 'glyphicon-ok-circle';}else{echo 'glyphicon-ban-circle';}?> "></span></td>
             <td><span class="glyphicon <?php if($ObtenerPermisos[$i]["usuarios"]==1){echo 'glyphicon-ok-circle';}else{echo 'glyphicon-ban-circle';}?> "></span></td>
             <td><span class="glyphicon <?php if($ObtenerPermisos[$i]["cargos"]==1){echo 'glyphicon-ok-circle';}else{echo 'glyphicon-ban-circle';}?> "></span></td>
             <td><span class="glyphicon <?php if($ObtenerPermisos[$i]["catalogo"]==1){echo 'glyphicon-ok-circle';}else{echo 'glyphicon-ban-circle';}?> "></span></td>
              <td><span class="glyphicon <?php if($ObtenerPermisos[$i]["estado"]==1){echo 'glyphicon-ok-circle';}else{echo 'glyphicon-ban-circle';}?> "></span></td>
               <td><span class="glyphicon <?php if($ObtenerPermisos[$i]["respuesta"]==1){echo 'glyphicon-ok-circle';}else{echo 'glyphicon-ban-circle';}?> "></span></td>
          <td><div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acción <span class="caret"></span>
  </button>
  <ul class="dropdown-menu app-dropdown-menu">
  <?php if($ObtenerRestringir[$p]['editar']==1){?>
    <li data="<?php echo $ObtenerPermisos[$i]['id']; ?>"><a href="#" class="pedit">Editar</a></li>
    <?php } ?>
    <?php if($ObtenerRestringir[$p]['eliminar']==1){?>
    <li data="<?php echo $ObtenerPermisos[$i]['id']; ?>"><a href="#" class="ptrash">Eliminar</a></li>
    <?php } ?>
  </ul>
</div></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
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
