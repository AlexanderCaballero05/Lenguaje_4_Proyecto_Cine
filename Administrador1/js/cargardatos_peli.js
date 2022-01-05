$(document).ready(function(){
 
    $.ajax({
      type: 'POST',
      url: 'crud/cargar_genero.php',
      
    })
    .done(function(listas_rep){
      $('#NOMBRE').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas_rep')
    })
  
   
  
  })
  
  $(document).ready(function(){
   
    $.ajax({
      type: 'POST',
      url: 'crud/cargar_clasificacion.php',
      
    })
    .done(function(listas_rep){
      $('#descripcion').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas_rep')
    })
  
   
  
  })
  
  $(document).ready(function(){
   
    $.ajax({
      type: 'POST',
      url: 'crud/cargar_estado.php',
      
    })
    .done(function(listas_rep){
      $('#TIPO').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas_rep')
    })
  
   
  
  })