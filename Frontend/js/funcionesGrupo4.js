  
  /* Inicio de sesión */
  
  function modalRegistro() {
    const formRegistro = document.getElementById("formRegistro");
    const regSubmit = document.getElementById("regSubmit");
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
  
    regisConfirm.addEventListener("click", ()=> {window.location.href = "../Frontend/login.html"});
    
  }
  
  modalRegistro();