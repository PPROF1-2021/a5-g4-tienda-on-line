<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description"
    content="Tienda online de productos reciclados. Unite al consumo responsable. Productos de proveedores verificados, 100% sostenibles y ecológicos" />
  <meta name="keywords" content="sustentabilidad, economía circular, 4R, ecológico, sostenible, productos reciclados" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="icon" href="img/greenbuddies.ico" />
  <script src="https://kit.fontawesome.com/779db6cf6f.js" crossorigin="anonymous"></script>
  <script src="js/sweetalert2.all.min.js"></script>
  <title>Green Buddies | Acceder</title>
</head>

<body>
<?php

if($_POST){

    session_start();
    require('./conexion.php');
    $emailUs=$_POST['emailUs'];
    $passwordUs=$_POST['passwordUs'];
    $passwordUsHash = password_hash($passwordUs, PASSWORD_BCRYPT);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query=$conexion->prepare("SELECT * FROM usuarios WHERE email = :emailUs");
    $query->bindParam(":emailUs", $emailUs);
    $query->execute();
    $usuario=$query->fetch();
    
    $redireccionRegistro = './registro.php';
    if($usuario){
        if (password_verify($passwordUs, $usuario['contrasenia'])) {
          $_SESSION['usuario']=$usuario["nombre"].' '.$usuario["apellido"].' <br> '.$usuario["email"];
          $sessionInfo = $usuario['email']; 
          header("location: usuario.php");
        } else {
          
           echo '<script>
                  Swal.fire({
                    icon: "error",
                    title: "Contraseña incorrecta",
                    html: "<a href='.$redireccionRegistro.'>¿Ha olvidado su contraseña? </a>"
                  });                  
            </script>';
        }
    } else {
      echo '<script>
                  Swal.fire({
                    icon: "error",
                    title: "Email no registrado",
                    html: "Intentalo nuevamente o <a href='.$redireccionRegistro.'>crea una cuenta</a>"
                  });                  
            </script>';  
    }

}

?>
  <header>
    <div class="row p-2">
      <div class="navTop row">
        <a href="index.html" class="logo col col-4">
          <img src="img/greenBuddiesLogo.png" alt="Logo de Green Buddies">
        </a>
        <nav class="navMenu col-4">

          <ul class="navLinks">
            <li><a href="index.html" target="self">Inicio</a></li>
            <li class="navbar_tienda">
              <a class="nav-link dropdown-toggle p-1" id="navbar_desplegable" href="tienda.html" role="hover"
                data-bs-toggle="dropdown" aria-expanded="false">Tienda</a>
              <ul class="dropdown-menu" aria-labelledby="navbar_desplegable">
                <li><a class="elemento_desplegable" href="tienda.html">Todos los productos</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li><a class="elemento_desplegable" href="categorias/cuidado-personal.html">Cuidado personal</a></li>
                <li><a class="elemento_desplegable" href="categorias/hogar.html">Hogar</a></li>
                <li><a class="elemento_desplegable" href="categorias/mascotas.html">Mascotas</a></li>
              </ul>
            </li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="nosotros.html">Nosotros</a></li>
            <li><a href="contacto.html">Contacto</a></li>
          </ul>
        </nav>
        <ul class="headerUl col col-4 justify-content-end">
          <li><a href="login.php"><i class="fas fa-user"></i></a></li>
          <li class="cartBtn"><a href=""><i class="fas fa-shopping-cart"></i></a></li>
          <li class="hamMenu">
            <span class="hamTop"></span>
            <span class="hamMid"></span>
            <span class="hamBot"></span>
          </li>
        </ul>

      </div>

    </div>
  </header>

  <main class="forms">
    <form class="formulario_login container-md m-auto p-5 formularios formLogin needs-validation" action="login.php" method="POST" novalidate>
      <div class="text-center mb-5">
        <h2>¡Hola!</h2>
        <h4>Inicia sesión o <a href="registro.php">crea una cuenta</a></h4>
      </div>

      <div class="row g-3">
        <div class="col-md-12">
          <label for="validationDefault01" class="form-label">Correo *</label>
          <input type="email" class="form-control" id="validationDefault01" name="emailUs" value="" required>
        </div>

        <div class="col-md-12">
          <label for="validationDefault01" class="form-label">Contraseña *</label>
          <input type="password" class="form-control" id="validationDefault01" value="" name="passwordUs" required minlength="8">
        </div>

        <div class="col-md-12">
          <button class="btn btn-success submitBtn" type="submit" id="regSubmit">Ingresar</button>
          <a href="https://www.greenbuddies.netlify.app/auth/facebook" class="btn btn-facebook">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <span>Continuar con Facebook</span>
          </a>
          <a href="https://www.greenbuddies.netlify.app/auth/google" class="btn btn-google-plus">
            <i class="fab fa-google" aria-hidden="true"></i>
            <span>Continuar con Google</span>
          </a>
        </div>
        <div class="text-center mt-5">
          <p><a href="login.html">¿Olvidaste tu contraseña?</a></p>
        </div>
      </div>

    </form>

  </main>
  <footer>
    <div class="container short-footer">
      <ul class="row">
        <li class="col"><a href="">Términos y condiciones</a></li>
        <li class="col"><a href="">Política de privacidad</a></li>
        <li class="col"><a href="">Unirse a nosotros</a></li>
        <li class="col">Copyright © 2021 Green Buddies S.A</li>
      </ul>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="js/funcionesGrupo4.js"></script>
  




</body>

</html>