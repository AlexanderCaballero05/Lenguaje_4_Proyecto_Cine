<?php  include 'vistas1/menu.php' ?>

<?php
if (!isset($_GET["ID"])) {
  exit();
}


$codigo = $_GET["ID"];
include '../model/conexion.php';

$sentencia = $bd->prepare("SELECT c.ID_CARTELERA, p.TITULO, c.HORA_INICIO, c.FECHA, c.PRECIO ,a.TIPO
from cartelera c, pelicula p , estado e , audio a
where c.ID_PELICULA = p.ID_PELICULA
and c.ID_AUDIO = a.ID
and p.ID_ESTADO = e.ID
and p.ID_ESTADO = 1
and c.ID_CARTELERA= ?");

$sentencia->execute([$codigo]);
$pelicula = $sentencia->fetch(PDO::FETCH_OBJ);

session_start();
 $canti = $pelicula->ID_CARTELERA;

$_SESSION['ID'] = $canti;

?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script  src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

<div class="container w-50 "  style="margin-top: 120px;  margin-bottom:200px" >

<h2  style="color: #0b5ba1;line-height: 130%; font-weight: 400; font-size: 1.5em;"  > <i class="fas fa-ticket-alt"></i> COMPRA TU BOLETOS</h2>
<P > Selecciona tus entradas. El valor se calculará luego de seleccionar las butacas</P>
<hr class="mb-3">

            



<div class=" card border-secondary pb-3"  >
  <div class="card-header border-secondary">
      <strong> SILLA GENERAL</strong>
    
  </div>
  <div class="card-body  ">

  <div class="row align-items-start">
    <div class="col">
   
            <div class="col ">
               
               <p> <strong>Pelicula:</strong> <?php echo $pelicula->TITULO;  ?> <?php echo $pelicula->TIPO;  ?></p>
               <p> <strong>Fecha:</strong> <?php echo $pelicula->FECHA;  ?> </p>
               <p> <strong>Hora:</strong> <?php echo $pelicula->HORA_INICIO;  ?>  </p>
            </div>
            <img src="img/asiento.jpg"  width="110" height="110"  class="img-fluid mx-3" >
    
    </div>

    <div class="col">
    <h6  style="color: #404040; font-family: 'Poppins', 'Arial, Helvetica', sans-serif;"  >  <img src="img/ticket.png"  width="30" height="30"  class="img-fluid mx-2" >BOLETO NORMAL</h6>
    <p class="pb" > <strong   style="color: #b5121c; font-family: 'Roboto Condensed', sans-serif;"> Valor: L <?php echo $pelicula->PRECIO;  ?>.00 </strong> + cargo por servicio </p>
    </div>
    <div class="col">
          
      <select class="form-select-sm  mb-3"  id="cantidad" > 
        <option style="color:red;"  selected>0</option>
         <option style="color:red;"  value="1">1</option>
         <option style="color:red;"  value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
         <option value="10">10</option>
      </select>

      <script  type="text/javascript" > 
      
      function proceso() { 
        var canti = document.getElementById('cantidad').value;
          
         if(canti == 0){
          swal('BOLETOS','!Debe ingresar una cantidad de boletos¡','error');
     

          }else{
            var cantidad = $('#cantidad').val();
           var pelicula = <?php echo $pelicula->ID_CARTELERA?>
  
        
            window.location.href = "pago.php?name=" + cantidad ;

          }

        

       
      

      
       }
   
       </script>

    

     

     

    

     
    
    </div>
  </div>

      

  </div>

  
  
</div>


     <div >
       <div >
       <span class  ="infor">
      Elige el número y tipo de entradas que deseas. En salas numeradas, los mejores lugares disponibles 
     se eligen de forma automática. Se puede comprar como máximo 10 boletos por transacción. 

      <span class="rojo">
      Recuerda que únicamente el titular de la tarjeta puede retirar las entradas presentando la tarjeta de crédito 
      o débito y la identificación oficial en la taquilla o arquilla de Cinema HN.
       </span>

       </span>

        </div>

      

    </div>
   
   <!--
    <button type="button" class="btn btn-primary btn-sm"> <a  href="Descripcion_cartelera.php?ID=<?php echo $pelicula->ID_CARTELERA?>" >REGRESAR</a></button>
   <button type="button" class="btn btn-secondary btn-sm"><a id="enlace" class= "hora" href="pago.php?ID=<?php echo $pelicula->ID_CARTELERA?>">CONTINUAR</a></button>
    -->
    <div class="d-grid gap-2 col-4 mx-auto pt-5">
        
        <button onclick="proceso();"  type="button" id="enviar" class="btn btn-primary"  > <a id="enlace" class= "hora" disabled >CONTINUAR</a>   </button>
       

     
        </div>

    <div>
   
      
 
       
  
 </div>

    

 




</div>

  


</body>

<footer>
<?php  include 'vistas1/footer.php' ?>
</footer>






