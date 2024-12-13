<?php
session_start();
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
    <title>Cuenta</title>



</head>

<body>
    <div class="contenedor-header">
        <header>

            <h1><a href="../indexX.php" class="ahref">THE</a> <span class="txtRojo"><a href="../indexX.php" class="txtRojo">PSYCHO</a> </span> <a href="../indexX.php" class="ahref">STORE</a></h1>
            <nav id="nav">

                <a href="cuenta.php">Cuenta</a>

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

    <div class="container-fluid row" style="margin-left:15%;">

        <div class="col-8 p-4">
            <form action="" method="post">
                <div class="mb-3 col-4 text-center d-inline-flex">
                    <input type="text" class="form-control" name="busqueda" placeholder="Buscar">
                    <input type="submit" href="" class="btn btn-small btn-success" name="buscar" value="Buscar">
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th scope="col">ID de Factura</th>
                        <th scope="col">ID_Cliente</th>
                        <th scope="col">Nombre Cliente</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Medio_Pago</th>
                        <th scope="col">Dirección_Envio</th>
                        <th scope="col">Detalle De Venta</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP
                    require_once('../../MODEL/Database.php');
                    $objetoconexion = new database;
                    $objpdo = $objetoconexion->Start();
                    $checkQuery = $query = 'SELECT Factura.ID_Factura as ID_Factura,Factura.ID_Cliente as ID_Cliente,Usuario.Nombre AS Nombre_Cliente, Factura.Fecha, Factura.Subtotal, Factura.Medio_Pago, Factura.Dirección_Envio
                        from Factura join Usuario on     Factura.ID_Cliente = Usuario.ID_Cliente where Factura.ID_Cliente =:ID_Cliente';
                    $checkStmt = $objpdo->prepare($checkQuery);
                    $checkStmt->bindParam(':ID_Cliente', $_SESSION['idUser']);
                    $checkStmt->execute();

                    while ($Datos = $checkStmt->fetchObject()) {
                    ?>
                        <tr>
                            <td><?= $Datos->ID_Factura ?> </td>
                            <td><?= $Datos->ID_Cliente ?></td>
                            <td><?= $Datos->Nombre_Cliente ?></td>
                            <td><?= $Datos->Fecha ?></td>
                            <td><?= $Datos->Subtotal ?></td>
                            <td><?= $Datos->Medio_Pago ?></td>
                            <td><?= $Datos->Dirección_Envio ?></td>



                            <td>
                                <a href="DetalleCompra.php?id=<?= $Datos->ID_Factura ?>" class="btn btn-small btn-success"><i class="fa-solid fa-magnifying-glass"></i></a>
                            </td>

                        </tr><?PHP
                            }
                                ?>
                </tbody>
            </table>
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