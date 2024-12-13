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
                                <li><a href="Cuenta/cuenta.php">Cuenta</a></li>
                                <li><a href="../../CONTROLLER/InicioDeSesion.php">Cerrar Sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php
            }
            else{
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
    <div class="Nav-container">
        <ul class="Navigation">
            <li><a href="../admin.php">Clientes</a></li>
            <li><a href="../Productos.php">Productos</a></li>
            <li><a href="../servicios.php">Servicios</a>
            <li><a href="../Facturas.php">Facturas</a>

    </div>

    <div class="container-fluid row">
        <form class="col-4 m-auto" action="../../../CONTROLLER/ActualizarUsuarioController.php" method="POST">
            <H3 class="text-center text-secondary">Editar usuario</H3>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->Nombre ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="<?= $datos->Apellido ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="Direccion" value="<?= $datos->Dirección ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">telefono</label>
                <input type="number" class="form-control" name="telefono" value="<?= $datos->Teléfono ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">email</label>
                <input type="text" class="form-control" name="email" value="<?= $datos->Email ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">clave</label>
                <input type="text" class="form-control" name="clave" value="<?= $datos->Clave ?>">
            </div>
            <input type="hidden" name="id" value="<?= $id ?>">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Rol</label>
                <select type="text" class="form-control" name="Rol" value="<?= $datos->rol ?>">
                    <option value="usuario">usuario</option>
                    <option value="admin">admin</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Estado</label>
                <select type="number" class="form-control" name="Estado" value="<?= $datos->StateUser ?>">
                    <option value=1>Activo</option>
                    <option value=0>Inactivo</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" name="btnActualizar" value="Actualizar Datos">
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