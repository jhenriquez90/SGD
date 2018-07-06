<?php session_start();
 require_once '../class/conexion.php';
require_once '../class/obj_archivo.php';

$obj_1=new Tarchivos();
$ObtenerUnidades=$obj_1->getUnidades();
$ObtenerRestringir=$obj_1->getrestringir();


if($_SESSION['user']=="")
{
header("location:../procesos/logout");
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
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
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
             <h1 class="app-h1"><?php echo $_SESSION['nameb']; ?> <br> <?php echo $_SESSION['namec'];?></h1>
          
          </div>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav navbar-right navbar-personalizado">             
              
                 <li class="dropdown"><a id="Qs" class="app-navbar"  href="archivos">Archivos</a></li>
                 <li class="dropdown"><a id="Qs" class="dropdown-toggle" data-toggle="dropdown" href=""> <span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['nombre']."&nbsp".$_SESSION['apellido']; ?> <span class="caret Qs"></span></a>
              <ul class="dropdown-menu navbar-dropdown">
                <li><a href="perfil">Mi Perfil</a></li>
              <li><a href="archivos">Archivos</a></li>
              <?php if($ObtenerRestringir[$p]['usuarios']==1){?>
               <li><a href="usuarios">usuarios</a></li>
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
     <div class="container app-container">
     <h3 class="app-head">ENVIO DE DOCUMENTOS A LOS DEPARTAMENTOS</h3>
     <div class="app-enviar">
     <div class="form-group">
<label for="unidadese">Unidades</label>
      <select id="unidadese" name="unidadese" class="form-control">
     	<option value="" disabled selected>---</option>
     <?php for ($i=0;$i<sizeof($ObtenerUnidades);$i++){ ?>
    	<option value="<?php echo $ObtenerUnidades[$i]['id'];?>"><?php echo $ObtenerUnidades[$i]['nombre'];?></option>
     <?php } ?>	
         </select>
         </div>
         <div id="deptos" class="form-group">
<label for="departamentos">Departamentos</label>
  
</div>
<input type="hidden" name="ids" id="ids" value="<?php echo $id=$_GET['id'];?>">
<button id="send" name="send" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Enviar</button>
     </div> <!-- /container --> 
     </div>  
    <div id="modalDialog">
      
    </div>

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