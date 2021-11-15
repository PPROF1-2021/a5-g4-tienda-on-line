/* _______Menu hamburguesa________*/
const hamMenu = document.querySelector(".hamMenu");
const navLinks = document.querySelector(".navLinks");
const hamMenuBars = document.querySelectorAll('.hamMenu span');

hamMenu.addEventListener("click", () => {
  navLinks.classList.toggle("active");
  hamMenuBars.forEach(child => {child.classList.toggle('active')})
});

/* _______Validación de formularios________ Punto 1 y 2 IEFI Programación Web*/

const formularios = document.querySelector('.formularios');
const formSubmit = document.querySelector('.submitBtn');
let fechaNac = document.querySelector('#nacimientoRegis');

/* Punto 2 IEFI Programación Web 1 */
function calcularEdad() {
  let hoy = new Date();
  let anioActual = parseInt(hoy.getFullYear());
  let mesActual = parseInt(hoy.getMonth() + 1);
  let diaActual = parseInt(hoy.getDate());
  
  let anioNacimiento = parseInt(fechaNac.value.substring(0,4));
  let mesNacimiento = parseInt(fechaNac.value.substring(5,7));
  let diaNacimiento = parseInt(fechaNac.value.substring(8,10));

  let edad = anioActual - anioNacimiento;
  if (mesActual < mesNacimiento){
    edad--;
  } else if (mesActual === mesNacimiento && diaActual < diaNacimiento){
    edad--;
  }
  return edad;
}


function alertaEdad() {
  let fechaNac = document.querySelector('#nacimientoRegis');
  fechaNac.addEventListener('change', (e) => {
    if(calcularEdad()<18){
      
      Swal.fire({
        icon: 'error',
        title: "Lo siento",
        text: 'Debe tener +18 para poder registrarse'
      })
    }
  });
}

formSubmit.addEventListener("click", () => {
  formularios.classList.add("was-validated");
});  

if (window.location.pathname === "/registro.html" || window.location.pathname === "/a5-g4-tienda-on-line/Frontend/registro.html") {
  alertaEdad();
}

/* Procesado de datos enviados en los inputs del formulario de registro -- Punto 4 */
  
  function modalRegistro() {
    const formRegistro = document.getElementById("formRegistro");
    var regisModal = new bootstrap.Modal(document.getElementById('modalForm'), {
      keyboard: false
    });
    const regModalBody = document.querySelector("#modalForm .modal-body");
    const regisConfirm = document.getElementById("regisConfirm");
  
    let nombreUsuario = document.getElementById("nombreRegis");
    let apellidoUsuario = document.getElementById("apellidoRegis");
    let correoUsuario = document.getElementById("correoRegis");
    let nacimientoUsuario = document.getElementById("nacimientoRegis");
    let paisUsuario = document.getElementById("paisRegis");
    let provinciaUsuario = document.getElementById("provinciaRegis");
    let codPosUsuario = document.getElementById("cpRegis");
  
    formRegistro.addEventListener("submit", (e) => {
      e.preventDefault();
      regModalBody.innerHTML=
          `<ul class="modalRegistro">
              <li>Nombre: ${nombreUsuario.value}</li>
              <li>Apellido: ${apellidoUsuario.value}</li>
              <li>Correo: ${correoUsuario.value}</li>
              <li>Fecha de nacimiento: ${nacimientoUsuario.value}</li>
              <li>País: ${paisUsuario.value}</li>
              <li>Provincia: ${provinciaUsuario.value}</li>
              <li>Código Postal: ${codPosUsuario.value}</li>
          </ul>`
      ;
      regisModal.show();
    });
  
    regisConfirm.addEventListener("click", ()=> {window.location.pathname = "/login.html"}); 
    //Para probarlo en local hay que cambiar el pathname por "../Frontend/login.html"
        
  }

  if (window.location.pathname === "/registro.html" || window.location.pathname === "/a5-g4-tienda-on-line/Frontend/registro.html") {
    modalRegistro();
  }; 
  
/* Alerta tras envio de formulario de contacto -- Punto 3 IEFI Programacion Web 1 */
function alertaContacto () {
  const formContacto = document.querySelector("#formContacto");
  formContacto.addEventListener("submit", (e)=> {
    e.preventDefault();
    Swal.fire({
      icon: 'success',
      title: "Mensaje enviado correctamente",
      text: 'Responderemos su consulta a la brevedad',
      showConfirmButton: false,
    })
    setInterval(() => {
      window.location.pathname = "/index.html" // Para probar en local "/a5-g4-tienda-on-line/Frontend/index.html"
    }, 2500);
  })
}

if (window.location.pathname === "/contacto.html" || window.location.pathname === "/a5-g4-tienda-on-line/Frontend/contacto.html") {alertaContacto()}; 


