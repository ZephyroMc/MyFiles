
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <title>Iniciar Sesion</title>

</head>
<body id="Login" >
    <!-- MENU -->
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
            <div class="inicio-Secion">
                <a href="Login.php">Iniciar Sesion</a>

            </div>
            <div class="inicio-Secion">
                <a href="Registrar.php">Registrarse</a>
            </div>
        </header>
    </div>
    <!--Login-->
   <div class="body">
    <div class="log-container">
        <form method="POST" action="../CONTROLLER/InicioDeSesion.php">
        
          <h1>LOGIN</h1>
          <div class="input-box">
            <input type="text" placeholder="Email " required name="email" />
            
          </div>
          <div class="input-box">
            <input type="password" placeholder="CONTRASEÑA " required name="password"/>
            
          </div>
  
          <div class="remember-forgot">
            <label><input type="checkbox" /> RECORDAR </label>
            <a href="#">¿Has olvidado tu contraseña?  </a>
          </div>
  
          <input type="submit" class="btn" value="Iniciar Sesion" name="submit"/>
  
          <div class="register-link">
            <p>SI NO TIENES UNA CUENTA ? <a href="Registrar.php">REGISTRATE AQUI !</a></p>
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