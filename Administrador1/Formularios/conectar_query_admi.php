<?php
 require 'conexion_bd.php';

 $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);

if(mysqli_connect_errno()){
echo "Fallo al conectar con la BBDD";
exit();
}

mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");

mysqli_set_charset($conexion, "utf8");
   
  	$nombre1 = $_POST['nombre1'];
  	$nombre2 = $_POST['nombre2'];
  	$apellido1 = $_POST['apellido1'];
  	$apellido2 = $_POST['apellido2'];
  	$correo = $_POST['email'];
  	$edad = $_POST['edad'];
  	$telefono = $_POST['telefono'];
  	$direccion = $_POST['direccion'];
  	$sexo = $_POST['sexo'];
  	$clave = $_POST['clave'];
  	$usuario = $_POST['usuario'];
  	$fech_con = $_POST['fec_cont'];

    //Consulta para insertar los datos en la base de datos

  	$insertar ="INSERT INTO PerfilUsuario (PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, CORREO, EDAD, TELEFONO, DIRECCION, SEXO,CLAVE,USUARIO,FECHA_NACIMIENTO, perfil) VALUES('$nombre1','$nombre2','$apellido1','$apellido2','$correo','$edad','$telefono','$direccion','$sexo','$clave','$usuario','$fech_con', 'usuario')";
 

  	$verificacion_correo = mysqli_query($conexion,"SELECT * FROM PerfilUsuario WHERE CORREO = '$correo' " );
  	$verificacion_usuario = mysqli_query($conexion,"SELECT * FROM PerfilUsuario WHERE USUARIO = '$usuario' " );

  	if(mysqli_num_rows($verificacion_correo)>0){
		echo "<script> 
		alert('!El correo ya existe en la base de datos¡');
		window.location= 'registrar.php'
		</script>";
		exit;
  	}
  	if(mysqli_num_rows($verificacion_usuario)>0){
	  echo "<script> 
      alert('!El usuario ya existe en la base de datos,ingrese otro nombre de usario¡');
      window.location= 'registrar.php'
      </script>";
  	  exit;
  	}


  	$resultado = mysqli_query($conexion, $insertar);
  	if(!$resultado){
		echo "<script> 
		alert('!Usuario o contraseña incorrectos¡');
		window.location= 'registrar.php'
		</script>";
	    exit;
  	}
  	else{

		echo "<script> 
		alert('!Usuario  registrado exitosamente¡');
		window.location= '../formulario.php'
		</script>";
  	}

     //cerrar conexion
     mysqli_close($conexion);



?>


