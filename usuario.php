<?php
session_start();
if(isset($_SESSION["usuario"])){
?>
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
  <title>Green Buddies | Acceder</title>
</head>

<body>
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
          <li class="hamMenu">
            <span class="hamTop"></span>
            <span class="hamMid"></span>
            <span class="hamBot"></span>
          </li>
        </ul>

      </div>

    </div>
  </header>

  <main class="forms" style="padding: 7rem;">
  <div class="datos_usuario container-md m-auto p-5 text-center">
      <img src="./img/userPic.png" alt="Imagen del usuario" class="py-3">
      <h4 class=""><?php echo $_SESSION['usuario']?></h4>
      <div class="row">
      <button type="button" class="btn btn-success">Mis pedidos</button>
      <a class="btn btn-danger" href="./salir.php">Cerrar sesión</a>
      </div>
  </div> 

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
  <script src="js/sweetalert2.all.min.js"></script>
  <!-- <script src="js/funcionesGrupo4.js"></script> -->

  <?php
  #Dentro de ese echo tendríamos que agregar el html que querramos en usuario y borrar el q está
  echo '<script>
                  Swal.fire({
                    icon: "success",
                    title: "Inicio de sesión exitoso",
                    //text: "Bienvenido, '.$_SESSION['usuario'].'"
                    text: "Bienvenido"

                  });

                  //setTimeout(() => {
                  //  window.location.pathname = "/greenBuddies/index.html";
                  //}, 3000);
            </script>';
  
  ?>


</body>

</html>
<?php
} else {
  header("location:login.php");
}
?>


