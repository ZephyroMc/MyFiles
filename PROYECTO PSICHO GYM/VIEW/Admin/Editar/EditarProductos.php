<?php
include_once('../../../MODEL/ProductosModel.php');
session_start();
$id = $_GET['id'];
$ProductModel = new Productos();
$datos = $ProductModel->ConsultaProductos($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../assets/css/estilo.css">
    <link rel="stylesheet" href="../../../assets/css/estilo2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit. fontawesome.com/646ac4fado.js" crossorigin="anonymous"></script>
    <title>Administrador</title>



</head>

<body>
    <div class="contenedor-header">
        <header>
            <h1>THE <span class="txtRojo">PSYCHO </span> STORE</h1>
            <nav id="nav">

                <a href="../admin.php">Administracion</a>

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
                                <li><a href="../../Cuenta/cuenta.php">Cuenta</a></li>
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
            <li><a href="../admin.php">Clientes</a></li>
            <li><a href="../Productos.php">Productos</a></li>
            <li><a href="../servicios.php">Servicios</a>
            <li><a href="../Facturas.php">Facturas</a>

    </div>

    <div class="container-fluid row">
        <form class="col-4 m-auto" action="../../../CONTROLLER/ControladorProductos.php" method="POST" enctype="multipart/form-data">
            <H3 class="text-center text-secondary">Editar Producto</H3>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Imagen</label>
            </div>
            <div>
                <img src="../../../<?= $datos->ruta ?>" style="width: 600px;height:500px; margin-bottom: 30px;">
                <input type="file" class="form-control" name="Imagen">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Nombre" value="<?= $datos->Nombre ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Marca</label>
                <input type="text" class="form-control" name="Marca" value="<?= $datos->Marca ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio De Venta</label>
                <input type="text" class="form-control" name="Precio_Venta" value="<?= $datos->Precio_Venta ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio De Compra</label>
                <input type="number" class="form-control" name="Precio_Compra" value="<?= $datos->Precio_Compra ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="Descripcion" value="<?= $datos->Descripcion ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Stock</label>
                <input type="text" class="form-control" name="Stock" value="<?= $datos->Stock ?>">
            </div>
            <input type="hidden" name="id" value="<?= $id ?>">

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