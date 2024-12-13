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
    <title>Administrador</title>



</head>

<body>
    <div class="contenedor-header">
        <header>

            <h1><a href="../indexX.php" class="ahref">THE</a> <span class="txtRojo"><a href="../indexX.php" class="txtRojo">PSYCHO</a> </span> <a href="../indexX.php" class="ahref">STORE</a></h1>
            <nav id="nav">

                <a href="admin.php">Administracion</a>

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
            if (isset($_SESSION['TypeUser']) && $_SESSION['TypeUser'] == 'admin') {
            ?>
                <li class="listas">
                    <ul class="Navigation">
                        <li class="listas">
                            <div class="inicio-Secion">
                                <a href=""><?php echo ($_SESSION['Correo']); ?></a>
                            </div>
                            <ul class="listasul">
                                <li><a href="../Cuenta/cuenta.php">Cuenta</a></li>
                                <li><a href="../../CONTROLLER/InicioDeSesion.php">Cerrar Sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            <?php
            } else {
                echo '<script type="text/javascript">
        alert("ERROR: Usuario no tiene permisos");   
        window.location.href="../indexx.php";  
    </script>';
            }
            ?>


        </header>
    </div>

    <div id="division">
    </div>
    <div class="Nav-container">
        <ul class="Navigation">
            <li><a href="admin.php">Clientes</a></li>
            <li><a href="Productos.php">Productos</a></li>
            <li><a href="servicios.php">Servicios</a>
            <li><a href="Facturas.php">Facturas</a>
        </ul>
    </div>

    <div class="container-fluid row">

        <form class="col-4" action="../../CONTROLLER/ControladorProductos.php" method="POST" enctype="multipart/form-data">
            <H3 class="text-center text-secondary">Registro De Productos</H3>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Marca</label>
                <input type="text" class="form-control" name="Marca">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio De Venta</label>
                <input type="number" class="form-control" name="Precio_Venta">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio De Compra</label>
                <input type="number" class="form-control" name="Precio_Compra">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="Descripcion">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Stock</label>
                <input type="number" class="form-control" name="Stock">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="Imagen">
            </div>

            <input type="submit" class="btn btn-primary" name="btnregistrar" value="Registrar">
        </form>

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

                        <th scope="col">Id Producto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Precio_Venta</th>
                        <th scope="col">Precio_Compra</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP
                    require_once('../../MODEL/Database.php');
                    if (isset($_POST['buscar'])) {
                        $dato = $_POST['busqueda'];
                        $objetoconexion = new database();
                        $objpdo = $objetoconexion->Start();
                        $query = 'SELECT * FROM producto where ID_Suplemento LIKE :dato or Nombre LIKE :dato or Marca LIKE :dato or Precio_Venta LIKE :dato or Precio_Compra LIKE :dato or Descripcion LIKE :dato or Stock LIKE :dato';
                        $checkStmt = $objpdo->prepare($query);
                        $checkStmt->bindParam(':dato', $dato);
                        $checkStmt->execute();
                    } else {

                        $objetoconexion = new database;
                        $objpdo = $objetoconexion->Start();
                        $checkQuery = 'SELECT * FROM producto';
                        $checkStmt = $objpdo->prepare($checkQuery);
                        $checkStmt->execute();
                    }
                    while ($Datos = $checkStmt->fetchObject()) {
                    ?>
                        <tr>
                            <td><?= $Datos->ID_Suplemento ?> </td>
                            <td><?= $Datos->Nombre ?></td>
                            <td><?= $Datos->Marca ?></td>
                            <td><?= $Datos->Precio_Venta ?></td>
                            <td><?= $Datos->Precio_Compra ?></td>
                            <td><?= $Datos->Descripcion ?></td>
                            <td><?= $Datos->Stock ?></td>
                            <td><img src="../../<?= $Datos->ruta ?>" style="width: 100px; height: 90px;"></td>

                            <td>
                                <a href="editar/EditarProductos.php?id=<?= $Datos->ID_Suplemento ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

                                <a href="../../CONTROLLER/ControladorProductos.php?id=<?= $Datos->ID_Suplemento ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>

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