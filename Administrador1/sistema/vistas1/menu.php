<?php
session_start();
?>
<!doctype html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="ico.ico" >
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>

    
    <link href="css/stilo.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CINEMA HN</title>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top  mb-3" id="mainNav">
            <div class="container px-2">
                <a class="navbar-brand"><img src="img/logo.png" width="200" height=""> </a>
                <form class="d-flex">
                    
                <button class="btn btn-primary btn-lg btn btn-info me-md-2" type="button"> <a id="ab" href="inicio.php"> Estrenos</a> </button>
              <button class="btn btn-primary btn-lg btn-warning me-md-2" type="button"> <a id="ab" href="cartelera1.php"> Cartelera</a> </button>


<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-2">
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
           <!-- <img class="img-profile rounded-circle"
                src="../dasboard/img/undraw_profile.svg"> -->
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


                    
                </form>
                
                
            </div>
</nav>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>




</nav>

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
                    <a class="btn btn-primary" href="../formulario.php">Cerrar sesión</a>
                    
                </div>
            </div>
        </div>
    </div>




<html>