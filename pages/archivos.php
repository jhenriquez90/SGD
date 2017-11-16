<?php 
require_once '../class/conexion.php';
require_once("../class/obj_archivo.php");
session_start();

if($_SESSION['user']=="")
{
header("location:../procesos/logout");
} 
$obj_1=new Tarchivos();
$Obtenerenviados=$obj_1->getenviados();
$Obtenernoti=$obj_1->getnoti();
$Obtenerrecibidos=$obj_1->getrecibidos();
$ObtenerArchivos=$obj_1->getArchivos();
$ObtenerRestringir=$obj_1->getrestringir();
$ObtenerSinArchivo=$obj_1->getSinArchivo();
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
                 <li class="dropdown"><a id="IN" class="app-navbar"  href="#">Ingresar Nuevo</a>
                 <?php } ?>  
                 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""> <span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['nombre']."&nbsp".$_SESSION['apellido']; ?> <span class="caret Qs"></span></a>
              <ul class="dropdown-menu navbar-dropdown">
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

        <div class="container" >
        <h3 class="app-head">DOCUMENTOS INGRESADOS AL SISTEMA</h3>
        <section id="notificaciones">
        
   <a class="app-notificaciones" href="">No Leídos <span class="badge"></span></a>
   
</section>
        <section id="busqueda">
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
         <label>Búsqueda</label>             
             <div class="input-group">
             <input data-toggle="tooltip" data-placement="bottom" title="Búsqueda por Nombre del Documento,Número de Oficio, Origen del documento"  class="form-control" type="text" id="search" name="search" placeholder="Búsqueda...">
            <div id="btnsearch" class="btn input-group-addon btnsearch" for="search">Buscar</div>
            </div> 

            <a class="app-opavanzada" data-toggle="collapse" data-target="#opavanzada" aria-expanded="false" aria-controls="opavanzada">
  Opciones Avanzadas
</a>
<div class="collapse" id="opavanzada">
  <div class="well">
    <div class="row">
              <div class="form-inline">
                <div class="form-group">
                <label class="label-control" for="fecha1">Fecha Inicio</label>
            <input type="date" name="fecha1" id="fecha1" class="form-control">
            </div>
            <div class="form-group">
            <label class="label-control" for="fecha2">Fecha Final</label>
            <input type="date" name="fecha2" id="fecha2" class="form-control">
            </div>

              </div>    

            </div>
            
  </div>
</div> 
           
              <div class="app-radios">
              <div class="row">
              <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
            <div class="radio">
             <label>
               <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
               Archivo
             </label>
            </div>
            </div>

             <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
            <div class="radio">
             <label>
               <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
               Enviados
             </label>
            </div>
            </div>

             <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
            <div class="radio">
             <label>
               <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
               Recibidos
             </label>
            </div>
            </div> 
            </div>
            </div>

            </div>
         


            </div> 
        </section>

        

        <section id="TSearch">
        <div id="TableSearch">
           
        </div> 
           
          <span id="Cbusqueda" class="btn btn-default">Cerrar</span> 
          
        </section>

<?php for($a=0; $a<sizeof($ObtenerSinArchivo); $a++){ ?>
    <div class="app-count label label-default">
       <h5> Registros Sin Archivos <a class="app-a" href="sinarchivo"><?php echo $ObtenerSinArchivo[$a]['Conteo']; ?></a> de  <?php echo $ObtenerSinArchivo[$a]['Total']; ?> </h5>    
    </div>
    <?php } ?>
<section id="navegacion">
<ul id="navega" class="nav nav-tabs">
<li role="presentation" class="active"><a href="#MisArchivos" aria-controls="MisArchivos" role="tab" data-toggle="tab">Archivos</a></li>
 <li role="presentation"><a href="#tableArchivo" aria-controls="tableArchivo" role="tab" data-toggle="tab">Enviados</a></li>
    <li role="presentation"><a href="#recibidos" aria-controls="recibidos" role="tab" data-toggle="tab">Recibidos</a></li>
 
</ul>
   
</section>



  <div class="tab-content">

