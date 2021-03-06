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
         Por favor revise la pel??cula, fecha, hora de la funci??n y que la informaci??n de las entradas listada arriba es correcta.
        </p>
        <span class="rojo">
      Recuerda que ??nicamente el titular de la tarjeta puede retirar las entradas presentando la tarjeta de cr??dito 
      o d??bito y la identificaci??n oficial en la taquilla o arquilla de Cinema HN.
       </span>
       <p>
       Por favor ingrese el detalle del pago, verifique dos veces que la informaci??n de su tarjeta es correcta, y d?? clic en el bot??n de CONFIRMAR ORDEN que est?? abajo para procesar su transacci??n. 
       Las entradas compradas a trav??s de este sitio son compras en firme, por tanto no son reembolsables por dinero. El l??mite para recoger las entradas es el t??rmino de la funci??n. Si las entradas no son retiradas despu??s del t??rmino de la funci??n el cliente podr?? solicitar
        en taquilla cupones equivalentes al n??mero de entradas adquiridas dentro de los 15 d??as naturales posteriores a la compra. 
       Posterior a esa fecha, no se aceptar??n reclamos o reembolsos en ning??n caso
      </p>


     </span>
     
   


</div>

<div class="container w-50 mb-5 ">
    <div class="card text-center" style="width: 12rem; ">
     <div class="card-body">
         <img src="img/icon-credito.png" class="text-center">
       <h6 class="card-title">CR??DITO / D??BITO</h6>
       
   
    
     </div>
    </div>




     <form>
         <h3 class="opciones"> Opciones de confirmaci??n</h3>
         Correo electr??nico:	 <input class="mb-2" > </input>
         <br>
         Nombre del tarjetahabiente:<input class="mb-2"> </input>

    </form>
      
    



    </div>

          <div class="d-grid gap-2 col-4 mx-auto pt-5">
            <button class="btn btn-primary" type="button"> <a id="enlace" href="PagoTarjeta.php">Confirma tu compra
             <i class="fas fa-arrow-alt-circle-right"></i></a> </button>
  
         </div>

         
</div>         

