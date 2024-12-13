<?PHP
if (isset($_SESSION['carrito'])) {
    $carrito_mio = $_SESSION['carrito'];
}

// Contamos nuestro carrito
$totalcantidad = 0; // Inicializamos la cantidad total
if (isset($carrito_mio) && is_array($carrito_mio)) {
    for ($i = 0; $i < count($carrito_mio); $i++) {
        if (isset($carrito_mio[$i])) {
            if ($carrito_mio[$i] != NULL) {
                if (!isset($carrito_mio[$i]['cantidad'])) {
                    $carrito_mio[$i]['cantidad'] = 0;
                }
                $totalcantidad += $carrito_mio[$i]['cantidad']; // Sumamos la cantidad del producto
            }
        }
    }
}

// Declaramos variables
if (!isset($totalcantidad)) {
    $totalcantidad = '';
}
?>
<?php
// Código PHP relacionado con el carrito...
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #112956;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Mi tienda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!-- Botón que abre el modal del carrito -->
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red; cursor:pointer;">
                        <i class="fas fa-shopping-cart"></i> <?php echo ' ' . $totalcantidad; ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Aquí se incluye el contenido del modal -->
<div class="modal fade" id="modal_cart" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mi carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenido del carrito (copiado desde moda.php) -->
                <div>
                    <div class="p-2">
                        <ul class="list-group mb-3">
                            <?php
                            if (isset($carrito_mio) && is_array($carrito_mio)) {
                                $total = 0;
                                foreach ($carrito_mio as $producto) {
                                    if ($producto != NULL) {
                            ?>
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div class="row col-12">
                                                <div class="col-6 p-0" style="text-align: left; color: #000000;">
                                                    <h6 class="my-0">Cantidad: <?php echo $producto['cantidad']; ?> - <?php echo $producto['titulo']; ?></h6>
                                                </div>
                                                <div class="col-6 p-0" style="text-align: right; color: #000000;">
                                                    <span class="text-muted">COP <?php echo $producto['precio'] * $producto['cantidad']; ?></span>
                                                </div>
                                            </div>
                                        </li>
                            <?php
                                        $total += $producto['precio'] * $producto['cantidad'];
                                    }
                                }
                            } else {
                                echo '<li class="list-group-item">El carrito está vacío.</li>';
                            }
                            ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span style="text-align: left; color: #000000;">Total (COP)</span>
                                <strong style="text-align: left; color: #000000;">COP <?php echo $total ?? 0; ?></strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a type="button" class="btn btn-primary" href="/PROYECTO PSICHO GYM/View/cuenta/borrarcarrito.php">Vaciar carrito</a>
                <a type="button" class="btn btn-success" href="/PROYECTO PSICHO GYM/View/cuenta/Carrito.php">Continuar pedido</a>
            </div>
        </div>
    </div>
</div>