<section id="MisArchivos" class="tab-pane fade in active" role="tabpanel">
  <div class="row">
   
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-table ">
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
        
        <?php for($i = 0; $i < sizeof($ObtenerArchivos); $i++){  ?>

<tbody>

<tr bgcolor="<?php if($ObtenerArchivos[$i]['url']==""){ echo '#efe44c';}?>">
    <td><?php echo $i; ?></td>
    <td><?php echo $ObtenerArchivos[$i]['name_docto']; ?></td>
     <td><?php echo $ObtenerArchivos[$i]['oficio']; ?></td>
     <td><?php echo $ObtenerArchivos[$i]['num_archive']; ?></td>
     <td><?php echo $ObtenerArchivos[$i]['num_gabeta']; ?></td>
     <td><?php echo $ObtenerArchivos[$i]['num_fila']; ?></td>
      <td><?php echo date("d/m/Y",strtotime($ObtenerArchivos[$i]['fecha'])); ?></td>
       <td><?php echo $ObtenerArchivos[$i]['asignado']; ?></td>              
           <td><?php echo $ObtenerArchivos[$i]['obs']; ?></td> 
           <?php if($ObtenerArchivos[$i]['url']!=""){?>           
            <td><a target="_blank" href="<?php echo $ObtenerArchivos[$i]['url']?>"><img class="app-pdfimg" src="../img/pdf.png"></a></td>
            <?php }else{ ?>
            <td data="<?php echo $ObtenerArchivos[$i]['id_docto']; ?>"><a class="plus" href="#"><img class="app-pdfimg" src="../img/spdf.png"></a></td>
            <?php } ?>
            <td><div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acción <span class="caret"></span>
  </button>
  <ul class="dropdown-menu app-dropdown-menu">
    <?php if($ObtenerArchivos[$i]['url']!=""){?>   
  <li ><a href="enviar?id=<?php echo $ObtenerArchivos[$i]['id_docto']; ?>" class="">Enviar</a></li>
    <?php }else{ echo '<li><a class="label label-danger">Falta Archivo</a></li>';}?>
  <?php if($ObtenerRestringir[$p]['editar']==1){?>
    <li data="<?php echo $ObtenerArchivos[$i]['id_docto']; ?>" ><a href="#" class="edit">Editar</a></li>
    <?php } ?>
    <?php if($ObtenerRestringir[$p]['eliminar']==1){?>
    <li role="separator" class="divider"></li>
    <li data="<?php echo $ObtenerArchivos[$i]['id_docto']; ?>" ><a href="#" class="trash">Eliminar</a></li>
    <?php } ?>
  </ul>
</div>
</td>

            </tr>
          
</tbody>

        <?php } ?>
        
        </table>
        </div>
        </div>
       
