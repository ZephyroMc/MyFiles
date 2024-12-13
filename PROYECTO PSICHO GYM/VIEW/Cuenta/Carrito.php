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
    <link rel="stylesheet" href="../../ASSETS/CSS/estilo1.css">
    <link rel="stylesheet" href="../../ASSETS/CSS/estilo.css">
    <link rel="stylesheet" href="../../ASSETS/CSS/estilo2.css">
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

                <a href="../indexX.php" onclick="seleccionar()">inicio</a>
                <a href="../indexx.php#nosotros" onclick="seleccionar()">Nosotros</a>
                <a href="../indexx.php#servicios" onclick="seleccionar()">Servicios</a>
                <a href="../Productos.php">Productos</a>
                <a href="../indexx.php#galeria" onclick="seleccionar()">Galería</a>
                <a href="../indexx.php#equipo" onclick="seleccionar()">Equipo</a>
                <a href="../indexx.php#contacto" onclick="seleccionar()">Contacto</a>

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
                                <li><a href="/PROYECTO PSICHO GYM/View/cuenta/cuenta.php">Cuenta</a></li>
                                <li><a href="/PROYECTO PSICHO GYM/Controller/InicioDeSesion.php">Cerrar Sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            <?php
            } else {
            ?>
                <div class="inicio-Secion">
                    <a href="../Login.php">Iniciar Sesion</a>

                </div>
                <div class="inicio-Secion">
                    <a href="../Registrar.php">Registrarse</a>
                </div>
            <?php
            }
            ?>
        </header>
    </div>

    <div id="division">
    </div>
    <?php
    include('navbar.php');

    ?>
    <div class="Nav-container">
        <ul class="Navigation" style="display: inline-flex;">
            <li><a href="/PROYECTO PSICHO GYM/View/productos.php">Inicio</a></li>
            <li><a href="/PROYECTO PSICHO GYM/View/productos.php">Suplementos</a>
                <ul>
                    <li><a href="">AMINOACIDOS</a> </li>

                    <li> <a href=""> BCAA </a></li>

                    <li> <a href=""> CREATINAS </a></li>

                    <li> <a href="">PRECURSORES HORMONALES</a> </li>

                    <li> <a href="">PRE ENTRENOS</a> </li>
                </ul>
            </li>
            <li><a href="/PROYECTO PSICHO GYM/View/productos.php">Marcas</a>
                <ul>
                    <li><a href="">BSN</a></li>
                    <li><a href="">CONNECT</a></li>
                </ul>
            </li>
            <li><a href="/PROYECTO PSICHO GYM/View/productos.php">Equipamiento en casa</a></li>
            <li><a href="/PROYECTO PSICHO GYM/View/productos.php">Grips Y Accesorios</a></li>
        </ul>

    </div>
    </form>
    <section class="contenedor">

        <div class="contenedor-items">
            <?PHP
            require_once('../../MODEL/Database.php');
            ?>
            <div class="center mt-5">
                <div class="card pt-3">
                    <form action="../../CONTROLLER/ModeloVenta.php" method="post">
                        <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Mi pedido</p>
                        <div class="container-fluid p-2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Artículo</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['carrito'])) {
                                        $carrito_mio = $_SESSION['carrito'];
                                        $total = 0;

                                        for ($i = 0; $i < count($carrito_mio); $i++) {
                                            if (isset($carrito_mio[$i]) && $carrito_mio[$i] != NULL) {
                                                if ($carrito_mio[$i]['ref'] != 'portes') {
                                                    $subtotal = $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];
                                                    $total += $subtotal;
                                    ?>
                                                    <tr>
                                                        <th scope="row" style="vertical-align: middle;"><?php echo $i + 1; ?></th>
                                                        <td>
                                                            <img src="../../<?php echo $carrito_mio[$i]['ref']; ?>" alt="" width="100px">
                                                        </td>
                                                        <td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['cantidad']; ?></td>
                                                        <td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['titulo']; ?></td>
                                                        <td style="vertical-align: middle;"><?php echo number_format($carrito_mio[$i]['precio'], 0, ',', '.'); ?> COP</td>
                                                        <td style="vertical-align: middle;"><?php echo number_format($subtotal, 0, ',', '.'); ?> COP</td>
                                                        
                                                    </tr>
                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
                    </form>
                    </tbody>
                    </table>

                    <li class="list-group-item d-flex justify-content-between">
                        <span style="text-align: left; color: #000000;"><strong>Total (COP)</strong></span>
                        <strong style="text-align: left; color: #000000;">
                            <?php
                            if (!isset($total)) {
                                $total = 0;
                            }
                            echo number_format($total, 2, ',', '.');
                            ?> COP
                        </strong>
                    </li>
                </div>
                <select type="text" class="form-control" name="MedioPago">
                    <option value='Efectivo'>Efectivo</option>
                    <option value='Transferencia'>Transferencia</option>
                    <option value='Debito'>Debito</option>
                </select>
                <input type="submit" class="btn btn-success my-4 col-12" name="VentaSubmit" value="Pagar">
            </div>
        </div>
        <?PHP

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