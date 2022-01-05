<?php

include '../model/conexion.php';
$sentencia = $bd->query('SELECT p.ID_PELICULA , p.IMAGEN
from pelicula p, genero g , clasificacion cla, estado e
where p.ID_GENERO = g.ID
and p.ID_CLASIFICACION = cla.ID
and p.ID_ESTADO = e.ID
and p.ID_ESTADO = 3');
$pelicula = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="es">
  

  <?php  include 'vistas1/menu.php' ?>

  

  <body background= "img/fondo.png" >

  
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="padding-top: 93px;">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 3"></button>
    
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img  src="img/imagen1.jpeg" class="d-block w-100" alt="bootstrap" width="620px" height="450px">
    </div>
    <div class="carousel-item">
      <img src="img/imagen2.jpeg" class="d-block w-100" alt="bootstrap" width="620px" height="450px">
    </div>
    <div class="carousel-item">
      <img src="img/imagen3.jpeg" class="d-block w-100" alt="bootstrap" width="620px" height="450px">
    </div>
    <div class="carousel-item">
      <img src="img/imagen4.jpeg" class="d-block w-100" alt="bootstrap" width="620px" height="450px">
    </div>
    <div class="carousel-item">
      <img src="img/2.jpg" class="d-block w-100" alt="bootstrap" width="620px" height="450px">
    </div>
    <div class="carousel-item">
      <img src="img/1.jpg" class="d-block w-100" alt="bootstrap" width="620px" height="450px">
    </div>
    <div class="carousel-item">
      <img src="img/3.jpg" class="d-block w-100" alt="bootstrap" width="620px" height="450px">
    </div>




  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



     <div class ="container w-50 mt-3 mb-3" style="background-color:#ffff;   min-height: calc(100vh - 120px- 150.25px);">
    <div class="d-grid gap-2"> <button class="btn btn-primary text-start mt-3" type="button"><a id="enlace" href="cartelera1.php.">CARTELERA CINEMA HN
         <i class="fas fa-arrow-alt-circle-right"></i> </a>
        </button> 
      </div>
   
      <div class="row">
      <p></p>
     
      <h2 class="titulo-pe" >PRÓXIMOS ESTRENOS </h2>

        <?php
          foreach ($pelicula as $dato) {
        ?>
         
        <div class="col-md-4 text-center mt-3">
        <a href="Descripcion.php?codigo=<?php echo $dato->ID_PELICULA ?>"><img src="img/<?php echo $dato->IMAGEN ?>"  width="200" height="200"  width="200" height="200" class="img-fluid"></a>
        
        </div>

        <?php
          }
        ?>
         <p></p>
         <p></p>
          <p></p>
       </div>
     </div>
   
    
  </body>

  <?php  include 'vistas1/footer.php' ?>


</html>