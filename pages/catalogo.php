<?php
require_once '../class/conexion.php';
require_once("../class/obj_archivo.php");
session_start();

if($_SESSION['user']=="")
{
header("location:../procesos/logout");
} 
$obj_1=new Tarchivos();
$ObtenerRestringir=$obj_1->getrestringir();
$ObtenerUnidades=$obj_1->getUnidades();
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
           <h1 class="app-h1">Dirección Nacional de Telemática</h1>
          
          </div>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav navbar-right navbar-personalizado">             
              
                 
                 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href=""> <span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['nombre']."&nbsp".$_SESSION['apellido']; ?> <span class="caret Qs"></span></a>
              <ul class="dropdown-menu navbar-dropdown">
                <li><a href="perfil">Mi Perfil</a></li>
              <li><a href="archivos">Archivos</a></li>
              <?php if($ObtenerRestringir[$p]['usuarios']==1){?>
               <li><a href="usuarios">Usuarios</a></li>
               <?php } ?>
               <?php if($ObtenerRestringir[$p]['cargos']==1){?>
               <li><a href="permisos">Cargos</a></li>
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
        <div class="row app-catalogo">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <div class="form-group">
        <label for="unid">Unidades</label>
        <button id="unid" class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear</button>
       </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
       <div class="form-group">
        <label for="dep">Departamentos</label>
        <button id="dep" class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear</button>
       </div>
       </div>

       </div>

      <h3>Documentos por Dirección y Departamentos</h3>
<?php 
$conteo="SELECT MAX(id) as TotalUnidades FROM unidades";
$totalConteo=mysql_query($conteo,Conectar::con());
$count=mysql_fetch_array($totalConteo);
echo '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
for($i=0; $i<=$count['TotalUnidades'];$i++){
$sql1="SELECT b.id,b.nombre FROM departamentos as a inner join unidades as b on (a.idunidades=b.id) where b.id=$i group by b.id order by b.id";
$sql2="SELECT idunidades,nombre FROM departamentos";

$con1=mysql_query($sql1,Conectar::con());
$con2=mysql_query($sql2,Conectar::con());
?>

<?php while($row1=mysql_fetch_array($con1)){ ?>
<div class="panel app-panel">
    <div class="panel-heading" role="tab" id="heading<?php echo $row1['id'];?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row1['id'];?>" aria-expanded="true" aria-controls="<?php echo $row1['id'];?>">
 <?php echo $row1['nombre']; ?>

</a>
      </h4>
    </div>
    <div id="<?php echo $row1['id'];?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $row1['id'];?>">
      <div class="panel-body">
<ul class="list-group">
<?php while($row2=mysql_fetch_array($con2)){ ?>

<?php if($row2['idunidades']==$row1['id']){ ?>

  <li class="list-group-item">   
    <?php echo $row2['nombre']; ?>
  </li>



<?php } /*cierre if donde lista las unidades de cada direccion*/ ?>

<?php }/*cierre del while de listado de las unidades*/ ?>
</ul>
</div>
    </div> </div>

<?php }/*cierre while cabecera de la direccion*/?>

<?php }/*cierre ciclo for para el indice de cabecera de cada seccion*/?>

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
