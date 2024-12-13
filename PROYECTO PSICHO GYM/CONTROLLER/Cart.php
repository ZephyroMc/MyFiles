<?php
session_start();

// aqui empieza el carrito
if (isset($_SESSION['carrito']) || isset($_POST['Nombre'])) {
    if (isset($_SESSION['carrito'])) {
        $carrito_mio = $_SESSION['carrito'];
        if (isset($_POST['Nombre'])) {
            $titulo = $_POST['Nombre'];
            $precio = $_POST['Precio_Venta'];
            $cantidad = $_POST['cantidad'];
            $ref = $_POST['ruta'];
            $donde = -1;
            $ID_Producto=$_POST['Id_producto'];

            if ($donde != -1) {
                $cuanto = $carrito_mio[$donde]['cantidad'] + $cantidad;
                $carrito_mio[$donde] = array("titulo" => $titulo, "precio" => $precio, "cantidad" => $cuanto, "ref" => $ref,"ID_producto" => $ID_Producto);
            } else {
                $carrito_mio[] = array("titulo" => $titulo, "precio" => $precio, "cantidad" => $cantidad, "ref" => $ref,"ID_producto" => $ID_Producto);
            }
        }
    } else {
        $titulo = $_POST['Nombre'];
        $precio = $_POST['Precio_Venta'];
        $cantidad = $_POST['cantidad'];
        $ref = $_POST['ruta'];
        $ID_Producto=$_POST['Id_producto'];
        $carrito_mio[] = array("titulo" => $titulo, "precio" => $precio, "cantidad" => $cantidad, "ref" => $ref,"ID_producto" => $ID_Producto);
    }

    $_SESSION['carrito'] = $carrito_mio;
}

header("Location: " . $_SERVER['HTTP_REFERER'] . "");
