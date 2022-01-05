$(document).ready(function() {
    var id, opcion;
    opcion = 2;
        
   

    pelicula = $('#tablausuario').DataTable({  
        "ajax":{            
            "url": "crud/crudventas.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "FECHA"},
            {"data": "ID_FACTURA"},
            {"data": "CLIENTE"},
            {"data": "TITULO"},
            {"data": "PRECIO"},
            {"data": "CAN_BOLETO"},
            {"data": "SUBTOTAL"},
            {"data": "CARGO"},
            {"data": "TOTAL"},
           
        ]
    });     
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formusuario').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        // id = $.trim($('#id').val());  
         fecha = $.trim($('#fecha').val()); 
         usuario = $.trim($('#usuario').val());
         id_cartelera = $.trim($('#id_cartelera').val());
         precio = $.trim($('#precio').val());
         can_boleto = $.trim($('#can_boleto').val()); 
         subtotal = $.trim($('#subtotal').val()); 
         cargo = $.trim($('#cargo').val()); 
         total = $.trim($('#total').val()); 
        
                                   
             $.ajax({
               url: "crud/Crudventas.php",
               type: "POST",
               datatype:"json",    
               data:  {fecha:fecha, id:id, usuario:usuario, id_cartelera:id_cartelera, precio:precio,can_boleto:can_boleto, subtotal:subtotal, cargo:cargo, total:total,  opcion:opcion},    
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