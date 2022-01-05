<?php
if (!isset($_GET["codigo"])) {
  exit();
}

$codigo = $_GET["codigo"];
include '../model/conexion.php';
$sentencia = $bd->prepare("SELECT p.ID_PELICULA , p.IMAGEN, P.TITULO, p.SIGNOSIS , cla.DESCRIPCION , g.NOMBRE
from pelicula p, genero g , clasificacion cla, estado e
where p.ID_GENERO = g.ID
and p.ID_CLASIFICACION = cla.ID
and p.ID_ESTADO = e.ID
and p.ID_ESTADO = 3 and  ID_PELICULA = ?");

$sentencia->execute([$codigo]);
$pelicula = $sentencia->fetch(PDO::FETCH_OBJ);
?>
<?php  include 'vistas1/menu.php' ?>

  <body>


  <div class="container w-50 ;"  style="margin-top: 120px" >
     <div class="row" >
     
            <div class=" col-md-12 pull-left " >

                 <div class=" d-grid gap-2  m-0">
                     <button class="btn btn-primary text-start m-0 mb-2 " type="button"><a id="enlace" href="inicio.php"> <i class="fas fa-arrow-alt-circle-left"></i>REGRESAR A INICIO   </a>
                     </button> 
                 </div>
                 <h2 class="titulo-pe" >PRÓXIMAMENTE</h2>

                 <div class="row align-items-start">
                        <div class="col " >
                        <img src="img/<?php echo $pelicula->IMAGEN; ?>"  width="200" height="200" class="img-fluid">
                        </div>

                       <div class="col-md-8 px-0 pull-left "  >
                          <h2> <?php echo $pelicula->TITULO;  ?> </h2>
                          <button class="btn btn-dark  btn-sm mb-2" type="button"><?php echo $pelicula->DESCRIPCION;?></button>
                          <button type="button" class="btn btn-info btn-sm mb-2"> <?php echo $pelicula->NOMBRE;?></button>
                       </div>

                  </div>

                  <div class="col mt-4">
                      <h4 class="sinopsis" >Sinopsis</h4>
                       
                         <p class="conte-sinopsis"><?php echo $pelicula->SIGNOSIS; ?></p>
                  </div>
                       
           </div>
     </div>
 </div>  












  </body>
  <?php  include 'vistas1/footer.php' ?>