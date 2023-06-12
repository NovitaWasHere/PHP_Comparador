function validarInput(input) {
    if (input.value == "") {
        input.style.border = "2px solid #ff6f69";
        input.style.backgroundImage = "url('../img/inputMal.png')"
    } else {
        input.style.border = "2px solid #96ceb4";
        input.style.backgroundImage = "url('../img/inputBien.png')"
    }
}

function esMismaContrasenia(inputComprobar1, inputComprobar2) {
    let esMisma = false;
    if (inputComprobar1.value == inputComprobar2.value) {
        esMisma = true;
    }
    return esMisma;
}

window.onload = function () {
    if (window.location.href.includes("crudUsuarios.php?accion=listarUsuario")) {
        fetch('jsons.php?modo=todosUsuarios')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                let tablaUsuarios = "";
                for (let x = 0; x < data.length; x++) {
                    tablaUsuarios += '<div>' + data[x].idUsuario + '</div>' +
                        '<div>' + data[x].email + '</div>' +
                        '<div>' + data[x].nombre + '</div>' +
                        '<div>' + data[x].contra + '</div>';
                    if (data[x].esAdmin == 1) {
                        tablaUsuarios += "<div>Sí</div>";
                    } else {
                        tablaUsuarios += "<div>No</div>";
                    }
                    tablaUsuarios += "<div><a class='botonEditar' href='crudUsuarios.php?accion=editarUsuario&idUsuario=" + data[x].idUsuario + "'>Editar</a></div>" +
                        "<div><a class='botonEliminar' href='crudUsuarios.php?accion=listarUsuario&idUsuario=" + data[x].idUsuario + "'>Eliminar</a></div>";
                }
                document.getElementsByClassName("gridUsuarios")[0].innerHTML += tablaUsuarios;
            });
    } else {
        let inputCorreo = document.getElementById("inputCorreo");
        inputCorreo.addEventListener("input", () => {
            validarInput(inputCorreo)
        });
        let inputNombre = document.getElementById("inputNombre");
        inputNombre.addEventListener("input", () => {
            validarInput(inputNombre)
        });
        let inputContra1 = document.getElementById("inputContra1");
        let inputContra2 = document.getElementById("inputContra2");

        let botonRegistrar = document.getElementById("botonRegistrar");
        inputContra2.addEventListener("input", function () {
            let esMisma = esMismaContrasenia(inputContra1, inputContra2);
            if (!esMisma && inputCorreo != null && inputContra1 != null && inputContra2 != null && inputNombre != null) {
                inputContra1.style.backgroundImage = "url('../img/inputMal.png')";
                inputContra2.style.backgroundImage = "url('../img/inputMal.png')";
                inputContra1.style.border = "2px solid #ff6f69";
                inputContra2.style.border = "2px solid #ff6f69";
                botonRegistrar.disabled = true;
                document.getElementById("errorContra").style.display = "block";
            } else {
                inputContra1.style.backgroundImage = "url('../img/inputBien.png')";
                inputContra2.style.backgroundImage = "url('../img/inputBien.png')";
                inputContra1.style.border = "2px solid #96ceb4";
                inputContra2.style.border = "2px solid #96ceb4";
                botonRegistrar.disabled = false;
                document.getElementById("errorContra").style.display = "none";
            }
        })
    }
}