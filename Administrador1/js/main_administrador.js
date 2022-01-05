$(document).ready(function() {
    var id, opcion;
    opcion = 4;
        
    tablaclasificacion = $('#tablaadmind').DataTable({  
        "ajax":{            
            "url": "crud/crudadministrador.php", 
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
            {"data": "perfil"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button></div></div>"}

        ]
    });     
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formclasificacion').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
       // id = $.trim($('#id').val());    
        primer_nombre = $.trim($('#primer_nombre').val());
        segundo_nombre = $.trim($('#segundo_nombre').val());
        primer_apellido = $.trim($('#primer_apellido').val());
        segundo_apellido = $.trim($('#segundo_apellido').val());     
        correo = $.trim($('#correo').val());  
        edad = $.trim($('#edad').val());     
        telefono = $.trim($('#telefono').val()); 
        direccion = $.trim($('#direccion').val());     
        sexo = $.trim($('#sexo').val()); 
        clave = $.trim($('#clave').val());     
        usuario = $.trim($('#usuario').val());
        fecha_nacimiento = $.trim($('#fecha_nacimiento').val());      
        
        

            $.ajax({
              url: "crud/crudadministrador.php",
              type: "POST",
              datatype:"json",    
              data:  {id:id, primer_nombre:primer_nombre, segundo_nombre:segundo_nombre, primer_apellido:primer_apellido, segundo_apellido:segundo_apellido, correo:correo, 
                edad:edad, telefono:telefono, direccion:direccion, sexo:sexo, clave:clave, usuario:usuario, fecha_nacimiento:fecha_nacimiento, opcion:opcion},    
              success: function(data) {
                tablaclasificacion.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
     
    
    //para limpiar los campos 
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        id=null;
        $("#formclasificacion").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Agregar nuevo registro");
        $('#modalCRUD').modal('show');	    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        primer_nombre = fila.find('td:eq(1)').text();
        segundo_nombre = fila.find('td:eq(2)').text();
        
        //$("#id").val(id);
        $("#primer_nombre").val(nombre);
        $("#segundo_nombre").val(descripcion);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Clasificacion");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+id+"?");                
        if (respuesta) {            
            $.ajax({
              url: "crud/crudadministrador.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id:id},    
              success: function() {
                  tablaclasificacion.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    