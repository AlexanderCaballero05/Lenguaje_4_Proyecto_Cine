<?php
if (!isset($_GET["codigo"])) {
  exit();
}


$codigo = $_GET["codigo"];
$codigo1 = $_GET["codigo"];
include '../model/conexion.php';
$sentencia = $bd->prepare("SELECT c.ID_CARTELERA, c.ID_PELICULA, p.TITULO, p.SIGNOSIS, c.FECHA, c.HORA_INICIO , p.IMAGEN ,g.NOMBRE, cla.DESCRIPCION, a.TIPO
from cartelera c, pelicula p, genero g , clasificacion cla, audio a
where c.ID_PELICULA = p.ID_PELICULA
and   p.ID_PELICULA = g.ID
and   p.ID_CLASIFICACION = cla.ID
and   c.ID_AUDIO = a.ID 
and ID_CARTELERA = ?");
$sentencia->execute([$codigo]);
$pelicula = $sentencia->fetch(PDO::FETCH_OBJ);




?>
<?php  include 'vistas1/menu.php' ?>


  <body>

  <div class="container w-50 mb-5 ;" style="margin-top: 120px" >
          <div class="row" >
                <div class=" col-md-8 pull-left ">
                    <div class=" d-grid gap-2  m-0">
                     <button class="btn btn-primary text-start m-0 mb-4" type="button"><a id="enlace" href="cartelera1.php"> <i class="fas fa-arrow-alt-circle-left"></i>  REGRESAR A CARTELERA </a>
                      </button> 
                    </div>

                  <div class="row align-items-start">
                        <div class="col " >
                          <img  src="img/<?php echo $pelicula->IMAGEN; ?>"  width="220" height="220" class="img-fluid">
                          
                        </div>
                       <div class="col-md-6 px-0 pull-left "  >
                          <h2> <?php echo $pelicula->TITULO;  ?> </h2>
                          <button class="btn btn-warning btn-sm mb-2" type="button"><?php echo $pelicula->DESCRIPCION;?></button>
                          <button type="button" class="btn btn-info btn-sm mb-2"> <?php echo $pelicula->NOMBRE;?></button>
                        
                         
                      </div>
                  </div>

                   <!--sinopsis hay disculpe los erorres ortograficos,fue el compañero :V -->
                      <div class="col mt-4">
                      <h4 class="sinopsis" >Sinopsis</h4>
                       
                         <p class="conte-sinopsis"><?php echo $pelicula->SIGNOSIS; ?></p>
                      </div>

                </div>
                    <!--Parte de la columna derecha horarios-->
                   
                   <div class=" col-md-4 pull-right card border-dark mb-3  px-0">
                      <div class="card-header mx-0 pt-4"> <h5 > Horarios Disponibles<h5></div>
                      <div class="card-body text-dark">
                      <button class="btn btn-dark  btn-sm mb-2" type="button"><?php echo $pelicula->FECHA;?></button>
                       <p> <button  class="btn btn-secondary"><strong> <?php echo $pelicula->TIPO; ?> </strong></button>    <button class="btn btn-danger" type="button" >  <a class="hora" href="entradas.php?ID=<?php echo $pelicula->ID_CARTELERA?>">  <?php echo $pelicula->HORA_INICIO; ?></a> </button> </p> 
                       </div>
                 
                   </div>
                   

                   
                  
           <!--final -->
          </div>


      </div>





  </body>
  <?php  include 'vistas1/footer.php' ?>