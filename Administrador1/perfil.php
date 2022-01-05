<?php
session_start();
?>



<?php
if (!isset($_GET["ID_USUARIO"])) {
  exit();
}

$codigo = $_GET["ID_USUARIO"];
include 'model/conexion.php';
$sentencia = $bd->prepare("SELECT * FROM PerfilUsuario Where ID_USUARIO = ?");

$sentencia->execute([$codigo]);
$pelicula = $sentencia->fetch(PDO::FETCH_OBJ);
?>






<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <title>Administrador</title>

    <!-- Custom fonts for this template-->
    <link href="dasboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="dasboard/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="dasboard/img/ico.ico" >


          <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="css_tablas/main.css">  

     <!--datables CSS básico-->
     <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"> 
      

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                   
                </div>
                <div class="sidebar-brand-text mx-3">CINEMA HN </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="archivo.php">
                <i class="fa fa-home" aria-hidden = "true"> </i>
                    <span>Administrador</span></a>
            </li>

         

            <!-- Nav Item - Pages Collapse Menu -->
           <!-- NAV DE ITEM DE FORMULARIO -->
           <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-tasks" aria-hidden ="true"> </i>
                    <span>Formularios</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tablas:</h6>
                        <a class="collapse-item" href="pelicula.php">Pelicula</a>
                        <a class="collapse-item" href="estado.php">Estado</a>
                        <a class="collapse-item" href="formato.php">Formatos</a>
                        <a class="collapse-item" href="Genero.php">Generos</a>
                        <a class="collapse-item" href="Sala.php">Sala</a>
                        <a class="collapse-item" href="audio.php">Audio</a>
                        <a class="collapse-item" href="clasificacion.php">Clasificación</a>
                        <a class="collapse-item" href="asiento.php">Asiento</a>
                        
                    </div>
                </div>
            </li>

           <!-- Nav Item - Utilities Collapse Menu -->
           <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class ="fa fa-shopping-basket" aria-hidden ="true"> </i>
                    <span>Cartelera</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <h6 class="collapse-header">Cartelera:</h6>
                        <a class="collapse-item" href="cartelera.php">Cartelera</a>
                        
                    </div>
                </div>
            </li>
           
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> bienvenido <?php echo $_SESSION['password']; ?></span>

                                <img class="img-profile rounded-circle"
                                    src="dasboard/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                              
                                                            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sesion
                                </a>
                                <a class="dropdown-item" href="perfil.php?ID_USUARIO=<?php echo $_SESSION['ID_USUARIO']; ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
             

       <div class="container caja">
        <div class="row">
            <div class="col-lg-6">
            <div class="table-responsive">        
                <table id="" class="table table-striped table-bordered table-condensed" style="width:100%" >
                <thead class="text-center">
                          <tr>
                          <form method="post" id="perfil">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 toppad" >
   
   
          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"><i class='glyphicon glyphicon-user'></i>PERFIL</font></center></h2>

            <div class="panel-body">
              <div class="row">
			  
                <div class="col-md-3 col-lg-3 " align="center"> 
				<div id="load_img">
				
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td class='col-md-3'>Nombres:</td>
                        <td><input type="text" class="form-control input-sm" name="nombre_apellido"  value="<?php echo $pelicula->PRIMER_NOMBRE;  ?> <?php echo $pelicula->SEGUNDO_NOMBRE;  ?>"  DISABLED></td>
                      </tr>
                      <tr>
                        <td>Apellidos:</td>
                        <td><input type="text" class="form-control input-sm" name="ocupacion" value="<?php echo $pelicula->PRIMER_APELLIDO;  ?> <?php echo $pelicula->SEGUNDO_APELLIDO;  ?>" DISABLED></td>
                      </tr>
                      <tr>
                        <td>Correo electronico:</td>
                        <td><input type="email" class="form-control input-sm" name="correo" value="<?php echo $pelicula->CORREO;  ?>"  DISABLED ></td>
                      </tr>
					  <tr>
                        <td>Telefono:</td>
                        <td><input type="text" class="form-control input-sm" required name="telefono" value="<?php echo $pelicula->TELEFONO;  ?>" DISABLED></td>
                      </tr>

                      <tr>
                        <td>Edad:</td>
                        <td><input type="text" class="form-control input-sm" required name="salario" value="<?php echo $pelicula->EDAD;  ?>" DISABLED></td>
                      </tr>

					  <tr>
                        <td>Direccion</td>
                        <td><input type="text" class="form-control input-sm" required name="salario" value="<?php echo $pelicula->DIRECCION;  ?>"  DISABLED></td>

                      </tr>
					
                     
                    </tbody>
                  </table>
                  
                  
                </div>
				<div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
              </div>
            </div>
                 <div class="panel-footer text-center">
                    
                <button type="submit" class="btn btn-sm btn-warning"> <a href="editarpefil.php?ID_USUARIO=<?php echo $_SESSION['ID_USUARIO']; ?>"> Actualizar perfil</a></button>

                       
                       
                    </div>
            
          </div>
        </div>
		</form>
      </div>



              


</div>
                          </tr>
                      </thead>
                      <tbody>                           
                      </tbody>        
                  </table>               
              </div>
              </div>
          </div>  
      </div>   
  
  <!--Modal para CRUD-->
 
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CINEMA HN 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="formulario.php">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>

    <script src="dasboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="dasboard/vendor/jquery/jquery.min.js"></script>
    

    <!-- Core plugin JavaScript-->
    <script src="dasboard/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/boostrap/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="dasboard/vendor/chart.js/Chart.min.js"></script>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    
    <script src="dasboard/js/bootstrap.min.js"></script> 
      
    <!-- datatables JS -->
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script> 
    <script type="text/javascript" src="js/main_usuario.js"></script> 

    

</body>






