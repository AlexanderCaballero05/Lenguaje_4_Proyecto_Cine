$(document).ready(function() {
    var id, opcion;
    opcion = 2;
        
   

    pelicula = $('#tablausuario').DataTable({  
        "ajax":{            
            "url": "crud/crudusuario.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "ID_USUARIO"},
            {"data": "PRIMER_NOMBRE"},
            {"data": "PRIMER_APELLIDO"},
            {"data": "CORREO"},
            {"data": "TELEFONO"},
            {"data": "PERFIL"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></div></div>"}
        ]
    });     
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formusuario').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        // id = $.trim($('#id').val());    
         nombre1 = $.trim($('#nombre1').val());
         nombre2 = $.trim($('#nombre2').val()); 
         apellido1 = $.trim($('#apellido1').val());
         apellido2 = $.trim($('#apellido2').val());
         correo = $.trim($('#correo').val());
         edad = $.trim($('#edad').val()); 
         telefono = $.trim($('#telefono').val());
         direccion = $.trim($('#direccion').val());
         sexo = $.trim($('#sexo').val());
         clave = $.trim($('#clave').val());
         usuario = $.trim($('#usuario').val());
         nacimiento = $.trim($('#nacimiento').val());
         perfil = $.trim($('#perfil').val());
          
 
                                   
             $.ajax({
               url: "crud/CrudAdministrador.php",
               type: "POST",
               datatype:"json",    
               data:  {id:id, nombre1:nombre1, nombre2:nombre2, apellido1:apellido1, apellido2:apellido2, correo:correo,
                 edad:edad, telefono:telefono, direccion:direccion, sexo:sexo, clave:clave, usuario:usuario, 
                 nacimiento:nacimiento, opcion:opcion},    
               success: function(data) {
                 cartelera.ajax.reload(null, false);
                }
             });			        
         $('#modalCRUD').modal('hide');											     			
     });
             
      
     
     //para limpiar los campos 
     $("#btnNuevo").click(function(){
         opcion = 1; //alta           
         id=null;
         $("#formadministrador").trigger("reset");
         $(".modal-header").css( "background-color", "#17a2b8");
         $(".modal-header").css( "color", "white" );
         $(".modal-title").text("Agregar nuevo registro");
         $('#modalCRUD').modal('show');	    
     });
    //Editar        
   
         
    });    