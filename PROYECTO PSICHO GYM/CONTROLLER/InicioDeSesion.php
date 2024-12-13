<?php
  require_once('../MODEL/UserModel.php');
  require_once('../MODEL/UserSection.php');

  if (isset($_POST['submit'])) {
    $correoUserIN = $_POST['email'];
    $passwordUserIN = $_POST['password'];



try {
   // Instancia de UserModel con los parámetros necesarios
   $objUsuario = new UserModel($correoUserIN); 

   // Ejecuta la consulta para obtener los datos del usuario
   $consultaLogin = $objUsuario->consultaLogin(); 
   $idUser=$consultaLogin->ID_Cliente;
   $correoUserDB = $consultaLogin->email; 
   $passwordUserDB = $consultaLogin->clave; 
   $StateUserDB = $consultaLogin->StateUser; 
   $typeUserDB = $consultaLogin->rol; 


   if ($correoUserIN == $correoUserDB) {
    if ($passwordUserIN == $passwordUserDB) {
        $Seccion= new UserSection($correoUserDB,$typeUserDB,$idUser);

            if ($StateUserDB == 1) {
                if ($typeUserDB == 'admin') {
                      header ('location:../VIEW/indexx.php');
                } elseif ($typeUserDB == 'usuario') {
                    header ('location:../VIEW/indexx.php');
                }
            } else {
                echo '<script type="text/javascript">
                alert("ERROR: Estado Inactivo");   
                window.location.href="../View/Login.php";  
                </script>';
            }

    } else {
        echo '<script type="text/javascript">
        alert("ERROR: Contraseña incorrecta");   
        window.location.href="../View/Login.php";
        </script>'; 
    }
} else {
    echo '<script type="text/javascript">
    alert("ERROR: Usuario incorrecto");  
    window.location.href="../View/Login.php";    
    </script>'; 
}
} catch (\Throwable $error) {
   echo 'ERROR: '. $error->getMessage();  
   die(); 
}
}else{
    $Seccion= new UserSection($correoUserDB,$typeUserDB,$idUser);
    $Seccion -> CerrarSesion();
    echo '<script type="text/javascript">
        alert("Sesion Cerrada Con exito");   
        window.location.href="../view/indexx.php";  
    </script>';
}

?>
