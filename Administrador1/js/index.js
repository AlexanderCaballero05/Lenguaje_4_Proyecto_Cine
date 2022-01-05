$(document).ready(function(){
 
  $.ajax({
    type: 'POST',
    url: 'crud/cargar_listas.php',
    
  })
  .done(function(listas_rep){
    $('#id_pelicula').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas_rep')
  })

 

})

$(document).ready(function(){
 
  $.ajax({
    type: 'POST',
    url: 'crud/cargar_formato.php',
    
  })
  .done(function(listas_rep){
    $('#id_formato').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas_rep')
  })

 

})

$(document).ready(function(){
 
  $.ajax({
    type: 'POST',
    url: 'crud/cargar_audio.php',
    
  })
  .done(function(listas_rep){
    $('#id_audio').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas_rep')
  })

 

})

$(document).ready(function(){
 
  $.ajax({
    type: 'POST',
    url: 'crud/cargar_sala.php',
    
  })
  .done(function(listas_rep){
    $('#id_sala').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas_rep')
  })

 

})