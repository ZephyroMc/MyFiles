<?php
session_start();
include_once('../MODEL/UserModel.php');
include_once('../MODEL/VentasModel.php');

if (isset($_POST['VentaSubmit'])) {
    // Verificar si el usuario está autenticado
    if (isset($_SESSION['Correo'])) {
        $usuario = new UserModel($_SESSION['Correo']);
        $datosUsuario = $usuario->ConsultaUsuario($_SESSION['idUser']);
    } else {
        echo '<script type="text/javascript">
                alert("Necesitas iniciar sesión para poder comprar");   
                window.location.href="../View/Login.php";  
              </script>';
        exit;
    }

    // Configurar la zona horaria
    date_default_timezone_set("America/Bogota");

    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        $carrito_mio = $_SESSION['carrito'];
        $total = 0;

        // Crear instancia del modelo de ventas
        $RegistrarVenta = new VentaModel(10);

        // Calcular el total de la compra
        foreach ($carrito_mio as $item) {
            if (isset($item) && $item != NULL) {
                if ($item['ref'] != 'portes') {
                    $total += $item['precio'] * $item['cantidad'];
                }
            }
        }

        // Crear la venta
        $idcliente = $_SESSION['idUser'];
        $fecha = date("Y-m-d");
        $Medio_Pago = $_POST['MedioPago'];
        $Direccion_Envio = $datosUsuario->Dirección;
        // Insertar la venta y obtener el ID generado
        $idFactura = $RegistrarVenta->CrearVenta($idcliente, $fecha, $total, $Medio_Pago, $Direccion_Envio);

        // Validar que la factura se haya creado correctamente
        if ($idFactura) {
            // Insertar los detalles de la venta
            foreach ($carrito_mio as $item) {
                if (isset($item) && $item != NULL) {
                    if ($item['ref'] != 'portes') {
                        $id_Producto = $item['ID_producto'];
                        $cantidad = $item['cantidad'];
                        $PrecioUnitario = $item['precio'];

                        $RegistrarVenta->CrearDetalleVenta($idFactura, $id_Producto, $cantidad, $PrecioUnitario);
                    }
                }
            }

            // Limpiar el carrito
            unset($_SESSION['carrito']);

            // Confirmar la compra
            echo '<script type="text/javascript">
                    alert("Gracias por su compra :)");   
                    window.location.href="/PROYECTO PSICHO GYM/view/productos.php";  
                  </script>';
        } else {
            echo '<script type="text/javascript">
                    alert("Error al procesar la compra. Intente nuevamente.");   
                    window.location.href="/PROYECTO PSICHO GYM/view/productos.php";  
                  </script>';
        }
    } else {
        echo '<script type="text/javascript">
                alert("El carrito está vacío. No se puede procesar la compra.");   
                window.location.href="/PROYECTO PSICHO GYM/view/productos.php";  
              </script>';
    }
}


?>