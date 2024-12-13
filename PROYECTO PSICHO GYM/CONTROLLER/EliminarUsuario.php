<?php
session_start();
require_once('../MODEL/UserModel.php');
if (!empty($_GET['id'])) {
    $id=$_GET['id'];
    $sql=new UserModel($_SESSION['Correo']);
    if ($sql->eliminarUsuario($id) == true) {
        echo '<script type="text/javascript">
        alert("Exito: Usuario Eliminado");   
        window.location.href="../View/admin/admin.php";  
        </script>';
    }else{
        echo '<script type="text/javascript">
        alert("Error: Usuario No Eliminado o inexistente");   
        window.location.href="../View/admin/admin.php";  
        </script>';

    }
}
?>