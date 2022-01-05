
<?php include 'vistas1/menu.php' ?>
<?php


include '../model/conexion.php';
//query cartelera Semanal 
$date = date('Y-m-d H:i:s');
$sentenciam = $bd->query('SELECT c.ID_CARTELERA ,p.ID_PELICULA, c.FECHA, c.HORA_INICIO, p.TITULO, p.IMAGEN, a.TIPO
from cartelera c, pelicula p ,audio a
where c.ID_PELICULA = p.ID_PELICULA
and   c.ID_AUDIO = a.ID 
and DATE(c.FECHA) = CURDATE() + 1
group by c.ID_PELICULA
order by c.ID_CARTELERA');

$peliculam = $sentenciam->fetchAll(PDO::FETCH_OBJ);

//query cartelera Semanal 
$date = date('Y-m-d H:i:s');
$sentenciaj = $bd->query('SELECT c.ID_CARTELERA ,p.ID_PELICULA, c.FECHA, c.HORA_INICIO, p.TITULO, p.IMAGEN, a.TIPO
from cartelera c, pelicula p ,audio a
where c.ID_PELICULA = p.ID_PELICULA
and   c.ID_AUDIO = a.ID 
and DATE(c.FECHA) = CURDATE() + 2
group by c.ID_PELICULA
order by c.ID_CARTELERA');

$peliculaj = $sentenciaj->fetchAll(PDO::FETCH_OBJ);


//query cartelera Semanal Viernes
$date = date('Y-m-d H:i:s');
$sentenciav = $bd->query('SELECT c.ID_CARTELERA ,p.ID_PELICULA, c.FECHA, c.HORA_INICIO, p.TITULO, p.IMAGEN, a.TIPO
from cartelera c, pelicula p ,audio a
where c.ID_PELICULA = p.ID_PELICULA
and   c.ID_AUDIO = a.ID 
and DATE(c.FECHA) = CURDATE() + 3
group by c.ID_PELICULA
order by c.ID_CARTELERA');

$peliculav = $sentenciav->fetchAll(PDO::FETCH_OBJ);



?>
    <!-- Peliculas Cartelera -->

<body background= "img/fondo1.png">


<div class ="container w-52  mb-2 pb-2" style="background-color:#ffff;   min-height: calc(100vh - 120px- 150.25px); margin-top: 120px;">

<div class=" d-grid gap-2  m-0">
     <button class="btn btn-primary text-start m-0  mb-3 " type="button"><a id="enlace" href="cartelera1.php."> <i class="fas fa-arrow-alt-circle-left"></i>  REGRESAR A CARTELERA   </a>

     </button> 
</div> 
     <div class="row">  
      
     <h2 class="titulo-pe" >CARTELERA SEMANAL MIERCOLES</h2>
     
   
                <?php 
                      foreach ($peliculam as $datom) {
                ?>
                    <div class="col-md-2 text-center mt-2">
                    <p> <?php echo $datom->FECHA; ?> </p>
                   
                   <a href="Descripcion_cartelera.php?codigo=<?php echo $datom->ID_CARTELERA ?>"><img src="img/<?php echo $datom->IMAGEN?>"  width="220" height="220"  class="img-fluid"></a>
                      <p> <?php echo $datom->TITULO; ?> </p>
                   
                   </div>

                   

                   <?php
                      }
                   ?>
     </div>
</div>

<div class ="container w-52  mb-5 pb-5" style="background-color:#ffff;   min-height: calc(100vh - 120px- 150.25px); margin-top: 120px;">

<div class=" d-grid gap-2  m-0">
<button class="btn btn-primary text-start m-0  mb-3 " type="button"><a id="enlace" href="cartelera1.php."> <i class="fas fa-arrow-alt-circle-left"></i>  REGRESAR A CARTELERA   </a>


     </button> 
</div> 
     <div class="row">  
    
     <h2 class="titulo-pe" >CARTELERA SEMANAL JUEVES</h2>
                <?php 
                      foreach ($peliculaj as $datoj) {
                ?>
                    <div class="col-md-2 text-center mt-2">
                    <p> <?php echo $datoj->FECHA; ?> </p>
                   
                   <a href="Descripcion_cartelera.php?codigo=<?php echo $datoj->ID_CARTELERA ?>"><img src="img/<?php echo $datoj->IMAGEN?>"  width="220" height="220"  class="img-fluid"></a>
                      <p> <?php echo $datoj->TITULO; ?> </p>
                   </div>

                   

                   <?php
                      }
                   ?>
     </div>
</div>


<div class ="container w-52  mb-5 pb-5" style="background-color:#ffff;   min-height: calc(100vh - 120px- 150.25px); margin-top: 120px;">

<div class=" d-grid gap-2  m-0">
<button class="btn btn-primary text-start m-0  mb-3 " type="button"><a id="enlace" href="cartelera1.php."> <i class="fas fa-arrow-alt-circle-left"></i>  REGRESAR A CARTELERA   </a>


     </button> 
</div> 
     <div class="row">  
     <h2 class="titulo-pe" >CARTELERA SEMANAL VIERNES</h2>

 
                <?php 
                      foreach ($peliculav as $datov) {
                ?>
                    <div class="col-md-2 text-center mt-2">
                    <p> <?php echo $datov->FECHA; ?> </p>
                   
                   <a href="Descripcion_cartelera.php?codigo=<?php echo $datov->ID_CARTELERA ?>"><img src="img/<?php echo $datov->IMAGEN?>"  width="220" height="220"  class="img-fluid"></a>
                      <p> <?php echo $datov->TITULO; ?> </p>
                   </div>

                   

                   <?php
                      }
                   ?>
     </div>
</div>







</body>
<?php  include 'vistas1/footer.php' ?>