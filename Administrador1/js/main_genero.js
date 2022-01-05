$(document).ready(function() {
var id, opcion;
opcion = 4;
    
tablagenero = $('#tablagenero').DataTable({  
    "ajax":{            
        "url": "crud/crudgenero.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "ID"},
        {"data": "NOMBRE"},
        {"data": "DESCRIPCION"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formgenero').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nombre = $.trim($('#nombre').val());
    descripcion = $.trim($('#descripcion').val());    
                              
        $.ajax({
          url: "crud/crudgenero.php",
          type: "POST",
          datatype:"json",    
          data:  {id:id, nombre:nombre, descripcion:descripcion,opcion:opcion},    
          success: function(data) {
            tablagenero.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
 

//para limpiar los campos 
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    id=null;
    $("#formgenero").trigger("reset");
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
    nombre = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
    
    //$("#id").val(id);
    $("#nombre").val(nombre);
    $("#descripcion").val(descripcion);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Genero");		
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
          url: "crud/crudgenero.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id:id},    
          success: function() {
              tablagenero.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
     
});    