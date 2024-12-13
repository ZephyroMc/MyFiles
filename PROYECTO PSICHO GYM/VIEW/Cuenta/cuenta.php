<?php
include_once('../../MODEL/UserModel.php');
session_start();
$Usermodel = new UserModel($_SESSION['Correo']);
$id = $_SESSION['idUser'];
$datos = $Usermodel->ConsultaUsuario($id);
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
            <h1>THE <span class="txtRojo">PSYCHO </span> STORE</h1>
            <nav id="nav">

                <a href="../indexx.php">Inicio</a>

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

    <div class="container-fluid row">
        <form class="col-4 m-auto" method="POST">
            <H3 class="text-center text-secondary">Cuenta</H3>
            <ul class='ListaCuenta'>
                <li>
                    <div class="cont12">
                        <a href="cuentaeditar.php" class="CuentaStyle">
                            <Div class="Contenedor-CuentaStyle">
                                <div class="Contenedor-Titulo">
                                    <img src="../../ASSETS/img/security._CB659600413_.png" alt="">
                                    <h5>Cambiar Datos de tu cuenta</h5>
                                </div>
                                <div>
                                    <strong><h6>Editar nombre de usuario y número de teléfono móvil</h6></strong>

                                </div>
                            </Div>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="cont12">
                        <a href="Pedidos.php" class="CuentaStyle">
                            <Div class="Contenedor-CuentaStyle">
                                <div class="Contenedor-Titulo">
                                    <img src="../../ASSETS/img/order._CB660668735_.png" alt="">
                                    <h5>
                                        Tus pedidos
                                    </h5>
                                </div>
                                <div>
                                   <strong><h6>Rastrear, devolver, cancelar un pedido, descargar una factura o comprar de nuevo</h6></strong>
                                </div>
                            </Div>
                        </a>
                    </div>
                </li>

            </ul>

        </form>
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