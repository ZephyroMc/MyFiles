<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <link rel="stylesheet" href="../assets/css/estilo2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <title>THE GYM</title>

</head>

<body>
    <!-- MENU -->
    <div class="contenedor-header">
        <header>
            <h1>THE <span class="txtRojo">PSYCHO </span> STORE</h1>
            <nav id="nav">
                <a href="indexX.php">inicio</a>
                <a href="#nosotros" onclick="seleccionar()">Nosotros</a>
                <a href="#servicios" onclick="seleccionar()">Servicios</a>
                <a href="Productos.php">Productos</a>
                <a href="#galeria" onclick="seleccionar()">Galería</a>
                <a href="#equipo" onclick="seleccionar()">Equipo</a>
                <a href="#contacto" onclick="seleccionar()">Contacto</a>
                <?php
                if (isset($_SESSION['Correo'])) {
                ?>
                    <div class="inicio-Secion">
                        <a href="admin/admin.php">Administracion</a>
                    </div>
                <?php
                } ?>

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
                                <li><a href="../CONTROLLER/InicioDeSesion.php">Cerrar Sesion</a></li>
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

        <?php
    if (isset($_POST['enviar'])) {   ?>
        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert">
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>

            <strong>Mensaje Enviado</strong> pronto recibira una respueta
        </div>
    <?php
    }
    ?>
    </div>


    <!-- SECCION INICIO -->
    <section id="inicio" class="inicio">
        <div class="contenido-seccion">
            <div class="info">
                <h2>DESATA TU <span class="txtRojo">FUERZA</span></h2>
                <p>Triunfar es más facil de lo que piensas!</p>
                <a href="#nosotros" class="btn-mas">
                    <i class="fa-solid fa-circle-chevron-down"></i>
                </a>
            </div>
            <div class="opciones">
                <div class="opcion">
                    01.FITNESS
                </div>
                <div class="opcion">
                    02.CROSSFIT
                </div>
                <div class="opcion">
                    03.BOXING
                </div>
                <div class="opcion">
                    04.ENDURANCE
                </div>
                <div class="opcion">
                    05.YOGA
                </div>
                <div class="opcion">
                    06.CARDIO
                </div>
            </div>
        </div>
    </section>

    <!-- SECCION NOSOTROS -->
    <section id="nosotros" class="nosotros">
        <div class="fila">
            <div class="col">
                <img src="../ASSETS/img/mashe.gif" alt="">
            </div>
            <div class="col">
                <div class="contenedor-titulo">
                    <div class="numero">
                        01
                    </div>
                    <div class="info">
                        <span class="frase">LA MEJOR EXPERIENCIA</span>
                        <h2>NOSOTROS</h2>
                    </div>
                </div>
                <p class="p-especial"></p>
                <p>En The Psycho Store, no solo vendemos membresías; transformamos vidas. Somos el destino definitivo para quienes buscan maximizar su rendimiento físico a través de la combinación perfecta de entrenamiento y suplementación.

                    Nuestra misión es clara: empoderarte con los mejores productos y recursos para que lleves tu cuerpo al límite. Ofrecemos una amplia gama de suplementos de alta calidad que potencian tu fuerza, energía y recuperación. Nos enorgullecemos de tener un equipo de expertos listos para asesorarte y guiarte en cada paso de tu camino hacia el éxito.

                    Si estás listo para llevar tu entrenamiento a otro nivel, The Psycho Store es tu aliado en la conquista de tus objetivos. ¡Únete a nosotros y desata tu verdadero potencial!</p>
            </div>
        </div>
        <hr>
        <div class="fila-nosotros">
            <div class="col1">
                <span class="frase">
                    <span class="txtRojo">ENTRENA</span> DIFERENTE
                </span>

            </div>
        </div>
    </section>

    <!-- SECCION SERVICIOS -->
    <section class="servicios" id="servicios">
        <div class="contenido-seccion">
            <div class="fila">
                <div class="col">
                    <div class="contenedor-titulo">
                        <div class="numero">
                            02
                        </div>
                        <div class="info">
                            <span class="frase">LA MEJOR EXPERIENCIA</span>
                            <h2>SERVICIOS</h2>
                        </div>
                    </div>
                    <p class="p-especial"></p>
                    <p>En The Psycho Store, no solo ofrecemos suplementos; te proporcionamos la potencia necesaria para transformar tu cuerpo en una máquina imparable. Desde proteínas de alta calidad que alimentan tus músculos hasta pre-entrenos explosivos que te catapultan hacia un rendimiento extremo, nuestra selección está diseñada para aquellos que no se conforman con lo ordinario. Desata tu potencial y deja atrás la mediocridad con nuestros suplementos de élite</p>
                </div>
                <div class="col">
                    <img src="../ASSETS/img/vegeta.gif" width="500px " height="270px" alt=""> <br> <br> <br> <br>
                </div>
            </div>
        </div>
        <div class="info-servicios">
            <table>
                <tr>
                    <td>
                        <i class="fa-solid fa-person-walking"></i>
                        <h3><span class="txtRojo">Suplementos </span> de Fitness</h3>
                        <p>LOS MEJORES SUPLEMENTOS DE FITNNESS</p>
                    </td>
                    <td>
                        <i class="fa-solid fa-dumbbell"></i>
                        <h3><span class="txtRojo">Suplementos</span> de Crossfit</h3>
                        <p>LOS MEJORES SUPLEMENTOS DE CROSSFIT</p>
                    </td>
                    <td>
                        <i class="fa-solid fa-mitten"></i>
                        <h3><span class="txtRojo">Suplementos</span> de Boxeo</h3>
                        <p>LOS MEJORES SUPLEMENTOS DE BOXEO</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fa-solid fa-clock"></i>
                        <h3><span class="txtRojo">Clases </span> de Enduro</h3>
                        <p></p>
                    </td>
                    <td>
                        <i class="fa-solid fa-heart-circle-bolt"></i>
                        <h3><span class="txtRojo">Suplementos</span> de Maraton</h3>
                        <p>LOS MEJORES MULTIVITAMINICOS </p>
                    </td>
                    <td>
                        <i class="fa-solid fa-bicycle"></i>
                        <h3><span class="txtRojo">Suplementos </span> de Ciclismo</h3>
                        <p>LOS MEJORES SUPLEMENTOS DE FITNNESS.</p>
                    </td>
                </tr>
            </table>
        </div>
    </section>

    <!-- SECCION COMODIDADES -->
    <section id="comodidades" class="comodidades">
        <div class="fila">
            <div class="col">
                <img src="../ASSETS/img/nosotros.png" alt="">
            </div>
            <div class="col">
                <div class="contenedor-titulo">
                    <div class="numero">
                        03
                    </div>
                    <div class="info">
                        <span class="frase">LA MEJOR EXPERIENCIA</span>
                        <h2>COMODIDADES</h2>
                    </div>
                </div>
                <p class="p-especial">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <ul>
                    <li><span>PILETA</span> - Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tenetur, nam cumque adipisci ratione obcaecati impedit inventore eligendi</li>
                    <li><span>WIFI GRATIS</span> - Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tenetur, nam cumque adipisci ratione obcaecati impedit inventore</li>
                    <li><span>ESTACIONAMIENTO GRATIS</span> - Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tenetur, nam cumque adipisci ratione obcaecati impedit?</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- SECCION GALERIA -->
    <section class="galeria" id="galeria">
        <div class="contenido-seccion">
            <div class="contenedor-titulo">
                <div class="numero">
                    04
                </div>
                <div class="info">
                    <span class="frase">LA MEJOR EXPERIENCIA</span>
                    <h2>GALERIA</h2>
                </div>
            </div>
            <div class="fila">
                <div class="col">
                    <img src="../ASSETS/img/f1.jpg" alt="">
                </div>
                <div class="col">
                    <img src="../ASSETS/img/f2.jpg" alt="">
                </div>
                <div class="col">
                    <img src="../ASSETS/img/f3.jpg" alt="">
                </div>
            </div>
            <div class="fila">
                <div class="col">
                    <img src="../ASSETS/img/f4.jpg" alt="">
                </div>
                <div class="col">
                    <img src="../ASSETS/img/f5.jpg" alt="">
                </div>
                <div class="col">
                    <img src="../ASSETS/img/f6.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- SECCION EQUIPO -->
    <section class="equipo" id="equipo">
        <div class="contenido-seccion">
            <div class="contenedor-titulo">
                <div class="numero">
                    05
                </div>
                <div class="info">
                    <span class="frase">LA MEJOR EXPERIENCIA</span>
                    <h2>PAQUETES</h2>
                </div>
            </div>
            <div class="fila">
                <div class="col">
                    <img src="../ASSETS/img/EEE.PNG" alt="">
                    <div class="info">
                        <h2>MARCOS</h2>
                        <p>Fitness - Pilates - Yoga</p>
                        <a href="#">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <img src="../ASSETS/img/EEEE.PNG" alt="">
                    <div class="info">
                        <h2>JUAN</h2>
                        <p>Fitness - Pilates - Yoga</p>
                        <a href="#">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCION CONTACTO -->
    <section class="contacto" id="contacto">
        <form method="post">
            <div class="contenido-seccion">
                <div class="contenedor-titulo">
                    <div class="numero">
                        06
                    </div>
                    <div class="info">
                        <span class="frase">LA MEJOR EXPERIENCIA</span>
                        <h2>CONTACTO</h2>
                    </div>
                </div>
                <div class="fila">
                    <div class="col">
                        <input type="text" placeholder="Ingrese Email">
                    </div>
                    <div class="col">
                        <input type="text" placeholder="Ingrese Nombre">
                    </div>
                </div>
                <div class="mensaje">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Ingresa el Mensaje"></textarea>
                    <button name="enviar">Enviar Mensaje</button>
                </div>
                <div class="fila-datos">
                    <div class="col">
                        <i class="fa-solid fa-location-dot"></i>
                        BOGOTA
                    </div>
                    <div class="col">
                        <i class="fa-solid fa-phone"></i>
                        2664 - 456788
                    </div>
                    <div class="col">
                        <i class="fa-regular fa-clock"></i>
                        Lunes a Sábado, 8:00h - 24:00h
                    </div>
                </div>
            </div>
        </form>
    </section>

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
    <script src="app.js"></script>
</body>

</html>