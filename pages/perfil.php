<?php 
require_once '../class/conexion.php';
require_once("../class/obj_archivo.php");
session_start();

$id=$_SESSION['id'];
if($_SESSION['user']=="")
{
header("location:../procesos/logout");
} 
$obj_1=new Tarchivos();
$Obtenernoti=$obj_1->getnoti();
$ObtenerRestringir=$obj_1->getrestringir();

$sql="Select*from login where id=$id";
$res=mysql_query($sql,Conectar::con());
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

        <div class="jumbotron">
  <div class="container">

  <?php while($row=mysql_fetch_array($res)) : ?>
<label></label>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="form-group">
<label for="name">Nombre</label>
   <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
</div>
<div class="form-group">
<label for="last_name">Apellido</label>
  <input type="text" class="form-control" id="last_name" value="<?php echo $row['last_name']; ?>">
</div>
<div class="form-group">
  <label for="user">Usuario</label>
  <span name="user" id="user" class="form-control"><?php echo $row['user']; ?></span>
  </div>
<div class="form-group">
<label for="psw">Contraseña</label>
  <input class="form-control" type="password" id="psw" >
</div>
<div class="form-group">
<label for="confpsw">Confirmar Contraseña</label>
  <input type="password" class="form-control" id="confpsw" >
</div>
<input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">

<button class="btn btn-primary" id="mperfiledit" name="mperfiledit">Editar</button>
  <?php endwhile; ?>
  </div>
</div> <!-- /container -->
</div>   
    <div id="modalDialog">
      
    </div>
    <div id="error"></div>
    <?php } ?>
<!--Desarrollado por Jorge Henriquez en colaboracion con el Departamento de Desarrollo de Telemática -->   
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
