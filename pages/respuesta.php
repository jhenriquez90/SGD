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
        <title>Archivero</title>
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
          <form id="respuesta" name="respuesta" method="post" enctype="multipart/form-data">
            <div class="row">
                    
             <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <div class="app-img">
            <img src="#" alt="" id="img_destino2" class="responsive-img" style="height: 145px; width: 145px; margin:auto; padding: 2px;">
            </div>
            <input type="file" style="display:none;" id="mimg2" name="mimg2">
            <input type="button" value="Elegir Archivo PDF" onclick="document.getElementById('mimg2').click();" class="btn btn-primary app-btnfile">
            </div>            
          </div>
                    
             <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <label>Nombre o Asunto del Documento</label>
            <input data-toggle="tooltip" data-placement="right" title="Nombre o Asunto del documento" type="text" id="name_docto" name="name_docto" class="form-control">
            </div>
            </div>

            <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <label>Número de Oficio</label>
            <input data-toggle="tooltip" data-placement="right" title="Ingrese número de oficio letras y números para identificar el documento" type="text" id="oficio" name="oficio" class="form-control">
            </div>
            </div>

            <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <label>Observación</label>
            <textarea data-toggle="tooltip" data-placement="right" title="Puede ingresar un pequeño resumen o estado del documento"  id="obs" name="obs" class="form-control" cols="30" rows="10" ></textarea>
            </div>
            </div>
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
           <div class="col-xs-12 col-md-12 col-sm-8 col-lg-8">   
            <div class="form-group">
            <input type="submit" id="upload" name="upload" value="Subir" class="btn btn-success">
            </div>
            </div>
            </div>
          </form>

    
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