</section>



        <section id="tableArchivo" class="tab-pane fade" role="tabpanel">
         <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-table ">
        <table class="table table-bordered  ">
        <thead>
        <tr>
            <th>Id</th>
            <th>Origen del Documento</th>
            <th>Destinatario del Documento</th>
            <th>Nombre del Documento</th>
            <th>Número de Oficio</th>
            <th>Receptor</th>
            <th>Estado</th>
            <th>Observación</th>
            <th>Fecha que se Envió el documento</th>
            <th>Fecha que Recibió el documento</th>
            <th>Respuestas</th>
            <th>Archivo</th>
            </tr>
        </thead>
        
        <?php for($i = 0; $i < sizeof($Obtenerenviados); $i++){  ?>

<tbody>

<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $Obtenerenviados[$i]['origen']; ?></td>
    <td><?php echo $Obtenerenviados[$i]['destino']; ?></td>
    <td><?php echo $Obtenerenviados[$i]['name_docto']; ?></td>
     <td><?php echo $Obtenerenviados[$i]['oficio']; ?></td>
          <td><?php echo $Obtenerenviados[$i]['usuario']; ?></td>
          <td><?php echo $Obtenerenviados[$i]['estado']; ?></td>
           <td><?php echo $Obtenerenviados[$i]['obs']; ?></td>
            <td><?php echo $fecha=date("d/m/Y h:i:s",strtotime($Obtenerenviados[$i]['henviado']));  ?></td>
            <td><?php echo $fecha=date("d/m/Y h:i:s",strtotime($Obtenerenviados[$i]['hleido']));  ?></td>
            <td data="<?php echo $Obtenerenviados[$i]['id_docto']; ?>"><span class="ver glyphicon glyphicon-eye-open"></span></td>
            <td><a target="_blank" href="<?php echo $Obtenerenviados[$i]['url']?>"><img class="app-pdfimg" src="../img/pdf.png"></a></td>
            <td><div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acción <span class="caret"></span>
  </button>
  <ul class="dropdown-menu app-dropdown-menu">
     <li><a href="respuesta?id=<?php echo $Obtenerenviados[$i]['id_docto']; ?>" class="fin">Respuesta</a></li>
    <?php if($ObtenerRestringir[$p]['editar']==1){?>
    <li data="<?php echo $Obtenerenviados[$i]['id_docto']; ?>"><a href="#" class="edit">Editar</a></li>
    <?php } ?>
    <li data="<?php echo $Obtenerenviados[$i]['id_docto']; ?>"><a href="#" class="detalle">Detalle</a></li>
    <?php if($ObtenerRestringir[$p]['eliminar']==1){?>
    <li role="separator" class="divider"></li>
    <li data="<?php echo $Obtenerenviados[$i]['id_mov']; ?>"><a href="#" class="trashE">Eliminar</a></li>
    <?php } ?>
  </ul>
</div>
</td>

            </tr>
          
</tbody>

        <?php } ?>
        
        </table>
        </div>
        </div>
       
          
</section>
    <section id="recibidos" class="tab-pane fade" role="tabpanel">
   <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-table ">
        <table class="table table-bordered  ">
        <thead>
        <tr>
            <th>Id</th>
            <th>Origen del Documento</th>
            <th>Destinatario del Documento</th>
            <th>Nombre del Documento</th>
            <th>Número de Oficio</th>
            <th>Observación</th>
            <th>Fecha que Recibió el documento </th>
            <th>Respuestas</th>
            <th>Archivo</th>
            </tr>
        </thead>
        
        <?php for($i = 0; $i < sizeof($Obtenerrecibidos); $i++){  ?>
        <?php $colores=$Obtenerrecibidos[$i]['id_estado']; ?>
<tbody>

<tr bgcolor="<?php if($colores==1) {echo '';}elseif($colores==2){ echo '#991a1a';}else{ echo '#166fa3';} ?>">
    <td><?php echo $i; ?></td>
    <td><?php echo $Obtenerrecibidos[$i]['origen']; ?></td>
    <td><?php echo $Obtenerrecibidos[$i]['destino']; ?></td>
    <td><?php echo $Obtenerrecibidos[$i]['name_docto']; ?></td>
     <td><?php echo $Obtenerrecibidos[$i]['oficio']; ?></td>
            <td><?php echo $Obtenerrecibidos[$i]['obs']; ?></td>
            <td><?php echo $fecha=date("d/m/Y h:i:s",strtotime($Obtenerrecibidos[$i]['henviado']));  ?></td>            
            <td data="<?php echo $Obtenerrecibidos[$i]['id_docto']; ?>"><span class="ver glyphicon glyphicon-eye-open"></span></td>
            <td data="<?php echo $Obtenerrecibidos[$i]['id_mov']; ?>"><a class="visto" target="_blank" href="<?php echo $Obtenerrecibidos[$i]['url']?>"><img class="app-pdfimg" src="../img/pdf.png"></a></td>
            <td><div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Acción <span class="caret"></span>
  </button>
  <ul class="dropdown-menu app-dropdown-menu">
    <li><a href="respuesta?id=<?php echo $Obtenerrecibidos[$i]['id_docto']; ?>" class="fin">Respuesta</a></li>
    
</div>
</td>

            </tr>
          
</tbody>

        <?php } ?>
        
        </table>
        </div>
        </div>
    </section>
    </div>
     </div>
    </div> <!-- /container -->   
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
