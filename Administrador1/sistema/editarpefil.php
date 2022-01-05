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

//mostrar los datos
$ID = $_GET["ID_USUARIO"];
include 'model/conexion.php';
$sentencia = "SELECT * FROM PerfilUsuario Where ID_USUARIO = '$ID'";
$modificar = $bd->query($sentencia);
$pelicula = $modificar->fetch(PDO::FETCH_OBJ);


//modificar perfil

if (isset($_POST['editar'])) {

$ID_USUARIO = $_POST['ID_USUARIO'];
$nombre  = $_POST['PRIMER_NOMBRE'];
$apellido  = $_POST['PRIMER_APELLIDO'];
$telefono  = $_POST['TELEFONO'];
$direccion  = $_POST['DIRECCION'];

$sql = "UPDATE PerfilUsuario SET PRIMER_NOMBRE ='$nombre', PRIMER_APELLIDO ='$apellido', TELEFONO='$telefono', DIRECCION='$direccion' WHERE ID_USUARIO = '$ID_USUARIO' ";

$resultado = $bd->query($sql);

    echo "<script> 
    alert('! Datos Modificados ¡');
    </script>";  


}
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
                <div class=" col-md-5 col-lg-5 "> 
                  <table class="table table-condensed">
                    <tbody>
                    <input type="hidden" class="form-control input-sm" name="ID_USUARIO"  value="<?php echo $pelicula->ID_USUARIO;  ?>">
                      <tr>
                        <td class='col-md-2'>Primer Nombre:</td>
                        <td><input type="text" class="form-control input-sm" name="PRIMER_NOMBRE"  value="<?php echo $pelicula->PRIMER_NOMBRE;  ?>"  required></td>
                      </tr>
                      <tr>
                        <td>Apellido:</td>
                        <td><input type="text" class="form-control input-sm" name="PRIMER_APELLIDO" value="<?php echo $pelicula->PRIMER_APELLIDO;  ?>" required></td>
                      </tr>
                    
					            <tr>
                        <td>Telefono:</td>
                        <td><input type="text" class="form-control input-sm" required name="TELEFONO" value="<?php echo $pelicula->TELEFONO;  ?>"></td>
                      </tr>

					            <tr>
                        <td>Direccion</td>
                        <td><input type="text" class="form-control input-sm" required name="DIRECCION" value="<?php echo $pelicula->DIRECCION;  ?>"></td>

                      </tr>
					
                     
                    </tbody>
                  </table>
                  
                  
                </div>
				<div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
              </div>
            </div>
                 <div class="panel-footer text-center">
                    
                     
                 <input type="submit"  name="editar" value="Modificar" class="btn btn-sm btn-success">


                       
                       
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

   
</body>

</html>