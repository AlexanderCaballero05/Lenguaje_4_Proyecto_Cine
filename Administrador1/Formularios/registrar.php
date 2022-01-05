<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="..img/login.ico" >
    

    <title>Registrar Usuario</title>

    <!-- Custom fonts for this template-->
    <link href="../dasboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../dasboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h2>Create una cuenta en CINEMA HN</h2>
                            </div>
                            <form class="user" action ="conectar_query_admi.php" method ="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"  name="nombre1"
                                            placeholder="Primer nombre" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"  name="nombre2" 
                                            placeholder="Segundo Nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"  name="apellido1"
                                            placeholder="Primer apellido" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="apellido2"
                                            placeholder="Segundo Apellido">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"  name="email"
                                        placeholder="Correo electronico" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" min="1" pattern="^[0-9]+" name="edad"
                                             placeholder="Edad" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="tel" class="form-control form-control-user" name="telefono"
                                             placeholder="Telefono" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="direccion" 
                                        placeholder="Dirección" required>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select name="sexo" class="form-control " required >
                                        <option selected> Selecione un genero</option>
                                        <option>Masculino</option>
                                       <option>Femenino</option>
                                        </select>
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <input  type="date"  class="form-control form-control-user" name="fec_cont"
                                            placeholder="Fecha cuempleaños" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="usuario"
                                            placeholder="Usuario" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="clave" 
                                            placeholder="Pasword" required>
                                    </div>
                                </div>


                               


                                <input type ="submit" name="registrarse" class="btn btn-primary btn-user btn-block" >
                                
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Perdio la?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="../formulario.php">¿Ya tiene una cuenta? inicie sesion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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