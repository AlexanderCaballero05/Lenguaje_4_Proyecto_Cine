$(document).ready(function() {
    var id, opcion;
    opcion = 4;
        
    cartelera = $('#tablacartelera').DataTable({  
        "ajax":{            
            "url": "crud/crudcartelera.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "ID_CARTELERA"},
            {"data": "TITULO"},
            {"data": "SALA1"},
            {"data": "NOMBRE"},
            {"data": "TIPO"},
            {"data": "HORA_INICIO"},
            {"data": "HORA_FINAL"},
            {"data": "FECHA"},
            {"data": "PRECIO"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]
    });     
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formcartelera').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
       // id = $.trim($('#id').val());    
        id_pelicula = $.trim($('#id_pelicula').val());
        id_sala = $.trim($('#id_sala').val()); 
        id_formato = $.trim($('#id_formato').val());
        id_audio = $.trim($('#id_audio').val());
        hora_inicio = $.trim($('#hora_inicio').val());
        hora_final = $.trim($('#hora_final').val()); 
        fecha = $.trim($('#fecha').val());
        precio = $.trim($('#precio').val());        
                                  
            $.ajax({
              url: "crud/crudcartelera.php",
              type: "POST",
              datatype:"json",    
              data:  {id:id, id_pelicula:id_pelicula, id_sala:id_sala, id_formato:id_formato, id_audio:id_audio, hora_inicio:hora_inicio,
                hora_final:hora_final, fecha:fecha, precio:precio ,opcion:opcion},    
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
        $("#formcartelera").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Agregar nuevo registro");
        $('#modalCRUD').modal('show');	    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        id= parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        id_pelicula= fila.find('td:eq(1)').text();
        id_sala = fila.find('td:eq(2)').text();
        id_formato= fila.find('td:eq(3)').text();
        id_audio = fila.find('td:eq(4)').text();
        hora_inicio= fila.find('td:eq(5)').text();
        hora_final = fila.find('td:eq(6)').text();
        fecha = fila.find('td:eq(7)').text();
        Precio = fila.find('td:eq(8)').text();
       
        
        //$("#id").val(id);
        $("#id_pelicula").val(id_pelicula);
        $("id_sala").val(id_sala);
        $("#id_formato").val(id_formato);
        $("#id_audio").val(id_audio);
        $("#hora_inicio").val(hora_inicio);
        $("#hora_final").val(hora_final);
        $("#fecha").val(fecha);
        $("#precio").val(precio);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar cartelera");		
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
              url: "crud/crudcartelera.php.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id:id},    
              success: function() {
                  cartelera.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    