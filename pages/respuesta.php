<?php
require_once '../class/conexion.php';
require_once("../class/obj_archivo.php");
session_start();
if($_SESSION['user']=="")
{
header("location:../procesos/logout.php");
} 
$id=$_GET['id'];
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GCD</title>
        <link rel="shortcut icon" href="../img/logo.png" />
        <link rel="shortcut icon" href="../img/logo.png" type="image/png" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
                <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/main.css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
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
          <h1 class="app-h1">Dirección Nacional de Telemática</h1>
          
          </div>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav navbar-right navbar-personalizado">
              
              
              
                   <li class="dropdown"><a id="Qs" class="app-navbar"  href="archivos">Archivos</a></li>
            </ul>
            
          </div>

          
          </div>
          
         

      </nav>
     </header>
        <div class="container app-container">
        <h3 class="app-head">INGRESO DE RESPUESTA A DOCUMENTO PRINCIPAL</h3>

<section id="rbusqueda">
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
         <label>Búsqueda</label>             
             <div class="input-group">
             <input data-toggle="tooltip" data-placement="bottom" title="Búsqueda Número de Oficio"  class="form-control" type="text" id="search" name="search" placeholder="Búsqueda...">
            <div id="RespSearch" class="btn input-group-addon RespSearch" for="search">Buscar</div>
            </div> 
            </div>
            </div> 
        </section>

         <section id="TSearch2">
        <div id="TableSearch">
           
        </div> 
           

          <span id="Rbusqueda" class="btn btn-default">Cerrar</span> 
          
          
        </section>
<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
         

    
    </div> <!-- /container -->   
    <div id="modalDialog"></div>

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
