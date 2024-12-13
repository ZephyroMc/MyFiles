
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Registro</title>

</head>
<body id="Login">
    
    <!-- MENU -->
    <div class="contenedor-header">
        <header>
            <h1>THE <span class="txtRojo">PSYCHO </span> STORE</h1>
            <nav id="nav">
                <a href="indexx.php#inicio" onclick="seleccionar()">inicio</a>
                <a href="indexx.php#nosotros" onclick="seleccionar()">Nosotros</a>
                <a href="#servicios" onclick="seleccionar()">Servicios</a>
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
            <div class="inicio-Secion">
                <a href="Login.php">Iniciar Sesion</a>

            </div>
            <div class="inicio-Secion">
                <a href="Registrar.php">Registrarse</a>
            </div>
        </header>


    </div>


    <!--Login-->
   <div class="bodyreg">
    
    <div class="log-container">
      
      
        <form method="POST" action="../CONTROLLER/RegistroController.php">
          <h1>Registro</h1>

          <div class="input-box">
            <input type="text" placeholder="CORREO ELECTRONICO " required name="email"/>
            
          </div>
  
          <div class="input-box">
            <input type="text" placeholder="USUARIO " required minlength="4" maxlength="20" name="username">
            
          </div>
          <div class="input-box">
            <input type="password" placeholder="CONTRASEÑA " equired 
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}"
            title="Debe tener al menos 8 caracteres, con al menos una letra mayúscula, una letra minúscula, un número y un carácter especial" name="password">
            
          </div>

          <div class="input-box">
            <input type="password" placeholder="REPITA SU CONTRASEÑA " required />
            
          </div>

          <input type="submit" class="btn" name=Submit value="Registrarse">


          <div class="register-link">
            <p>YA TIENES UNA CUENTA ? <a href="Login.php">INICIAR SESION !</a></p>
          </div>
        </form>
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