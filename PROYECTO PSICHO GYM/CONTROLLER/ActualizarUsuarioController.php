<?php
require_once('../MODEL/UserModel.php');

if (isset($_POST['btnActualizar'])) {
  
    $id=$_POST['id'];
    $userNameIN = $_POST['nombre'];
    $ApellidoIN = $_POST['apellido'];
    $DireccionIN = $_POST['Direccion'];
    $telefonoIN = $_POST['telefono'];
    $correoUserIN = $_POST['email'];
    $passwordUseriN = $_POST['clave'];
    $RolIN = $_POST['Rol'];
    $EstadoIN = $_POST['Estado'];
    
    $objUsuario = new UserModel($correoUserIN);
    if(!empty($userNameIN) and !empty($ApellidoIN) and !empty($DireccionIN) and !empty($telefonoIN) and !empty($correoUserIN) and !empty($passwordUseriN)){
      $existe = $objUsuario->ActualizarDatos($id,$userNameIN, $ApellidoIN, $DireccionIN, $telefonoIN, $correoUserIN, $passwordUseriN, $RolIN, $EstadoIN);

              echo '<script type="text/javascript">
     window.location.href="../View/Admin/admin.php";
        alert("Actualizado Correctamente!!");    
          </script>'; 
    }
    else{
      echo '<script type="text/javascript">
      window.location.href="../View/Admin/admin.php";
         alert("Campos Vacios!!");    
           </script>';
    }
  
}
?>