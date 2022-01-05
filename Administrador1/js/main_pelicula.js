$(document).ready(function() {
    var id, opcion;
    opcion = 4;
        
    pelicula = $('#tablaPELICULA').DataTable({  
        "ajax":{            
            "url": "crud/crudpelicula.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "ID_PELICULA"},
            {"data": "TITULO"},
            {"data": "NOMBRE"},
            {"data": "descripcion"},
            {"data": "SIGNOSIS"},
            {"data": "ANIO"},
            {"data": "IMAGEN"},
            {"data": "DURACION"},
            {"data": "TIPO"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]
    });     
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formpelicula').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
       // id = $.trim($('#id').val());    
        titulo = $.trim($('#titulo').val());
        id_genero = $.trim($('#NOMBRE').val()); 
        id_clasificacion = $.trim($('#descripcion').val());
        signosis = $.trim($('#signosis').val());
        anio = $.trim($('#anio').val());
        imagen = $.trim($('#imagen').val()); 
        duracion = $.trim($('#duracion').val());
        id_estado = $.trim($('#TIPO').val());        
                                  
            $.ajax({
              url: "crud/crudpelicula.php",
              type: "POST",
              datatype:"json",    
              data:  {id:id, titulo:titulo, id_genero:id_genero, id_clasificacion:id_clasificacion, signosis:signosis,
                anio:anio, imagen:imagen, duracion:duracion, id_estado:id_estado,opcion:opcion},    
              success: function(data) {
                pelicula.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
     
    
    //para limpiar los campos 
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        id=null;
        $("#formpelicula").trigger("reset");
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
        titulo = fila.find('td:eq(1)').text();
        id_genero = fila.find('td:eq(2)').text();
        id_clasificacion = fila.find('td:eq(3)').text();
        signosis = fila.find('td:eq(4)').text();
        anio = fila.find('td:eq(5)').text();
        imagen = fila.find('td:eq(6)').text();
        duracion = fila.find('td:eq(7)').text();
        id_estado = fila.find('td:eq(8)').text();
       
        
        //$("#id").val(id);
        $("#titulo").val(titulo);
        $("#NOMBRE").val(id_genero);
        $("#descripcion").val(id_clasificacion);
        $("#signosis").val(signosis);
        $("#anio").val(anio);
        $("#imagen").val(imagen);
        $("#duracion").val(duracion);
        $("#TIPO").val(id_estado);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar pelicula");		
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
              url: "crud/crudpelicula.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id:id},    
              success: function() {
                  pelicula.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    