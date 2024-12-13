<?php
require_once('../MODEL/UserModel.php');
if (isset($_POST['Submit'])) {
  $correoUserIN = $_POST['email'];
  $userNameIN = $_POST['username'];
  $passwordUseriN = $_POST['password'];
  $objUsuario = new UserModel(null, $userNameIN, $correoUserIN, $passwordUseriN, null, null);
  $existe = $objUsuario->RegistroUsuario($userNameIN, '', '', 0, $correoUserIN, $passwordUseriN, 'usuario', 1);
  if ($existe == false) {
    echo '<script type="text/javascript">
                    alert("¡¡Usuario Ya existe!!");    
                    window.location.href="../View/registrar.php";
                      </script>';
  } else {
    echo '<script type="text/javascript">
        alert("¡¡Registrado Correctamente!!");    
        window.location.href="../View/indexx.php";
          </script>';
  }
} else if (isset($_POST['btnregistrar'])) {
  $userNameIN = $_POST['nombre'];
  $ApellidoIN = $_POST['apellido'];
  $DireccionIN = $_POST['Direccion'];
  $telefonoIN = $_POST['telefono'];
  $correoUserIN = $_POST['email'];
  $passwordUseriN = $_POST['clave'];
  $RolIN = $_POST['Rol'];
  $EstadoIN = $_POST['Estado'];


  $objUsuario = new UserModel($correoUserIN);
  $existe = $objUsuario->RegistroUsuario($userNameIN, $ApellidoIN, $DireccionIN, $telefonoIN, $correoUserIN, $passwordUseriN, $RolIN, $EstadoIN);
  if ($existe == false) {
    echo '<script type="text/javascript">
    window.location.href="../View/Admin/admin.php";
                  alert("¡¡Usuario Ya existe!!"); 
                    </script>';
  } else {
    echo '<script type="text/javascript">
   window.location.href="../View/Admin/admin.php";
      alert("¡¡Registrado Correctamente!!");    
        </script>';
  }
}
