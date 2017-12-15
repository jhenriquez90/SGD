$(document).ready(function(){

    

  $('#img_destino').attr('src','../img/upload.png').show();
 
   $('#mimg').change(function(){
   	$('#img_destino').attr('src','../img/pdf.png').show();
   });
  
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
 $("#navega a").click(function(e){
      e.preventDefault();
      $(this).tab('show');
    });

 $(function(){
        $("#archivos").on("submit", function(e){
            e.preventDefault();
            var cargar=$('#modalDialog').html('<div class="app-load"><img src="../img/30.gif" /></div>');
            var formData = new FormData(document.getElementById("archivos"));
            var img=$('#mimg').val();
            var archivo = $("#mimg").val();
var extensiones = archivo.substring(archivo.lastIndexOf("."));
          if(img!='' && extensiones == ".pdf" ){
            $('#mimg').removeClass('app-error_foto');
  

$.ajax({
                url: "mupload",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
       processData: false
            })
               .done(function(res){
                   var imp=res;
                   $('#modalDialog').html(res);


             if(imp==1){
         $('#archivos').trigger("reset"); 
         
          obtenerDialog('Nota','Su información fue recibida satisfactoriamente');
          $('#mimg').removeClass('app-error_foto');
          $("#img_destino").attr("src", "../img/upload.png ").show();
          $('#aceptar').on('click',function(){
           document.location.href = '../pages/archivos';
        });
          }else{
            obtenerDialog('Nota','Su información no fue recibida ya que hay Campos Vacíos en el Formulario'); 
                      
           

          }   
                  
                });
             }else{
              obtenerDialog('Error','Elige un Archivo PDF para crear la documentación');
              
              $('#img_destino').addClass('app-error_foto');
             

             }

});

    });


 $('#img_destino2').attr('src','../img/upload.png').show(); 
 
   $('#mimg2').change(function(){
    $('#img_destino2').attr('src','../img/pdf.png').show();
   });

$(function(){
        $("#respuesta").on("submit", function(e){
            e.preventDefault();
            var cargar=$('#modalDialog').html('<div class="app-load"><img src="../img/30.gif" /></div>');
            var formData = new FormData(document.getElementById("respuesta"));
            var img=$('#mimg2').val();
            var archivo2=$('#mimg2').val();
            var extensiones = archivo2.substring(archivo2.lastIndexOf("."));
          if(img!='' && extensiones == ".pdf"){
            $('#mimg').removeClass('app-error_foto');

$.ajax({
                url: "../procesos/mresp",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
       processData: false
            })
               .done(function(res){
                   var imp=res;
                  $('#modalDialog').html(res); 


             if(imp==1){
         $('#respuesta').trigger("reset"); 
         obtenerDialog('Nota',' Su información fue recibida satisfactoriamente');
      $('#aceptar').on('click',function(){
           document.location.href = '../pages/archivos.php';
        });
          
          }else{
            obtenerDialog('Nota','Su información no fue recibida ya que hay Campos Vacíos en el Formulario'); 
                      
           

          }  
                  
                });
             }else{
              obtenerDialog('Error','Elige un Archivo PDF para crear la documentación');
              
              $('#img_destino2').addClass('app-error_foto');
             

             }

});

    });

$('#num_oficio').on('change',function(e){
e.preventDefault();
var num_oficio=$('#num_oficio').val();
var dataString='num_oficio='+num_oficio;
$.ajax({
type:"GET",
url:"../procesos/compoficio",
data:dataString,
success:function(ofi){

  if(ofi==1){
    $('#compoficio').removeClass('alert alert-success').addClass('alert alert-warning').html('Número de Oficio Existente');
    $('#Aceptar').hide();
  }else{
    $('#compoficio').removeClass('alert alert-warning').addClass('alert alert-success').html('Número de Oficio libre');
    $('#Aceptar').show();
  }
}
});
});

$('#IN').on('click',function(e){
e.preventDefault();
var cargar=$('#modalDialog').html('<div class="app-load"><img src="../img/30.gif" /></div>');
$.ajax({
      type: "POST",
      url: "../procesos/form",
    
      success: function(form) {
     EditArchivo('Subir Información',form);
     $('#name_docto').focus();
     $('#Aceptar').on('click',function(){
      var docto=$('#name_docto').val();
      var oficio=$('#num_oficio').val()
      var num_archive=$('#num_archive').val();
      var num_gaveta=$('#num_gaveta').val();
      var num_fila=$('#num_fila').val();
      var obs=$('#obs').val();
      var DataString='docto='+docto+'&oficio='+oficio+'&num_archive='+num_archive+'&num_gaveta='+num_gaveta+'&num_fila='+num_fila+'&obs='+obs;
       $.ajax({
      type:"POST",
      url:"../procesos/subform",
      data:DataString,
      success:function(b){
        if(b==1){
           obtenerDialog('Nota',' Archivo, '+oficio+' fue creado');
      $('#aceptar').on('click',function(){
          location.reload();
        });
    }else{
       obtenerDialog('Error','El archivo,'+oficio+' no fue creado'); 
    }

      }/*2do success fin*/


     });

      });
}
});


});



$('#TSearch').hide();  
$('.btnsearch').on('click',function(e){
  e.preventDefault();
  $('#TSearch').show();  
  var cargar=$('#TableSearch').html('<div class="app-load"><img src="../img/30.gif" /></div>');
var CriterioBusqueda=$('#search').val();
var option1=$('input:radio[name=optionsRadios]:checked').val();
var fecha1=$('#fecha1').val();
var fecha2=$('#fecha2').val();
var dataString='CriterioBusqueda='+CriterioBusqueda+'&option1='+option1+'&fecha1='+fecha1+'&fecha2='+fecha2;
 $.ajax({
      type: "POST",
      url: "../procesos/search",
    data: dataString,
      success: function(a) {
      var ver=a;
      if(ver!=""){
      $('#TableSearch').html(ver);        

      }
     

      }

});

});



$('#TSearch2').hide();  
$('.RespSearch').on('click',function(e){
  e.preventDefault();
  $('#TSearch2').show();  
  var cargar=$('#TableSearch').html('<div class="app-load"><img src="../img/30.gif" /></div>');
var CriterioBusqueda=$('#search').val();
var dataString='CriterioBusqueda='+CriterioBusqueda;
 $.ajax({
      type: "POST",
      url: "../procesos/rsearch",
    data: dataString,
      success: function(a) {
      var ver=a;
      if(ver!=""){
      $('#TableSearch').html(ver);        

      }
     

      }

});

});


$('#TSearch').hide();  
$('.SearchUser').on('click',function(e){
  e.preventDefault();
  $('#TSearch').show();  
  var cargar=$('#TableSearch').html('<div class="app-load"><img src="../img/30.gif" /></div>');
var CriterioBusqueda=$('#search').val();
var dataString='CriterioBusqueda='+CriterioBusqueda;
 $.ajax({
      type: "POST",
      url: "../procesos/searchuser",
    data: dataString,
      success: function(a) {
      var ver=a;
      if(ver!=""){
      $('#TableSearch').html(ver);        

      }
     

      }

});

});

$('#Rbusqueda').on('click',function(e){
  e.preventDefault();
$('#TSearch2').hide(); 
$('#search').val("");
});

$('#Cbusqueda').on('click',function(e){
  e.preventDefault();
$('#TSearch').hide(); 
$('#search').val("");
});

$('.edit').on('click',function(){
var id=$(this).parent().attr('data');
var dataString='id='+id;


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
      var estado=$('#estado').val();
      var fechai=$('#fechai').val();
      var obs=$('#obs').val();
      var DataString='id='+id+'&name_docto='+name_docto+'&oficio='+oficio+'&num_archive='+num_archive+'&num_gabeta='+num_gabeta+'&num_fila='+num_fila+'&estado='+estado+'&fechai='+fechai+'&obs='+obs;
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



$('.trash').on('click',function(){ 
var id=$(this).parent().attr('data');
var dataString='id='+id;
EditArchivo('Eliminar','¿Deseas eliminar este archivo?');
$('#Aceptar').on('click',function(){
  var cargar=$('#modalDialog').html('<div class="app-load"><img src="../img/30.gif" /></div>');
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

$('.trashE').on('click',function(){
var id=$(this).parent().attr('data');
var dataString='id='+id;
EditArchivo('Eliminar','¿Deseas eliminar este envió?');
$('#Aceptar').on('click',function(){
$.ajax({
  type:"POST",
  url:"../procesos/delenvio",
  data: dataString,
  success: function(a){

    if(a==1){
      obtenerDialog('Nota',' El envió fue eliminado');
      $('#aceptar').on('click',function(){
          location.reload();
        });

    }else{
      obtenerDialog('Error','El envió no se pudo Eliminar');
    }
  }
});

});
});


$('#entrar').on('click',function(){
  var cargar=$('#modalDialog').html('<div class="app-load"><img src="img/30.gif" /></div>');    
var usuario=$('#user').val();
var pasw=$('#psw').val();

var dataString='usuario='+usuario+'&pasw='+pasw;

    $.ajax({
      type: "POST",
      url: "procesos/log",
    data: dataString,
      success: function(a) {
      var ver=a;
      if(ver==1){
      document.location.href = 'pages/archivos';        

      }
      else{       
      ObtenerDialog('Usuario o Contraseña incorrecta');   

      }
      }
       });
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

$('#Nuser').on('click',function(e){
e.preventDefault();
 var cargar=$('#modalDialog').html('<div class="app-load"><img src="../img/30.gif" /></div>');   
$.ajax({
  url: "../procesos/newuser",
  success: function(a) {
  EditArchivo('Crear',a);
  $('#Aceptar').on('click',function(){
  var name=$('#name').val();
  var last_name=$('#last_name').val();
  var user=$('#user').val();
  var psw=$('#psw').val();
  var confpsw=$('#confpsw').val();
  var unidad=$('#unidades').val();
  var depto=$('#departamentos').val();
  var cargo=$('#cargo').val();
  var dataString='name='+name+'&last_name='+last_name+'&user='+user+'&psw='+psw+'&confpsw='+confpsw+'&unidad='+unidad+'&depto='+depto+'&cargo='+cargo;
 
  if(psw==confpsw){
    if(psw.length>4 && confpsw.length>4){
      
    $('#error').removeClass('alert alert-danger').html('');
$.ajax({
    type: "POST",
      url: "../procesos/makeuser",
    data: dataString,
    success: function(b) {
      
var ver=b;
      if(ver==1){
        obtenerDialog('Nota','Usuario creado satisfactoriamente');
        $('#aceptar').on('click',function(){
          location.reload();
        });
        
      }
      else{       
      obtenerDialog('Error','No se logro crear el Usuario, '+name+' '+last_name);   

      }

    }
  });
          } else{
            $('#error').addClass('alert alert-danger').html('La contraseña debe ser mayor a 4 caracteres');
          }
          }else{
            $('#error').addClass('alert alert-danger').html('Contraseñas no coinciden');

          }

                });
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
     if(psw=="" && confpsw==""){
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
     }
     else if(psw==confpsw){
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

$('#mperfiledit').on('click',function(){
   var cargar=$('#modalDialog').html('<div class="app-load"><img src="../img/30.gif" /></div>');   
var id=$('#id').val();
    var name=$('#name').val();
    var last_name=$('#last_name').val();
    var user=$('#user').val();
    var psw=$('#psw').val();
    var confpsw=$('#confpsw').val();
var dataString='id='+id+'&name='+name+'&last_name='+last_name+'&user='+user+'&psw='+psw;


     if(psw=="" && confpsw==""){
       $.ajax({
      type:"POST",
      url:"../procesos/editmperfil",
      data:dataString,
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
     }
     else if(psw==confpsw){
      if(psw.length>4 && confpsw.length>4){   

    $('#error').removeClass('alert alert-danger').html('');
    $.ajax({
      type:"POST",
      url:"../procesos/editmperfil",
      data:dataString,
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







$('#unidades').change(function(e){ 
  e.preventDefault();

var unidades=$('#unidades').val();
var DataString='unidades='+unidades;
$.ajax({
type:"POST",
url:"../procesos/deptos",
data:DataString,
success:function(uni){
if(uni!=""){
$('#deptos').removeClass('alert alert-warning').html(uni);
}else{
  $('#deptos').addClass('alert alert-warning').html('No hay departamentos para esta Unidad');
}
}
});

});

$('#unidadese').change(function(e){
  e.preventDefault();

var unidadese=$('#unidadese').val();
var DataString='unidadese='+unidadese;
$.ajax({
type:"POST",
url:"../procesos/deptose",
data:DataString,
success:function(uni){
if(uni!=""){
$('#deptos').removeClass('alert alert-warning').html(uni);
}else{
  $('#deptos').addClass('alert alert-warning').html('No hay departamentos para esta Unidad');
}
}
});

});

$('#send').on('click',function(e){
  e.preventDefault();
 
 var departamentos=$('#departamentos').val();
 var id=$('#ids').val();
 var dataString='departamentos='+departamentos+'&id='+id;
  
  $.ajax({
type:"POST",
url:"../procesos/envios",
data:dataString,
success:function(env){
  if(env==1){
    obtenerDialog('Nota','Su Archivo se envió a los destinatarios correctamente');
     $('#aceptar').on('click',function(){
          location.reload();
        });
  }else{
obtenerDialog('Error','Su Archivo no logró ser enviado a los destinatarios correctamente');

  }
}


  });



});

$('.visto').on('click',function(){
var id=$(this).parent().attr('data');
var dataString='id='+id;

$.ajax({
type:"POST",
url:"../procesos/visto",
data:dataString,
success:function(visto){
 $('#modalDialog').html(visto); 
if(visto==1){
location.reload();
}
}
});


});

$('#Npermiso').on('click',function(e){
  e.preventDefault();
  $.ajax({
    url:"../procesos/newpermiso.php",
    success:function(a){
EditArchivo('Crear Permiso',a);
$('#Aceptar').on('click',function(){
var iPermiso=$('#iPermiso').val();
var Crear=$('#Crear').val();
var Editar=$('#Editar').val();
var Eliminar=$('#Eliminar').val();
var Usuarios=$('#Usuarios').val();
var Cargos=$('#Cargos').val();
var Catalogo=$('#Catalogo').val();
var Estado=$('#Estado').val();
var Respuesta=$('#Respuesta').val();
var dataString='iPermiso='+iPermiso+'&Crear='+Crear+'&Editar='+Editar+'&Eliminar='+Eliminar+'&Usuarios='+Usuarios+'&Cargos='+Cargos+'&Catalogo='+Catalogo+'&Estado='+Estado+'&Respuesta='+Respuesta;
$.ajax({
type:"POST",
url:"../procesos/makepermiso.php",
data:dataString,
success:function(b){
if(b==1){
   obtenerDialog('Nota',' Permiso fue creado, '+iPermiso);
      $('#aceptar').on('click',function(){
          location.reload();
        });
}else{
   obtenerDialog('Error','No se logro crear el permiso, '+iPermiso );
}

}

});
});
    }
  });

});

$('.pedit').on('click',function(){
var id=$(this).parent().attr('data');
var dataString='id='+id;
$.ajax({
  type:"POST",
  url:"../procesos/pedit.php",
  data:dataString,
  success:function(a){
    EditArchivo('Editar',a);
    $('#Aceptar').on('click',function(){
      var id=$('#id').val();
     var iPermiso=$('#iPermiso').val();
var Crear=$('#Crear').val();
var Editar=$('#Editar').val();
var Eliminar=$('#Eliminar').val();
var Usuarios=$('#Usuarios').val();
var Cargos=$('#Cargos').val();
var Catalogo=$('#Catalogo').val();
var Estado=$('#Estado').val()
var Respuesta=$('#Respuesta').val();
var DataString='id='+id+'&iPermiso='+iPermiso+'&Crear='+Crear+'&Editar='+Editar+'&Eliminar='+Eliminar+'&Usuarios='+Usuarios+'&Cargos='+Cargos+'&Catalogo='+Catalogo+'&Estado='+Estado+'&Respuesta='+Respuesta;
$.ajax({
type:"POST",
url:"../procesos/editp.php",
data:DataString,
success:function(b){
  if(b==1){
    obtenerDialog('Nota','Permiso '+iPermiso+' editado');
    $('#aceptar').on('click',function(){
      location.reload();
    });
  }else{
    obtenerDialog('Nota','Permiso '+iPermiso+' no se logro editar');
  }
}
});

 });  
}
});

});

$('.ptrash').on('click',function(){
var id=$(this).parent().attr('data');
var dataString='id='+id;
EditArchivo('Eliminar','¿Deseas eliminar este permiso?');
$('#Aceptar').on('click',function(){
$.ajax({
  type:"POST",
  url:"../procesos/ptrash.php",
  data: dataString,
  success: function(a){

    if(a==1){
      obtenerDialog('Nota','Permiso fue eliminado');
      $('#aceptar').on('click',function(){
          location.reload();
        });

    }else{
      obtenerDialog('Nota','Permiso no se pudo Eliminar');
    }
  }
});

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

$('.plus').on('click',function(){
var id=$(this).parent().attr('data');
document.location.href= '../procesos/subarchivo?id='+id;

});

$('#unid').on('click',function(){
 $.ajax({
url:"../procesos/cunidades",
success:function(ver){
EditArchivo('Crear Unidad',ver);
$('#Aceptar').on('click',function(){
var Cuni=$('#Cuni').val();
var dataString='Cuni='+Cuni;
$.ajax({
  type:"POST",
  url:"../procesos/makeunidades",
  data: dataString,
  success:function(crear){
if(crear==1){
  obtenerDialog('Nota','Unidad '+Cuni+' creada con exito');
  $('#aceptar').on('click',function(){
location.reload();
  });
}else{
  obtenerDialog('Nota','no se pudo crear '+Cuni);
}

  }

});/*segundo ajax*/
});

}/*1er succes*/
 });

});

$('#dep').on('click',function(){

$.ajax({
url:"../procesos/cdepto",
success:function(ver){
EditArchivo('Crear Departamento',ver);
$('#Aceptar').on('click',function(){
var id=$('#unidades').val();
var Cdepto=$('#mdepto').val();
var DataString='Cdepto='+Cdepto+'&id='+id;
$.ajax({
type:"POST",
url:"../procesos/makedepto",
data: DataString,
success:function(crear){
if(crear==1){
  obtenerDialog('Nota','Departamento '+Cdepto+' creada con exito');
  $('#aceptar').on('click',function(){
location.reload();
  });
}else{
  obtenerDialog('Nota','no se pudo crear '+Cdepto);
}

}/*2do succes*/

});/*2do ajax*/

});


}/*1er succes*/


});/*1er ajax*/

});






function actualizar(){
$('.badge1').fadeOut("slow").load('../procesos/alert').fadeIn("slow");
}
setInterval(actualizar, 10000);


/*function checkMsj(){
    $.ajax({ 
             
            url:"../procesos/alert", 
            success:function(resultado){ 
              if(resultado>=0){
              $("#modalDialog").html(resultado); 
               
          } 
        }
    });
}
setInterval(checkMsj,10000);*/


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