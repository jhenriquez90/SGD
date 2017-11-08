$(document).ready(function(){

$('.trash2').on('click',function(){
var id=$(this).parent().attr('data');
var dataString='id='+id;
EditArchivo('Eliminar','¿Deseas eliminar este archivo?');
$('#Aceptar').on('click',function(){
$.ajax({
  type:"POST",
  url:"../procesos/delarchivo",
  data: dataString,
  success: function(a){

    if(a==1){
      obtenerDialog('Nota',' El archivo fue eliminado');
      $('#aceptar').on('click',function(){
          location.reload();
        });

    }else{
      obtenerDialog('Error','Archivo no se pudo Eliminar');
    }
  }
});

});
});  
$('.edit2').on('click',function(){
var id=$(this).parent().attr('data');
var dataString='id='+id;
var cargar=$('#modalDialog').html('<div class="app-load"><img src="../img/30.gif" /></div>');
$.ajax({
  type:"POST",
  url:"../class/obj_archivo",
  url:"../procesos/edit",
   data:dataString,
  success:function(a){
    EditArchivo('Editar',a);
    $('#Aceptar').on('click',function(){
      var id=$('#id').val();
      var name_docto=$('#name_docto').val();
      var oficio=$('#oficio').val();
      var num_archive=$('#num_archive').val();
      var num_gabeta=$('#num_gabeta').val();
      var num_fila=$('#num_fila').val();
      var asignado=$('#asignado').val();
      var estado=$('#estado').val();
      var fecha=$('#fecha').val();
      var fechai=$('#fechai').val();
      var obs=$('#obs').val();
      var DataString='id='+id+'&name_docto='+name_docto+'&oficio='+oficio+'&num_archive='+num_archive+'&num_gabeta='+num_gabeta+'&num_fila='+num_fila+'&asignado='+asignado+'&estado='+estado+'&fecha='+fecha+'&fechai='+fechai+'&obs='+obs;
      $.ajax({
      type:"POST",
      url:"../procesos/editarchivo",
      data:DataString,
      success:function(b){
        if(b==1){
           obtenerDialog('Nota',' Archivo, '+oficio+' fue editado');
      $('#aceptar').on('click',function(){
          location.reload();
        });
    }else{
       obtenerDialog('Error','El archivo,'+oficio+' no fue editado'); 
    }

      }/*2do success fin*/

    });/*2do ajax fin*/
    });/*cierre aceptar*/

  }/*1er success  fin*/

});/*1er ajax fin*/
});

$('.ver').on('click',function(){
var id=$(this).parent().attr('data');
var dataString='id='+id;
$.ajax({
  type:"POST",
  url:"../class/obj_archivo",
  url:"../procesos/trespuesta",
  data:dataString,
  success:function(a){
obtenerDialog('Respuestas',a);

  }
 
});
});

$('.detalle').on('click',function(){
  var cargar=$('#modalDialog').html('<div class="app-load"><img src="../img/30.gif" /></div>'); 
var id=$(this).parent().attr('data');
var dataString='id='+id;
$.ajax({
type:"POST",
url:"../class/obj_archivo",
url:"../procesos/detalle",
data:dataString,
success:function(det){
obtenerDialog('Detalles de Vistos',det);

}

});

});

$('.editU').on('click',function(){
   var cargar=$('#modalDialog').html('<div class="app-load"><img src="../img/30.gif" /></div>');   
var id=$(this).parent().attr('data');
var dataString='id='+id;

$.ajax({
  type:"POST",
  url:"../procesos/editu",
  data:dataString,
  success:function(a){
    EditArchivo('Editar',a);
    $('#Aceptar').on('click',function(){
      var id=$('#id').val();
    var name=$('#name').val();
    var last_name=$('#last_name').val();
    var user=$('#user').val();
    var psw=$('#psw').val();
    var confpsw=$('#confpsw').val();
    var unidad=$('#unidades').val();
    var departamento=$('#departamentos').val();
    var cargo=$('#cargo').val();
    var DataString='id='+id+'&name='+name+'&last_name='+last_name+'&user='+user+'&psw='+psw+'&cargo='+cargo+'&unidad='+unidad+'&departamento='+departamento;
     if(psw==confpsw){
      if(psw.length>4 && confpsw.length>4){   

    $('#error').removeClass('alert alert-danger').html('');
    $.ajax({
      type:"POST",
      url:"../procesos/edituser",
      data:DataString,
      success:function(b){
        if(b==1){
           obtenerDialog('Nota',' Usuario fue editado');
      $('#aceptar').on('click',function(){
          location.reload();
        });
    }else{
       obtenerDialog('Error','No se logro editar el Usuario, '+name+' '+last_name); 
    }

      }/*2do success*/

    });/*2do ajax*/
    }else{
            $('#error').addClass('alert alert-danger').html('La contraseña debe ser mayor a 4 caracteres');
          }
          }else{
            $('#error').addClass('alert alert-danger').html('Contraseñas no coinciden');

          }
});
}/*1er success*/
});

});

$('.trashU').on('click',function(){
var id=$(this).parent().attr('data');
var dataString='id='+id;
EditArchivo('Eliminar','¿Deseas eliminar este usuario?');
$('#Aceptar').on('click',function(){
$.ajax({
  type:"POST",
  url:"../procesos/trash.php",
  data: dataString,
  success: function(a){

    if(a==1){
      obtenerDialog('Nota',' Usuario fue eliminado');
      $('#aceptar').on('click',function(){
          location.reload();
        });

    }else{
      obtenerDialog('Nota','Usuario no se pudo Eliminar');
    }
  }
});

});
});
$('.EnviarResp').on('click',function(){
var option1=$('input:radio[name=optionsRadios]:checked').val();
var id=$('#id').val();
var dataString='id='+id+'&option1='+option1;
$.ajax({
type:"POST",
url:"../procesos/mresp",
data:dataString,
success:function(a){
if(a==1){

  obtenerDialog('Nota','Se respondio al Documento Correctamente');
  $('#aceptar').on('click',function(){
          document.location.href = 'archivos'; 
        });
}else{
  obtenerDialog('Error','No se logro responder Este Documento1');
}

}
});

});

/*Desarrollado por Jorge Henriquez en colaboracion con el Departamento de Desarrollo de Telemática */
function obtenerDialog(Nota,Contenido){
  var _html='<div class="modal fade" id="error" tabindex="-1" role="dialog">'+
  '<div class="modal-dialog" role="document">'+
    '<div class="modal-content">'+
      '<div class="modal-header">'+
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
        '<h2 class="modal-title text-danger">'+Nota+'</h2>'+
      '</div>'+
      '<div class="modal-body">'+
      Contenido+  
      '</div>'+
      '<div class="modal-footer">'+
        '<button id="aceptar" type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>'+
       '</div>'+
    '</div>'+
  '</div>'+
'</div>';
   $('#modalDialog').html(_html);
    $('#error').modal('show');  
    }
function ObtenerDialog(Contenido){
  var _html='<div class="alert alert-danger app-alert" role="alert">'+
  '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'+
  '<span class="sr-only">Error:</span>'+
  Contenido+
'</div>';     

   $("#modalDialog").html(_html);
     
    }
    function EditArchivo(Nota,Contenido){
  var _html='<div class="modal fade" id="edituser" tabindex="-1" role="dialog">'+
  '<div class="modal-dialog" role="document">'+
    '<div class="modal-content">'+
      '<div class="modal-header">'+
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
        '<h2 class="modal-title text-danger">'+Nota+'</h2>'+
      '</div>'+
      '<div class="modal-body">'+
      Contenido+  
      '</div>'+
      '<div class="modal-footer">'+
        '<button id="Aceptar" type="button" class="btn btn-success">Aceptar</button>'+
         '<button id="cancelar" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>'+
       '</div>'+
    '</div>'+
  '</div>'+
'</div>';
   $('#modalDialog').html(_html);
    $('#edituser').modal('show'); 
    }

});