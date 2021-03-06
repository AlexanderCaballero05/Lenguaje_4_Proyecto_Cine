<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="dasboard/img/login.ico" >
   
    <title>Logearse</title>

    <!-- Custom fonts for this template-->
    <link href="dasboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="dasboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¬°Bienvenido de nuevo!</h1>
                                    </div>


                                  

                         <form  action="Formularios/validar_login_adm.php" method ="post" CLASS="form-sesion">
                                <div class ="contenedor-input">
                                    <input class="form-control" type ="text" name ="usuario" placeholder="Usuario" class="input-g"required/>
                                    <p></p>
                                        <input class="form-control" type="password" name ="password" placeholder="Contrase√Īa" class="input-g"required/>
                                        <p></p>
                                           <input class="form-control col-md-5" type ="submit" value ="Entrar" class= "btn-logear"  />
                                </div>
                          </form>
                                    
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="Formularios/registrar.php">Registrese ingrese aqui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="dasboard/vendor/jquery/jquery.min.js"></script>
    <script src="dasboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="dasboard/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="dasboard/js/sb-admin-2.min.js"></script>

</body>

</html>