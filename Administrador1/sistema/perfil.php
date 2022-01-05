<?php  include 'vistas1/menu.php' ?>


<?php
if (!isset($_GET["ID_USUARIO"])) {
  exit();
}

$codigo = $_GET["ID_USUARIO"];
include '../model/conexion.php';
$sentencia = $bd->prepare("SELECT * FROM PerfilUsuario Where ID_USUARIO = ?");

$sentencia->execute([$codigo]);
$pelicula = $sentencia->fetch(PDO::FETCH_OBJ);
?>

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="..img/login.ico" >
    

    <title>Perfil Usuario</title>

    <!-- Custom fonts for this template-->
    <link href="../dasboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../dasboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>




 <body>
<br>
	<br>

	<div class="container">
      <div class="row">
      <form method="post" id="perfil">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
   
   
          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"><i class='glyphicon glyphicon-user'></i>Modificar Datos</font></center></h2>

            <div class="panel-body">
              <div class="row">
			  
          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"><i class='glyphicon glyphicon-user'></i>PERFIL</font></center></h2>

            <div class="panel-body">
              <div class="row">
			  
                <div class="col-md-3 col-lg-3 " align="center"> 
				<div id="load_img">
					
				</div>
				<br>				
					<div class="row">
  						<div class="col-md-12">
							<div class="form-group">
							</div>
						</div>
						
					</div>
				</div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td class='col-md-3'>Primer Nombre:</td>
                        <td><input type="text" class="form-control input-sm" name="nombre_apellido"  value="<?php echo $pelicula->PRIMER_NOMBRE;  ?>"  required></td>
                      </tr>
                      <tr>
                        <td>segundo Nombre:</td>
                        <td><input type="text" class="form-control input-sm" name="ocupacion" value="<?php echo $pelicula->PRIMER_APELLIDO;  ?>" required></td>
                      </tr>
                      <tr>
                        <td>Correo electronico:</td>
                        <td><input type="email" class="form-control input-sm" name="correo" value="<?php echo $pelicula->CORREO;  ?>" ></td>
                      </tr>
					  <tr>
                        <td>Telefono:</td>
                        <td><input type="text" class="form-control input-sm" required name="telefono" value="<?php echo $pelicula->TELEFONO;  ?>"></td>
                      </tr>

                      <tr>
                        <td>Edad:</td>
                        <td><input type="text" class="form-control input-sm" required name="salario" value="<?php echo $pelicula->EDAD;  ?>"></td>
                      </tr>

					  <tr>
                        <td>Direccion</td>
                        <td><input type="text" class="form-control input-sm" required name="salario" value="<?php echo $pelicula->DIRECCION;  ?>"></td>

                      </tr>
					
                     
                    </tbody>
                  </table>
                  
                  
                </div>
				<div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
              </div>
            </div>
                 <div class="panel-footer text-center">
                    
                     
                 <button type="submit" class="btn btn-sm btn-success"> <a href="editarpefil.php?ID_USUARIO=<?php echo $_SESSION['ID_USUARIO']; ?>"> Actualizar perfil</a></button>

<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
                       
                       
                    </div>
            
          </div>
        </div>
		</form>
      </div>






    <!-- Bootstrap core JavaScript-->
    <script src="../dasboard/vendor/jquery/jquery.min.js"></script>
    <script src="../dasboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../dasboard/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../dasboard/js/sb-admin-2.min.js"></script>
    <?php  include 'vistas1/footer.php' ?>

   
</body>

</html>