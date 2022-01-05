
<?php  include 'vistas1/menu.php' ?>

<?php

include '../model/conexion.php';
//query cartelera
$date = date('Y-m-d H:i:s');
$sentencia = $bd->query('SELECT c.ID_CARTELERA ,p.ID_PELICULA, c.FECHA, c.HORA_INICIO, p.TITULO, p.IMAGEN, a.TIPO
from cartelera c, pelicula p ,audio a
where c.ID_PELICULA = p.ID_PELICULA
and   c.ID_AUDIO = a.ID 
and DATE(c.FECHA) = CURDATE() 
group by c.ID_PELICULA
order by c.ID_CARTELERA');


$pelicula = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<body background= "img/fondo1.png">

<div class ="container w-50  mb-5 pb-5 px-0 " style="background-color:#ffff;    margin-top: 120px;">
  

     <div class=" d-grid gap-2  ">
        <button class="btn btn-primary text-start m-0  mb-3 pb-3 pt-3 " type="button"><a id="enlace" href="carteleraSemanal.php"> <i class="fas fa-arrow-alt-circle-left"></i>  IR A CARTELERA SEMANAL   </a>
       </button> 
    </div> 
    <h2 class="titulo-pe"> <p class="px-4" style="color:#0b5ba1;"> PELICULAS EN CARTELERA HOY </p></h2>   

   
 

       <div class="row">  
      
                  <?php 
                        foreach ($pelicula as $dato) {
                  ?>
                        
                      <div class="col-md-4 text-center mt-3 px-1" >
                     
                     <a href="Descripcion_cartelera.php?codigo=<?php echo $dato->ID_CARTELERA ?>"><img src="img/<?php echo $dato->IMAGEN?>"  width="190" height="190"  class="img-fluid"></a>
                        <p> <?php echo $dato->TITULO; ?> </p>
                     </div>

                     <?php
                        }
                     ?>
       </div>
</div>






</body>


<?php  include 'vistas1/footer.php' ?>