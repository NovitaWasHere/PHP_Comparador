function validarInput(input) {
    if (input.value == "") {
        input.style.border = "2px solid #ff6f69";
        input.style.backgroundImage = "url('../img/inputMal.png')"
    } else {
        input.style.border = "2px solid #96ceb4";
        input.style.backgroundImage = "url('../img/inputBien.png')"
    }
}

window.onload = function () {
    let inputNombre = document.getElementById("inputNombre");
    inputNombre.addEventListener("input", () => {
        validarInput(inputNombre)
    });
    let inputContra1 = document.getElementById("inputContra1");
    inputContra1.addEventListener("input", () => {
        validarInput(inputContra1)
    });
}