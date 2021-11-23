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
  <title>Green Buddies | Registro</title>
</head>

<body>
  
<?php

if($_POST){
    require('./conexion.php');
    session_start();
    
    //Links, para evitar el problema de las comillas dobles y simples
    $loginLink = '"./login.php"';

    //Valida que los campos no estén vacíos, como segunda medida si el usuario intenta con la DevTools
    //quitarle el atributo required a los inputs del formulario de registro
    if(!empty($_POST['nombreUs']) && !empty($_POST['apellidoUs']) && !empty($_POST['passwordUs'])
       && !empty($_POST['emailUs']) && !empty($_POST['nacimientoUs']) && !empty($_POST['paisUs'])) {
      $nombreUs = $_POST['nombreUs'];
      $apellidoUs=$_POST['apellidoUs'];
      $passwordUs=password_hash($_POST['passwordUs'],PASSWORD_BCRYPT);
      $emailUs=$_POST['emailUs'];
      $nacimientoUs=$_POST['nacimientoUs'];
      $paisUs=$_POST['paisUs'];

      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      

      //Validación para que no exista más de 1 usuario con el mismo email
      $query = $conexion->prepare('SELECT * FROM usuarios WHERE email = :emailUs');
      $query->bindParam(":emailUs",$emailUs);
      $query->execute();

      if($query->rowCount() > 0){
        echo '
          <script>
            Swal.fire({
              icon: "error",
              title: "El email ingresado ya existe.",
            });
          </script>';
      } else {
        $emailPreexistente = '';

        //Inserción del usuario como registro de la tabla usuarios
        $query=$conexion->prepare('INSERT INTO usuarios VALUES (default, :nombreUs, :emailUs, :apellidoUs, :passwordUs, :nacimientoUs, :paisUs, null, null, null);');
        
        $query->bindParam(":nombreUs", $nombreUs);
        $query->bindParam(":emailUs", $emailUs);
        $query->bindParam(":apellidoUs", $apellidoUs);
        $query->bindParam(":passwordUs", $passwordUs);
        $query->bindParam(":nacimientoUs", $nacimientoUs);
        $query->bindParam(":paisUs", $paisUs);
        $query->execute();
        $result = $query;

        if($result) {
          echo '
            <script>
              Swal.fire({
                icon: "success",
                title: "Cuenta creada con éxito",
              });
              setTimeout(() => {
                window.location.pathname = "greenBuddies/login.php"  
              }, 2000);
            </script>
          ';
        } else {
          echo '
            <script>
              Swal.fire({
                icon: "error",
                title: "Ha ocurrido un error inesperado, intente nuevamente",
              });   
            </script>
          ';
        }

      }
      
    } else {
      echo '
        Swal.fire({
          icon: "error",
          title: "No pueden haber campos vacíos",
        });  
      ';
    };
};

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
    <form class="formulario_registro container-md m-auto p-5 formularios needs-validation" id="formRegistro" action="registro.php" method="POST" novalidate>
      <div class="text-center mb-5">
        <h2>Crear una cuenta</h2>
      </div>

      <div class="row g-3">
        <div class="col-md-12">
          <label for="nombreRegis" class="form-label">Nombre *</label>
          <input name="nombreUs" type="text" class="form-control" id="nombreRegis" required minlength="2" maxlength="24">
          <div class="invalid-feedback">
          Este campo es obligatorio
          </div>
        </div>

        <div class="col-md-12">
          <label for="apellidoRegis" class="form-label">Apellido *</label>
          <input name="apellidoUs" type="text" class="form-control" id="apellidoRegis" value="" required minlength="2" maxlength="24">
          <div class="invalid-feedback">
          Este campo es obligatorio
          </div>
        </div>

        <div class="col-md-12">
          <label for="contraseniaRegis" class="form-label">Contraseña *</label>
          <input name="passwordUs" type="password" class="form-control" id="contraseniaRegis" value="" required minlength="8">
          <div class="invalid-feedback">
          La contraseña debe tener al menos 8 caracteres
          </div>
        </div>

        <div class="col-md-12" id="correo-msg">
          <label for="correoRegis" class="form-label">Correo *</label>
          <input name="emailUs" type="email" class="form-control" id="correoRegis" value="" required>
          <div class="invalid-feedback">
          Ingrese un correo electrónico válido
          </div>
          <?php #echo $emailPreexistente ?>
        </div>

        <div class="col-md-6">
          <label for="nacimientoRegis" class="form-label">Fecha de nacimiento</label>
          <input name="nacimientoUs" type="date" class="form-control" id="nacimientoRegis" min="1930-01-01" max="2018-01-01" required>
          <div class="invalid-feedback">
          Este campo es obligatorio
          </div>
        </div>

        <div class="col-md-6">
          <label for="paisRegis" class="form-label">País</label>
            <select name="paisUs" class="form-select" aria-label="Default select example">
              <option selected value="1">Argentina</option>
              <option value="2">Bolivia</option>
              <option value="3">Brasil</option>
              <option value="4">Chile</option>
              <option value="5">Paraguay</option>
              <option value="6">Uruguay</option>
          </select>
        </div>

        <div class="col-12 text-center">
          <button class="btn btn-success submitBtn" type="submit" id="regSubmit" data-bs-target="#modalForm">Registrarse</button>
        </div>

        <div class="text-center">
          <p><a href="login.php">Ya tengo una cuenta</a></p>
        </div>
      </div>

    </form>

    <!-- Modal -->
  <div>
    <div class="modal fade" id="modalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">¿Está seguro que sus datos son correctos?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
            <button type="button" class="btn btn-success" id="regisConfirm">Confirmar y enviar</button>
          </div>
        </div>
      </div>
    </div>
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
  <script src="js/funcionesGrupo4.js"></script>

</body>

</html>