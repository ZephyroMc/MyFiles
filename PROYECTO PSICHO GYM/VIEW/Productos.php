<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../ASSETS/CSS/estilo1.css">
    <link rel="stylesheet" href="../ASSETS/CSS/estilo.css">
    <link rel="stylesheet" href="../ASSETS/CSS/estilo2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../ASSETS/JS/app1.js" async></script>

    <title>Productos</title>

</head>
<!-- MENU -->

<body>
    <div class="contenedor-header">
        <header>
            <h1>THE <span class="txtRojo">PSYCHO </span> STORE</h1>
            <nav id="nav">

                <a href="indexX.php" onclick="seleccionar()">inicio</a>
                <a href="indexx.php#nosotros" onclick="seleccionar()">Nosotros</a>
                <a href="indexx.php#servicios" onclick="seleccionar()">Servicios</a>
                <a href="Productos.php">Productos</a>
                <a href="indexx.php#galeria" onclick="seleccionar()">Galería</a>
                <a href="indexx.php#equipo" onclick="seleccionar()">Equipo</a>
                <a href="indexx.php#contacto" onclick="seleccionar()">Contacto</a>

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
                                <li><a href="Cuenta/cuenta.php">Cuenta</a></li>
                                <li><a href="../../CONTROLLER/InicioDeSesion.php">Cerrar Sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            <?php
            } else {
            ?>
                <div class="inicio-Secion">
                    <a href="Login.php">Iniciar Sesion</a>

                </div>
                <div class="inicio-Secion">
                    <a href="Registrar.php">Registrarse</a>
                </div>
            <?php
            }
            ?>
        </header>
    </div>

    <div id="division">
    </div>
    <?php
    include('Cuenta/navbar.php');

    ?>
    <div class="Nav-container">
        <ul class="Navigation" style="display: inline-flex;">
            <li><a href="">Inicio</a></li>
            <li><a href="">Suplementos</a>
                <ul>
                    <li><a href="">AMINOACIDOS</a> </li>

                    <li> <a href=""> BCAA </a></li>

                    <li> <a href=""> CREATINAS </a></li>

                    <li> <a href="">PRECURSORES HORMONALES</a> </li>

                    <li> <a href="">PRE ENTRENOS</a> </li>
                </ul>
            </li>
            <li><a href="">Marcas</a>
                <ul>
                    <li><a href="">BSN</a></li>
                    <li><a href="">CONNECT</a></li>
                </ul>
            </li>
            <li><a href="">Equipamiento en casa</a></li>
            <li><a href="">Grips Y Accesorios</a></li>
        </ul>

    </div>
    <form method="post">
        <div class="mb-3 col-2 text-center d-inline-flex" style="margin-left: 60%; margin-top:1%">
            <input type="text" class="form-control" name="busqueda" placeholder="Buscar">
            <input type="submit" href="" class="btn btn-small btn-success" name="buscar" value="Buscar">

        </div>
    </form>
    <section class="contenedor">

        <div class="contenedor-items">
            <?PHP
            require_once('../MODEL/Database.php');
            if (isset($_POST['buscar'])) {
                $dato = $_POST['busqueda'];
                $objetoconexion = new database();
                $objpdo = $objetoconexion->Start();
                $query = 'SELECT * FROM producto where  Nombre LIKE :dato or Marca LIKE :dato or Precio_Venta LIKE :dato';
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
                <form action="../CONTROLLER/Cart.php" method="post">
                    <div class="item">

                        <div class="Descripcion"> <span class="titulo-item"><?= $Datos->Nombre ?> </span></div>
                        <img src="../<?= $Datos->ruta ?>" alt="" class="img-item">
                        <span class="precio-item">$<?= number_format($Datos->Precio_Venta, 0, '', '.') ?> COP</span>
                        <div class="Descripcion"><span><?= $Datos->Descripcion ?></span></div>
                        <input type="hidden" name="Id_producto" value="<?= $Datos->ID_Suplemento ?>">
                        <input type="hidden" name="Nombre" value="<?= $Datos->Nombre ?>">
                        <input type="hidden" name="Precio_Venta" value="<?= $Datos->Precio_Venta ?>">
                        <input type="hidden" name="cantidad" value="1">
                        <input type="hidden" name="ruta" value="<?= $Datos->ruta ?>">
                        <button class="boton-item" name="CarritoBoton">Agregar al Carrito</button>
                    </div>
                </form>
            <?PHP
            }
            ?>

        </div>

        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>

            <div class="carrito-items">

            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total">
                    </span>

                </div>

                <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i> </button>
            </div>

    </section>
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

<body>

</body>

</html>