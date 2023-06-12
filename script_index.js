window.onload = function () {

    // Script para Submenu
    let desplegable = document.getElementById("desplegable");

    desplegable.addEventListener("mouseover", function () {

        document.getElementById("submenu").style.display = "block";

    })

    desplegable.addEventListener("mouseout", function () {

        document.getElementById("submenu").style.display = "none";

    })

}