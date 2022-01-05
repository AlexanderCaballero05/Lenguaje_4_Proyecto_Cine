<?php

session_start();



$usuario = $_POST["usuario"];
			
$password = $_POST["password"];

$_SESSION['password'] = $password;



require ("conexion_bd.php");
            
$conexion=mysqli_connect($db_host, $db_usuario, $db_contra);

if(mysqli_connect_errno()){
echo "Fallo al conectar con la BBDD";
exit();
}

mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");

mysqli_set_charset($conexion, "utf8");

$consulta = "SELECT ID_USUARIO ,CLAVE,USUARIO,  PERFIL  FROM PerfilUsuario WHERE USUARIO = ? AND CLAVE = ?";
			
echo "<br><br>";        

   
 $resultados=mysqli_prepare($conexion,$consulta);
 
 $ok=mysqli_stmt_bind_param($resultados, 'ss', $usuario, $password);
      
 $ok=mysqli_stmt_execute($resultados);
 
 if($ok==false){
   
   echo "Error en la consulta";
   
 } else{

  $ok=mysqli_stmt_bind_result($resultados,$ID_USUARIO,$usuario,$password, $perfil);   
     
    }

   while(mysqli_stmt_fetch($resultados)){    
    $_SESSION['password'] = $password;
    $_SESSION['ID_USUARIO'] = $ID_USUARIO;
   
  }
  
  if($perfil=="administra"){

   echo "<script> 
   alert('!Bienvenido Administrador $password se ha logeado exitosamente¡');
   window.location='../archivo.php'
   </script>";  


    
  }elseif($perfil=="usuario") { 
    $_SESSION['password'] = $password;

 echo "<script> 
 alert('!Bienvenido $perfil $password al Sitio web cinemaHn se ha logeado exitosamente¡');
     window.location='../sistema/inicio.php'
     </script>";
    
  }else{

    echo "<script> 
    alert('!Error en la autenticacion¡');
    window.location= '../formulario.php'
    </script>";

  }

 
 
mysqli_stmt_close($resultados);
mysqli_close($conexion);
      
  ?>
  

