$(document).ready(function() {
    var id, opcion;
    opcion = 4;
        
    tablasala = $('#tablasala').DataTable({  
        "ajax":{            
            "url": "crud/crudsala.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "ID"},
            {"data": "TIPO"},
            {"data": "ID_ESTADO"},
            {"data": "CANTI_ASIENTOS"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]
    });     
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formsala').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página    
        tipo = $.trim($('#tipo').val());
        id_estado = $.trim($('#id_estado').val());
        canti_asientos = $.trim($('#canti_asientos').val());    
                                  
            $.ajax({
              url: "crud/crudsala.php",
              type: "POST",
              datatype:"json",    
              data:  {id:id, tipo:tipo, id_estado:id_estado, canti_asientos:canti_asientos, opcion:opcion},    
              success: function(data) {
              tablasala.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
     
    
    //para limpiar los campos 
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        id=null;
        $("#formsala").trigger("reset");
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
        tipo = fila.find('td:eq(1)').text();
        id_estado = fila.find('td:eq(2)').text();
        canti_asientos = fila.find('td:eq(3)').text();
        
        $("#tipo").val(tipo);
        $("#id_estado").val(id_estado);
        $("#canti_asientos").val(canti_asientos);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Sala");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro de sala "+id+"?");                
        if (respuesta) {            
            $.ajax({
              url: "crud/crudsala.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id:id},    
              success: function() {
                  tablasala.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    