<?php
include_once('../MODEL/ProductosModel.php');

//crear productos
if (isset($_POST['btnregistrar'])) {
    $Nombre = $_POST['Nombre'];
    $Marca = $_POST['Marca'];
    $Precio_Venta = $_POST['Precio_Venta'];
    $Precio_Compra = $_POST['Precio_Compra'];
    $Descripcion = $_POST['Descripcion'];
    $Stock = $_POST['Stock'];
    //validacion de imagen
    $foto = '';
    if (isset($_FILES['Imagen'])) {
        
        $file = $_FILES["Imagen"];
        $tipo = $file['type'];
        $NombreP = $file['name'];
        $size =$file['size'];
        $ruta_provicional = $file['tmp_name'];
        $carpeta = 'ASSETS/img/Productos/';
        

        // validaciones de tipo de archivos y comandos
        if (
            $tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != '
                image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'
        ) {
            echo '<script type="text/javascript">
            alert("Error, el archivo no es una imagen");   
            window.location.href="../View/admin/Productos.php";  
            </script>';
        } else if ($size > 3 * 1024 * 1024) {
            echo '<script type="text/javascript">
            alert("Error, el tamaño máximo permitido es un 3MB");   
            window.location.href="../View/admin/Productos.php";  
            </script>';

        }else{
            move_uploaded_file($ruta_provicional,'../ASSETS/img/Productos/'.$NombreP);
            $foto='ASSETS/img/Productos/'.$NombreP;
        }

    } else {
        echo '<script type="text/javascript">
            alert("Fallo: No fue posible subir la imagen");   
            window.location.href="../View/admin/Productos.php";  
            </script>';
    }
    //validacion De productos


    $Registrar = new Productos();
    if ($Registrar->RegistrarProducto($Nombre,    $Marca,    $Precio_Venta,    $Precio_Compra,    $Descripcion,    $Stock, $foto)) {
        echo '<script type="text/javascript">
            alert("Exito: Producto Creado");   
            window.location.href="../View/admin/Productos.php";  
            </script>';
    } else {
        echo '<script type="text/javascript">
            alert("Fallo: Producto No Fue Posible Crearlo");   
            window.location.href="../View/admin/Productos.php";  
            </script>';
    }
}


// actualizar producto

elseif (isset($_POST['btnActualizar'])) {
    $ID_Suplemento = $_POST['id'];
    $Nombre = $_POST['Nombre'];
    $Marca = $_POST['Marca'];
    $Precio_Venta = $_POST['Precio_Venta'];
    $Precio_Compra = $_POST['Precio_Compra'];
    $Descripcion = $_POST['Descripcion'];
    $Stock = $_POST['Stock'];

    $foto = '';
    if (isset($_FILES['Imagen'])) {
        
        $file = $_FILES["Imagen"];
        $tipo = $file['type'];
        $NombreP = $file['name'];
        $size =$file['size'];
        $ruta_provicional = $file['tmp_name'];
        $carpeta = 'ASSETS/img/Productos/';
        
        // validaciones de tipo de archivos y comandos
        if (
            $tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != '
                image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'
        ) {
            echo '<script type="text/javascript">
            alert("Error, el archivo no es una imagen");   
            window.location.href="../View/admin/Productos.php";  
            </script>';
        } else if ($size > 3 * 1024 * 1024) {
            echo '<script type="text/javascript">
            alert("Error, el tamaño máximo permitido es un 3MB");   
            window.location.href="../View/admin/Productos.php";  
            </script>';

        }else{
            move_uploaded_file($ruta_provicional,'../ASSETS/img/Productos/'.$NombreP);
            $foto='ASSETS/img/Productos/'.$NombreP;
        }

    }

    

    $actualizar = new Productos();
    if ($actualizar->ActualizarProductos($ID_Suplemento, $Nombre, $Marca, $Precio_Venta, $Precio_Compra, $Descripcion, $Stock, $foto)) {
        echo '<script type="text/javascript">
        alert("Exito: Producto actualizado");   
        window.location.href="../View/admin/Productos.php";  
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Fallo: Producto No Fue Posible Actualizarlo");   
        window.location.href="../View/admin/Productos.php";  
        </script>';
    }


} 
//editar productos
elseif (!empty($_GET['id'])) {
    

    $id = $_GET['id'];
    $sql = new Productos();
    if ($sql->eliminarProducto($id) == true) {
        echo '<script type="text/javascript">
            alert("Exito: Producto Eliminado");   
            window.location.href="../View/admin/productos.php";  
            </script>';
    } else {
        echo '<script type="text/javascript">
            alert("Error: Producto No Eliminado o inexistente");   
            window.location.href="../View/admin/productos.php";  
            </script>';
    }
}
