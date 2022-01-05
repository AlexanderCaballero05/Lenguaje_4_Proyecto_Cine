<?php  include 'vistas1/menu.php' ?>
<?php
if (!isset($_GET["ID"])) {
  exit();
}


$codigo = $_GET["ID"];
include '../model/conexion.php';


$sentencia = $bd->prepare("select c.ID_CARTELERA, p.TITULO, c.HORA_INICIO, c.FECHA, c.PRECIO ,a.TIPO , sa.TIPO As sala1
from cartelera c, pelicula p , estado e , audio a , sala sa
where c.ID_PELICULA = p.ID_PELICULA
and c.ID_AUDIO = a.ID
and p.ID_ESTADO = e.ID
and c.ID_SALA = sa.ID
and p.ID_ESTADO = 1
and c.ID_CARTELERA= ?");

$sentencia->execute([$codigo]);
$pelicula = $sentencia->fetch(PDO::FETCH_OBJ);

?>


<div class="container w-50 mb-5 ;" style="margin-top: 120px">

    <h2  style="color: #0b5ba1;line-height: 130%; font-weight: 400; font-size: 1.5em;"  > <i class="fas fa-ticket-alt"></i> COMPRA TU BOLETOS</h2>
  <div class="container mt-3  ">
       <div class="row align-items-start">

       <div class="col ">
               <p class="letras" >Cine: Cimenahn</p>
               <p> <strong>Pelicula:</strong> <?php echo $pelicula->TITULO;  ?> <?php echo $pelicula->TIPO;  ?></p>
               <p> <strong>Fecha:</strong> <?php echo $pelicula->FECHA;  ?> </p>
               <p> <strong>Hora:</strong> <?php echo $pelicula->HORA_INICIO;  ?>  </p>
               <p> <strong>Sala:</strong> <?php echo $pelicula->sala1;  ?>  </p>
            </div>

           <div class="col">
                <p class="letras" > Boletos  </p>
            </div>

          <div class="col px-0">

           <div class="card text-dark  text-end " style="max-width: 11rem;" >
                <div class="card-header bg-primary  text-center" style="color:white"> <STRONG>SUBTOTAL: </STRONG></div>
                   <div class="card-body text-primary">
                       <h2 class=" text-center"><input  style="max-width: 8rem;" class="subtotal" class="bg-light"  type='text' id="subto" readonly value="<?php echo $pelicula->PRECIO* 5;?>.00"> </input></h2>
                      
                       <p  class="card-text text-center" style="color:black">IVA INCLUIDO</p>
                   </div>
            </div>
      </div>
   </div>
         

</div>


<div class="container">
     <span class  ="infor">
         <p>
         Por favor revise la película, fecha, hora de la función y que la información de las entradas listada arriba es correcta.
        </p>
        <span class="rojo">
      Recuerda que únicamente el titular de la tarjeta puede retirar las entradas presentando la tarjeta de crédito 
      o débito y la identificación oficial en la taquilla o arquilla de Cinema HN.
       </span>
       <p>
       Por favor ingrese el detalle del pago, verifique dos veces que la información de su tarjeta es correcta, y dé clic en el botón de CONFIRMAR ORDEN que está abajo para procesar su transacción. 
       Las entradas compradas a través de este sitio son compras en firme, por tanto no son reembolsables por dinero. El límite para recoger las entradas es el término de la función. Si las entradas no son retiradas después del término de la función el cliente podrá solicitar
        en taquilla cupones equivalentes al número de entradas adquiridas dentro de los 15 días naturales posteriores a la compra. 
       Posterior a esa fecha, no se aceptarán reclamos o reembolsos en ningún caso
      </p>


     </span>
     
   


</div>

<div class="container w-50 mb-5 ">
    <div class="card text-center" style="width: 12rem; ">
     <div class="card-body">
         <img src="img/icon-credito.png" class="text-center">
       <h6 class="card-title">CRÉDITO / DÉBITO</h6>
       
   
    
     </div>
    </div>




     <form>
         <h3 class="opciones"> Opciones de confirmación</h3>
         Correo electrónico:	 <input class="mb-2" > </input>
         <br>
         Nombre del tarjetahabiente:<input class="mb-2"> </input>

    </form>
      
    



    </div>

          <div class="d-grid gap-2 col-4 mx-auto pt-5">
            <button class="btn btn-primary" type="button"> <a id="enlace" href="PagoTarjeta.php">Confirma tu compra
             <i class="fas fa-arrow-alt-circle-right"></i></a> </button>
  
         </div>

         
</div>         

