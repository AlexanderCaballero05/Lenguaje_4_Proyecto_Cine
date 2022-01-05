$(document).ready(function() {
    var id, opcion;
    opcion = 4;
        
    tablaasiento = $('#tablaasiento').DataTable({  
        "ajax":{            
            "url": "crud/crudasiento.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "ID"},
            {"data": "LINEA"},
            {"data": "COLUMNA"},
            {"data": "ID_ESTADO"},

            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]
    });     
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formasiento').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
       
        linea = $.trim($('#linea').val());
        columna = $.trim($('#columna').val());    
        id_estado = $.trim($('#id_estado').val());  
                                  
            $.ajax({
              url: "crud/crudasiento.php",
              type: "POST",
              datatype:"json",    
              data:  {id:id, linea:linea, columna:columna, id_estado: id_estado, opcion:opcion},    
              success: function(data) {
                tablaasiento.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
     
    
    //para limpiar los campos 
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        id=null;
        $("#formasiento").trigger("reset");
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
        linea = fila.find('td:eq(1)').text();
        columna = fila.find('td:eq(2)').text();
        id_estado = fila.find('td:eq(3)').text();
        
        //$("#id").val(id);
        $("#linea").val(linea);
        $("#columna").val(columna);
        $("#id_estado").val(id_estado);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Asiento");		
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
              url: "crud/crudasiento.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id:id},    
              success: function() {
                  tablaasiento.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    