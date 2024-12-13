<?php
session_start();
require_once('../../MODEL/Database.php');
require_once('../../MODEL/VentasModel.php');
require_once('../../MODEL/UserModel.php');
// Obtener el id del cliente mediante el id de la factura
$Id_Factura = $_GET['id'];
$cliente = new VentaModel($Id_Factura);
$DCliente = $cliente->ConsultarDetalleDeVenta();
$Id_Cliente = $DCliente->ID_Cliente;
// Buscar los datos de cliente con el id de cliente encontrado
$DatosCliente = new UserModel($_SESSION['Correo']);
$AllDatesCliente = $DatosCliente->ConsultaUsuario($Id_Cliente);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/estilo.css">
    <link rel="stylesheet" href="../../assets/css/estilo2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit. fontawesome.com/646ac4fado.js" crossorigin="anonymous"></script>
    <title>cuenta</title>



</head>

<body>
    <div class="contenedor-header">
        <header>

            <h1><a href="../../indexX.php" class="ahref">THE</a> <span class="txtRojo"><a href="../../indexX.php" class="txtRojo">PSYCHO</a> </span> <a href="../../indexX.php" class="ahref">STORE</a></h1>
            <nav id="nav">

                <a href="cuenta.php">cuenta</a>

            </nav>
            <div class="redes">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
            </div>
            <!-- Icono del menu responsive -->
            <div id="icono-nav" class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>
            <?php
            if (isset($_SESSION['Correo'])) {
            ?>
                <li class="listas">
                    <ul class="Navigation">
                        <li class="listas">
                            <div class="inicio-Secion">
                                <a href=""><?php echo ($_SESSION['Correo']); ?></a>
                            </div>
                            <ul class="listasul">
                                <li><a href="cuenta.php">Cuenta</a></li>
                                <li><a href="../../CONTROLLER/InicioDeSesion.php">Cerrar Sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            <?php
            } else {
                echo '<script type="text/javascript">
                alert("Necesitas una cuenta");   
                window.location.href="../Login.php";  
                </script>';
            }
            ?>


        </header>
    </div>

    <div id="division">
    </div>

    <div class="container-fluid row">

        <div class="factura">
            <div class="facturadatos">
                <div class="FacturaTitulo">
                    <h1>THE <span class="txtRojo">PSYCHO </span> STORE</h1>
                    <div class="FacturaID">
                        <h4>Factura Numero: <?= $Id_Factura ?></h4>
                    </div>

                </div>
                <div class="datosCliente">
                    <div class="FacturaCliente">
                        <h4><strong>Usuario ID: </strong></h4>
                        <h4><?= $DCliente->ID_Cliente; ?></H4>
                    </div>
                    <div class="FacturaCliente">
                        <h4><strong>Usuario: </strong></h4>
                        <h4><?= $AllDatesCliente->Nombre ?></h4>
                    </div>
                    <div class="FacturaCliente">
                        <h4><strong>Correo: </strong></h4>
                        <h4><?= $AllDatesCliente->Email ?></h4>
                    </div>
                    <div class="FacturaCliente">
                        <h4><strong>Direccion de envio: </strong></h4>
                        <h4><?= $AllDatesCliente->Dirección ?></h4>
                    </div>
                </div>

                <div class="ventProductos">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID_Suplemento</th>
                                <th scope="col">Nombre Suplemento</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Valor Unitario</th>
                                <th scope="col">Valor Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $objetoconexion = new database;
                            $objpdo = $objetoconexion->Start();
                            $checkQuery = 'SELECT 
                            Detalle_Venta.ID_Suplemento as Id_Suplemento,
                            Producto.Nombre AS Nombre_Suplemento,
                            Detalle_Venta.Cantidad as Cantidad,
                            Detalle_Venta.Precio_Unitario AS Valor_Unitario
                            FROM 
                              Detalle_Venta
                            JOIN 
                                Producto
                            ON 
                                Detalle_Venta.ID_Suplemento = Producto.ID_Suplemento where ID_Venta = :Id_Factura';

                            $checkStmt = $objpdo->prepare($checkQuery);
                            $checkStmt->bindParam(':Id_Factura', $Id_Factura);
                            $checkStmt->execute();
                            while ($Datos = $checkStmt->fetchObject()) {
                            ?>
                                <tr>
                                    <th scope="row">-</th>
                                    <td><?= $Datos->Id_Suplemento ?></td>
                                    <td><?= $Datos->Nombre_Suplemento ?></td>
                                    <td><?= $Datos->Cantidad ?></td>
                                    <td>$<?= $Datos->Valor_Unitario ?></td>
                                    <td>$<?= ($Datos->Valor_Unitario) * $Datos->Cantidad ?></td>
                                </tr>

                            <?php } ?>
                        </tbody>

                    </table>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SubTotal</th>
                                <th scope="col">Impuestos</th>
                                <th scope="col">Total</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$<?= $DCliente->Subtotal ?></td>
                                <td>0</td>
                                <td>$<?= $DCliente->Subtotal ?></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <th scope="col">Medio de Pago</td>
                                <th><?= $DCliente->Medio_Pago ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>



        </div>

    </div>
</body>
<footer>
    <div class="info">
        <p>2023 - <span class="txtRojo">THE GYM</span> Todos los derechos reservados</p>
        <div class="redes">
            <a href="#">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="#">
                <i class="fa-brands fa-twitter"></i>
            </a>
            <a href="#">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="#">
                <i class="fa-brands fa-youtube"></i>
            </a>
        </div>
    </div>
</footer>

</html>