
<?php  include 'vistas1/menu.php' ?>



<?php
session_start();

$codigo = $_SESSION["ID"];
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

?>

<?php  include 'vistas1/menu.php' ?>

   <head>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>

<body>
<div class="container w-50 px-2"  style="margin-top: 120px;  margin-bottom:200px; " >
    
        <h2  style="color: #0b5ba1;line-height: 130%; font-weight: 400; font-size: 1.5em;"  > <i class="fa fa-credit-card" ></i> CONFIRMACIÓN Y PAGO  </h2>
        <P class="pb-3"> Llena tus datos como aparecen en tu tarjeta</P>
        <hr class="mb-4">


       <!--contendeor de total -->
        <div class="card  mb-5" >
            <div class="card-header  text-white bg-dark mb-3"  >
            DETALLE DE LA COMPRA
            </div>
           <div class="card-body">
               <div class="container mt-3  ">
                     <div class="row align-items-start">
                           <div class="col ">
                               <p> <strong>Cine:</strong> CINEMA HN</p>
                               <p> <strong>Pelicula:</strong> <?php echo $pelicula->TITULO;  ?> <?php echo $pelicula->TIPO;  ?></p>
                                <p> <strong>Fecha:</strong> <?php echo $pelicula->FECHA;  ?> </p>
                                 <p> <strong>Hora:</strong> <?php echo $pelicula->HORA_INICIO;  ?>  </p>
                            </div>

                            <div class="col">
                              <p class="letras"> Boletos  </p>

                              <?php
                                 $precio = $pelicula->PRECIO;
                                 $boleto = $_GET['name'];
                                 $total = ($precio * $boleto) +20 ;
                                 $subtotal = $precio * $boleto;
                               ?>

                                 <?php
                                  include_once '../crud/conexion.php';
                                  $objeto = new Conexion();
                                  $conexion = $objeto->Conectar();
 
 
                                   $consulta = "INSERT INTO factura (ID_CARTELERA, CLIENTE , CAN_BOLETO, SUBTOTAL, CARGO, TOTAL, FECHA) VALUES('$codigo','Paola Caballero', '$boleto', '$subtotal', 20.00,'$total', CURDATE()) ";			
                                   $resultado = $conexion->prepare($consulta);
                                   $resultado->execute()
                                  ?>

                               <p><strong>Cantidad boletos:</strong> <?php echo  $boleto; ?></p>
                               <p><strong>Subtotal:</strong> L.<?php echo  $subtotal;?>.00</p>
                               <p>Cargo por servicio: L.20 </p>
                             
                              
                               
                            </div>

                            <div class="col px-0">
                               <div class="card text-dark  text-end " style="max-width: 10rem;" >
                                  <div class="card-header bg-primary  text-center" style="color:white"> <STRONG>TOTAL: </STRONG></div>
                                  <div class="card-body text-primary">
                                      <h3 class=" text-center"><input  style="max-width: 8rem;" class="subtotal" class="bg-light"  type='text' id="subto" readonly value="L.<?php echo $total;?>"> </input></h3>
                                       <p  class="card-text text-center" style="color:black">IVA INCLUIDO</p>
                                  </div>
                                </div>
                           </div>
                     </div>   
                </div>
              

                <!--FIN DEL CARD BODY -->
            </div>
            <!-- FIN DEL CARD PRINCIPAL-->
        </div>

        <span class  ="infor">
         <p>
         Por favor revise la película, fecha, hora de la función y que la información de las entradas.
        </p>
        <span class="rojo">
          Recuerda que únicamente el titular de la tarjeta puede retirar las entradas presentando la tarjeta de crédito 
           o débito y la identificación oficial en la taquilla  de Cinema HN.
       </span>
          <p>
          Por favor ingrese el detalle del pago, verifique dos veces que la información de su tarjeta es correcta.Las entradas compradas a través de este sitio son compras en firme, por tanto no son reembolsables por dinero.
         
         </p>
       </span>

       



       <P class="pb-2"> REALICE SU PAGO</P>

        <div class="card border-secondary mb-3" style="max-width: 25rem;"    >
            
            <div class=" text-center card border-danger mx-5 mt-2" style="width: 11rem; ">
              <div class="card-body">
              <img src="img/icon-credito.png" class="text-center">
              <h6 class="card-title">CRÉDITO / DÉBITO</h6>
            </div>
             </div>


             <div class="card-body">
                <form>
                <div class="form-row">
                    <div class="form-group col-md-9">
                    <label for="inputEmail4">Nombre</label>
                    <p></p>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Nombre" required >
                    </div>
                    <p></p>
                    <div class="form-group col-md-10">
                    <label for="inputPassword4">Numero tarjeta</label>
                    <p></p>
                    <input type="number" class="form-control" id="inputPassword4" placeholder="tarjeta" required >
                    </div>
                </div>
              
                <div class="form-row">
                    <div class="form-group col-md-5">
                       <div class="input-group mb-3"> 

                                <label for="inputCity">Fecha vencimiento</label>
                                <input type="number" min="1" max="12" class="form-control" id="MMM" Placeholder="MM" required  > 
                                <input type="number" min="2019" max="2030" class="form-control" id="YYY" Placeholder="YYYY" required  >

                               
                        </div>
                        <div class="col-sm-6">
                                        <label for="inputZip">CCV</label>
                                        <input type="number" pattern="[0-9]" size="4"   class="form-control" id="CCV" required >
                                </div>
                    </div>
                    
                </div>

                
                <div class="form-group">
                    <div class="form-check">
                
                    </div>
                </div>
                
            </form>
             </div>

             <script  type="text/javascript"> 
                     function verificar() { 
                        var nombre = document.getElementById('inputEmail4').value;
                        var numero = document.getElementById('inputPassword4').value;
                        var mmm = document.getElementById('MMM').value;
                        var yyy = document.getElementById('YYY').value;
                        var ccv = document.getElementById('CCV').value;
                       
                  
                          if(nombre == ""){
                            swal('PAGOS','!Datos incorrectos¡','error');
                            
                          }
                          else if(numero == 0 ){
                            swal('PAGOS','!Datos incorrectos','error');
                            

                          }
                          else if(mmm == 0){
                            swal('PAGOS','!Datos incorrectos¡','error');
                            
                            

                          }
                          else if(yyy == 0 ){
                            swal('PAGOS','!Datos incorrectos¡','error');
                            

                          }
                          else if(ccv == 0){
                            swal('PAGOS','!Datos incorrectos','error');
                            

                          }
                           

                        }

               </script>
                     

            


              




        </div>
    
        <div class="form-check mb-5">
          <input class="form-check-input" type="checkbox" value="" id="check" >
           <label class="form-check-label" for="flexCheckChecked">
           He leído y acepto los términos y condiciones, así como la política de privacidad del sitio web.
         </label>
        </div>
    
        <div class="d-grid gap-2 col-4 mx-auto pt-5">
            <button onclick="verificar();"  class="btn btn-primary" type="button"> <a id="enlace" class= "hora"  href="reporte.php"; >PAGAR AHORA</a> </button>
  
         </div>


    </div><!-- DIV DEL PRINCIPAL -->


   


</body>





<?php  include 'vistas1/footer.php' ?>