   
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

<head>
<script  src="boletos.php">   </script>
</head>
<body>


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
           
                <div class="card-header bg-primary  text-center" style="color:white"> <STRONG>SUBTOTAL:  </STRONG></div>
                   <div class="card-body text-primary">
                       <h2 class=" text-center"><input  style="max-width: 8rem;" class="subtotal" class="bg-light"  type='text' id="subto" readonly value="<?php echo $pelicula->PRECIO* 5;?>.00">  </input></h2>
                      
                       <p  class="card-text text-center" style="color:black">IVA INCLUIDO</p>
                   </div>
                       
            </div>
      </div>
   </div>
         






    <div class="container">
   
<div class="card border-success mb-3"     style="max-width: 100rem;">
  <div class="card-body">
      


                                <div align="center" style="width:960px; margin: 0 auto;">

                                    
                                    <div id="matriz" style="margin:10px 0px">
                                        <div class="row" style="width:100%;">
                                            <div class="col-xs-1">A</div>
                                            <div class="col-xs-11">
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1 asiento"><label>A1</label></div>
                                                    <div class="col-xs-1 asiento"><label>A2</label></div>
                                                    <div class="col-xs-1 asiento"><label>A3</label></div>
                                                    <div class="col-xs-1 asiento"><label>A4</label></div>
                                                    <div class="col-xs-1 asiento"><label>A5</label></div>
                                                    <div class="col-xs-1 asiento"><label>A6</label></div>
                                                    <div class="col-xs-1 asiento"><label>A7</label></div>
                                                    <div class="col-xs-1 asiento"><label>A8</label></div>
                                                    <div class="col-xs-1 asiento"><label>A9</label></div>
                                                    <div class="col-xs-1 asiento"><label>A10</label></div>
                                                    <div class="col-xs-1 asiento"><label>A11</label></div>
                                                    <div class="col-xs-1 asiento"><label>A12</label></div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1 asiento"><label>A13</label></div>
                                                    <div class="col-xs-1 asiento"><label>A14</label></div>
                                                    <div class="col-xs-1 asiento"><label>A15</label></div>
                                                    <div class="col-xs-1 asiento"><label>A16</label></div>
                                                    <div class="col-xs-1 asiento"><label>A17</label></div>
                                                    <div class="col-xs-1 asiento"><label>A18</label></div>
                                                    <div class="col-xs-1 asiento"><label>A19</label></div>
                                                    <div class="col-xs-1 asiento"><label>A20</label></div>
                                                    <div class="col-xs-1 asiento"><label>A21</label></div>
                                                    <div class="col-xs-1 asiento"><label>A22</label></div>
                                                    <div class="col-xs-1 asiento"><label>A23</label></div>
                                                    <div class="col-xs-1 asiento"><label>A24</label></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row" style="width:100%;">
                                            <div class="col-xs-1">A</div>
                                            <div class="col-xs-11">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <div class="col-xs-6">
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row" style="width:100%;">
                                            <div class="col-xs-1"></div>
                                            <div class="col-xs-11 num-columna">
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1">1</div>
                                                    <div class="col-xs-1">2</div>
                                                    <div class="col-xs-1">3</div>
                                                    <div class="col-xs-1">4</div>
                                                    <div class="col-xs-1">5</div>
                                                    <div class="col-xs-1">6</div>
                                                    <div class="col-xs-1">7</div>
                                                    <div class="col-xs-1">8</div>
                                                    <div class="col-xs-1">9</div>
                                                    <div class="col-xs-1">10</div>
                                                    <div class="col-xs-1">11</div>
                                                    <div class="col-xs-1">12</div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1">13</div>
                                                    <div class="col-xs-1">14</div>
                                                    <div class="col-xs-1">15</div>
                                                    <div class="col-xs-1">16</div>
                                                    <div class="col-xs-1">17</div>
                                                    <div class="col-xs-1">18</div>
                                                    <div class="col-xs-1">19</div>
                                                    <div class="col-xs-1">20</div>
                                                    <div class="col-xs-1">21</div>
                                                    <div class="col-xs-1">22</div>
                                                    <div class="col-xs-1">23</div>
                                                    <div class="col-xs-1">24</div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div align="center" style="width:960px; margin: 0 auto;">

                                    
                                    <div id="matriz" style="margin:10px 0px">
                                        <div class="row" style="width:100%;">
                                            <div class="col-xs-1">A</div>
                                            <div class="col-xs-11">
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1 asiento"><label>A1</label></div>
                                                    <div class="col-xs-1 asiento"><label>A2</label></div>
                                                    <div class="col-xs-1 asiento"><label>A3</label></div>
                                                    <div class="col-xs-1 asiento"><label>A4</label></div>
                                                    <div class="col-xs-1 asiento"><label>A5</label></div>
                                                    <div class="col-xs-1 asiento"><label>A6</label></div>
                                                    <div class="col-xs-1 asiento"><label>A7</label></div>
                                                    <div class="col-xs-1 asiento"><label>A8</label></div>
                                                    <div class="col-xs-1 asiento"><label>A9</label></div>
                                                    <div class="col-xs-1 asiento"><label>A10</label></div>
                                                    <div class="col-xs-1 asiento"><label>A11</label></div>
                                                    <div class="col-xs-1 asiento"><label>A12</label></div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1 asiento"><label>A13</label></div>
                                                    <div class="col-xs-1 asiento"><label>A14</label></div>
                                                    <div class="col-xs-1 asiento"><label>A15</label></div>
                                                    <div class="col-xs-1 asiento"><label>A16</label></div>
                                                    <div class="col-xs-1 asiento"><label>A17</label></div>
                                                    <div class="col-xs-1 asiento"><label>A18</label></div>
                                                    <div class="col-xs-1 asiento"><label>A19</label></div>
                                                    <div class="col-xs-1 asiento"><label>A20</label></div>
                                                    <div class="col-xs-1 asiento"><label>A21</label></div>
                                                    <div class="col-xs-1 asiento"><label>A22</label></div>
                                                    <div class="col-xs-1 asiento"><label>A23</label></div>
                                                    <div class="col-xs-1 asiento"><label>A24</label></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row" style="width:100%;">
                                            <div class="col-xs-1">A</div>
                                            <div class="col-xs-11">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <div class="col-xs-6">
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row" style="width:100%;">
                                            <div class="col-xs-1"></div>
                                            <div class="col-xs-11 num-columna">
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1">1</div>
                                                    <div class="col-xs-1">2</div>
                                                    <div class="col-xs-1">3</div>
                                                    <div class="col-xs-1">4</div>
                                                    <div class="col-xs-1">5</div>
                                                    <div class="col-xs-1">6</div>
                                                    <div class="col-xs-1">7</div>
                                                    <div class="col-xs-1">8</div>
                                                    <div class="col-xs-1">9</div>
                                                    <div class="col-xs-1">10</div>
                                                    <div class="col-xs-1">11</div>
                                                    <div class="col-xs-1">12</div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1">13</div>
                                                    <div class="col-xs-1">14</div>
                                                    <div class="col-xs-1">15</div>
                                                    <div class="col-xs-1">16</div>
                                                    <div class="col-xs-1">17</div>
                                                    <div class="col-xs-1">18</div>
                                                    <div class="col-xs-1">19</div>
                                                    <div class="col-xs-1">20</div>
                                                    <div class="col-xs-1">21</div>
                                                    <div class="col-xs-1">22</div>
                                                    <div class="col-xs-1">23</div>
                                                    <div class="col-xs-1">24</div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div align="center" style="width:960px; margin: 0 auto;">

                                    
                                    <div id="matriz" style="margin:10px 0px">
                                        <div class="row" style="width:100%;">
                                            <div class="col-xs-1">A</div>
                                            <div class="col-xs-11">
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1 asiento"><label>A1</label></div>
                                                    <div class="col-xs-1 asiento"><label>A2</label></div>
                                                    <div class="col-xs-1 asiento"><label>A3</label></div>
                                                    <div class="col-xs-1 asiento"><label>A4</label></div>
                                                    <div class="col-xs-1 asiento"><label>A5</label></div>
                                                    <div class="col-xs-1 asiento"><label>A6</label></div>
                                                    <div class="col-xs-1 asiento"><label>A7</label></div>
                                                    <div class="col-xs-1 asiento"><label>A8</label></div>
                                                    <div class="col-xs-1 asiento"><label>A9</label></div>
                                                    <div class="col-xs-1 asiento"><label>A10</label></div>
                                                    <div class="col-xs-1 asiento"><label>A11</label></div>
                                                    <div class="col-xs-1 asiento"><label>A12</label></div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1 asiento"><label>A13</label></div>
                                                    <div class="col-xs-1 asiento"><label>A14</label></div>
                                                    <div class="col-xs-1 asiento"><label>A15</label></div>
                                                    <div class="col-xs-1 asiento"><label>A16</label></div>
                                                    <div class="col-xs-1 asiento"><label>A17</label></div>
                                                    <div class="col-xs-1 asiento"><label>A18</label></div>
                                                    <div class="col-xs-1 asiento"><label>A19</label></div>
                                                    <div class="col-xs-1 asiento"><label>A20</label></div>
                                                    <div class="col-xs-1 asiento"><label>A21</label></div>
                                                    <div class="col-xs-1 asiento"><label>A22</label></div>
                                                    <div class="col-xs-1 asiento"><label>A23</label></div>
                                                    <div class="col-xs-1 asiento"><label>A24</label></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row" style="width:100%;">
                                            <div class="col-xs-1">A</div>
                                            <div class="col-xs-11">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <div class="col-xs-6">
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                        <label class="btn btn-success asiento2"><input type="checkbox">B1</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row" style="width:100%;">
                                            <div class="col-xs-1"></div>
                                            <div class="col-xs-11 num-columna">
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1">1</div>
                                                    <div class="col-xs-1">2</div>
                                                    <div class="col-xs-1">3</div>
                                                    <div class="col-xs-1">4</div>
                                                    <div class="col-xs-1">5</div>
                                                    <div class="col-xs-1">6</div>
                                                    <div class="col-xs-1">7</div>
                                                    <div class="col-xs-1">8</div>
                                                    <div class="col-xs-1">9</div>
                                                    <div class="col-xs-1">10</div>
                                                    <div class="col-xs-1">11</div>
                                                    <div class="col-xs-1">12</div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="col-xs-1">13</div>
                                                    <div class="col-xs-1">14</div>
                                                    <div class="col-xs-1">15</div>
                                                    <div class="col-xs-1">16</div>
                                                    <div class="col-xs-1">17</div>
                                                    <div class="col-xs-1">18</div>
                                                    <div class="col-xs-1">19</div>
                                                    <div class="col-xs-1">20</div>
                                                    <div class="col-xs-1">21</div>
                                                    <div class="col-xs-1">22</div>
                                                    <div class="col-xs-1">23</div>
                                                    <div class="col-xs-1">24</div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
 
                    <div class="d-grid gap-2 col-2 mx-auto pt-5">
            <button class="btn btn-primary" type="button"> <a id="enlace"<a id="enlace" class= "hora" href="compra.php?ID=<?php echo $pelicula->ID_CARTELERA?>">Haz tu pago
             <i class="fas fa-arrow-alt-circle-right"></i></a> </button>
</div>
         </div>
       <div>  
</div>
<div>

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    


<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/asientos.css" />
