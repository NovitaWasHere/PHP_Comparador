window.onload = function () {

    /*
    let desplegable= document.getElementById("desplegable");
    let invisible= document.getElementById("invisible");

    desplegable.addEventListener("mouseover" , function(){

        document.getElementById("submenu").style.visibility="visible";
        invisible.style.display="block";

    })

    desplegable.addEventListener("mouseout" , function(){

        document.getElementById("submenu").style.visibility="hidden";
        invisible.style.display="none";

    })
    */


    // Obtiene la etiqueta del canvas del gráfico
    const chartCanvas = document.querySelector('#section2');

// Opciones para el IntersectionObserver
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    };

// Función que se ejecuta cuando el canvas del gráfico está en el viewport
    const callback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Añade una clase para que se produzca la animación CSS
                chartCanvas.classList.add('Block-animation');

                // Detiene el observer después de que se ha producido la animación
                observer.unobserve(entry.target);
            }
        });
    };

// Crea un nuevo IntersectionObserver
    const observer = new IntersectionObserver(callback, options);

// Observa el canvas del gráfico
    observer.observe(chartCanvas);

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [60, 40],
                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                label: 'Comparacion de Platos'
            }],
            labels: ['Plato N°1', 'Plato N°2']
        },
        options: {responsive: true}
    });

}
