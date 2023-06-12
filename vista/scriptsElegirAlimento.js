window.onload = function () {
    let chart0 = null;
    let chart1 = null;
    let chart2 = null;
    let chart3 = null;
    let chart4 = null;
    let chart5 = null;
    let chart6 = null;
    let chart7 = null;
    let urlParams = new URLSearchParams(window.location.search);
    let accion = urlParams.get('accion');
    if (accion == 'listarAlimento') {
        fetch('jsons.php?modo=todosAlimentos')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                let tablaAlimentos = "";
                for (let x = 0; x < data.length; x++) {
                    tablaAlimentos += '<div>' + data[x].idAlimento + '</div>' +
                        '<div>' + data[x].nombre + '</div>' +
                        '<div>' + data[x].hidratosTotales + ' g</div>' +
                        '<div>' + data[x].azucares + ' g</div>' +
                        '<div>' + data[x].grasasTotales + ' g</div>' +
                        '<div>' + data[x].grasasSaturadas + ' g</div>' +
                        '<div>' + data[x].proteinas + ' g</div>' +
                        '<div>' + data[x].valorEnergetico + ' kcal</div>';

                    if (data[x].idTipo == 1) {
                        tablaAlimentos += '<div>🥛</div>';
                    } else if (data[x].idTipo == 2) {
                        tablaAlimentos += '<div>🥚</div>';
                    } else if (data[x].idTipo == 3) {
                        tablaAlimentos += '<div>🥩</div>';
                    } else if (data[x].idTipo == 4) {
                        tablaAlimentos += '<div>🦞🐊🐟</div>';
                    } else if (data[x].idTipo == 5) {
                        tablaAlimentos += '<div>🧈</div>';
                    } else if (data[x].idTipo == 6) {
                        tablaAlimentos += '<div>🥣</div>';
                    } else if (data[x].idTipo == 7) {
                        tablaAlimentos += '<div>🫘🌰🥜</div>';
                    } else if (data[x].idTipo == 8) {
                        tablaAlimentos += '<div>🫑🥬🥔</div>';
                    } else if (data[x].idTipo == 9) {
                        tablaAlimentos += '<div>🍉🍋🍎</div>';
                    } else if (data[x].idTipo == 10) {
                        tablaAlimentos += '<div>🍫🍬🍨</div>';
                    } else if (data[x].idTipo == 11) {
                        tablaAlimentos += '<div>🥤💧</div>';
                    } else if (data[x].idTipo == 12) {
                        tablaAlimentos += '<div>🥘🥙🍞</div>';
                    }
                    tablaAlimentos += "<div><a class='botonEditar' href='crudUsuarios.php?accion=editarAlimentos&idAlimento=" + data[x].idAlimento + "'>Editar</a></div>" +
                        "<div><a class='botonEliminar' href='crudUsuarios?accion=listarAlimento&idAlimento=" + data[x].idAlimento + "'>Eliminar</a></div>";
                }
                document.getElementsByClassName("gridAlimentos")[0].innerHTML += tablaAlimentos;
            });

    } else if (window.location.href.includes("elegirAlimento.php") || accion == "registrarAlimento" || accion == "editarAlimento") {
        fetch("jsons.php?modo=todosTipos")
            .then(respuesta => respuesta.json())
            .then(datos => {
                console.log(datos);
                let selectTipo = "";
                for (let x = 0; x < datos.length; x++) {
                    selectTipo += '<option value="' + datos[x].idTipo + '">' + datos[x].nombre + '</option>'
                }
                if (accion == 'registrarAlimento') {
                    document.getElementById("tipoAlimento1").innerHTML = selectTipo;
                } else {
                    document.getElementById("elegirTipo1").innerHTML += selectTipo;
                    document.getElementById("elegirTipo2").innerHTML += selectTipo;
                }
            })
        if (window.location.href.includes("elegirAlimento.php")) {
            document.getElementsByClassName("Estadisticas")[0].style.display = "none";
            document.getElementsByClassName("TitCan")[0].style.display = "none";
            document.getElementsByClassName("alimento1")[0].style.display = 'none';
            document.getElementsByClassName("alimento2")[0].style.display = 'none';
            //document.getElementsByClassName("Estadisticas")[0].style.display = 'none';
            console.log("Estas en elegirAlimento")
            let formTipos = document.getElementById("formTipos");
            formTipos.addEventListener("submit", function (evento) {
                document.getElementsByClassName("Estadisticas")[0].style.display = "none";
                document.getElementsByClassName("TitCan")[0].style.display = "none";
                evento.preventDefault();
                let formData = new FormData(evento.target);
                fetch("jsons.php?modo=alimento1PorTipo&modo2=alimento2PorTipo", {method: "POST", body: formData})
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                        let tipo1 = datos[0].idTipo;
                        let arrayTipo1 = [];
                        let arrayTipo2 = [];
                        for (let x = 0; x < datos.length; x++) {
                            if (datos[x].idTipo == tipo1) {
                                arrayTipo1.push(datos[x]);
                            } else {
                                arrayTipo2.push(datos[x]);
                            }
                        }
                        let selectAlimentos = '<option value="0">Elegir alimento</option>';
                        for (let x = 0; x < arrayTipo1.length; x++) {
                            selectAlimentos += '<option>' + arrayTipo1[x].nombre + '</option>'
                        }
                        document.getElementById("elegirAlimento1").innerHTML = selectAlimentos;
                        document.getElementById("elegirAlimento1").addEventListener("change", function () {
                            let valorSelect1 = 0;
                            for (let x = 0; x < arrayTipo1.length; x++) {
                                if (arrayTipo1[x].nombre == document.getElementById("elegirAlimento1").value) {
                                    valorSelect1 = x;
                                }
                            }
                            document.getElementsByClassName("alimento1")[0].style.display = 'block';
                            document.getElementById("imagenComida1").src = arrayTipo1[valorSelect1].urlFoto;
                            document.getElementById("tituloComida1").innerHTML = arrayTipo1[valorSelect1].nombre;
                            document.getElementById("hidratosTot1").innerHTML = arrayTipo1[valorSelect1].hidratosTotales + 'g';
                            document.getElementById("azucares1").innerHTML = arrayTipo1[valorSelect1].azucares + 'g';
                            document.getElementById("grasasTot1").innerHTML = arrayTipo1[valorSelect1].grasasTotales + 'g';
                            document.getElementById("grasasSat1").innerHTML = arrayTipo1[valorSelect1].grasasSaturadas + 'g';
                            document.getElementById("proteinas1").innerHTML = arrayTipo1[valorSelect1].proteinas + 'g';
                            document.getElementById("vEnergetico1").innerHTML = arrayTipo1[valorSelect1].valorEnergetico + '     kcal';
                        })


                        document.getElementsByClassName("alimento1")[0].style.display = 'none';
                        document.getElementsByClassName("alimento2")[0].style.display = 'none';

                        let selectAlimentos2 = '<option value="0">Elegir alimento</option>';
                        for (let x = 0; x < arrayTipo2.length; x++) {
                            selectAlimentos2 += '<option>' + arrayTipo2[x].nombre + '</option>'
                        }

                        document.getElementById("elegirAlimento2").innerHTML = selectAlimentos2;
                        document.getElementById("elegirAlimento2").addEventListener("change", function () {
                            let valorSelect2 = 0;
                            for (let x = 0; x < arrayTipo2.length; x++) {
                                if (arrayTipo2[x].nombre == document.getElementById("elegirAlimento2").value) {
                                    valorSelect2 = x;
                                }
                            }
                            document.getElementsByClassName("alimento2")[0].style.display = 'block';
                            document.getElementById("imagenComida2").src = arrayTipo2[valorSelect2].urlFoto;
                            document.getElementById("tituloComida2").innerHTML = arrayTipo2[valorSelect2].nombre;
                            document.getElementById("hidratosTot2").innerHTML = arrayTipo2[valorSelect2].hidratosTotales + 'g';
                            document.getElementById("azucares2").innerHTML = arrayTipo2[valorSelect2].azucares + 'g';
                            document.getElementById("grasasTot2").innerHTML = arrayTipo2[valorSelect2].grasasTotales + 'g';
                            document.getElementById("grasasSat2").innerHTML = arrayTipo2[valorSelect2].grasasSaturadas + 'g';
                            document.getElementById("proteinas2").innerHTML = arrayTipo2[valorSelect2].proteinas + 'g';
                            document.getElementById("vEnergetico2").innerHTML = arrayTipo2[valorSelect2].valorEnergetico + ' kcal';
                        })
                    })
            })
        }

        let formGrafica = document.getElementById("formAlimentos");
        formGrafica.addEventListener("submit", function (evento) {
            document.getElementsByClassName("TitCan")[0].style.display = "block"
            evento.preventDefault();
            document.getElementsByClassName("Estadisticas")[0].style.display = 'grid';
            let formData1 = new FormData(evento.target);
            fetch('jsons.php?modo=comparacion&modo2=comparaciones', {method: "POST", body: formData1})
                .then(respuesta => respuesta.json())
                .then(data => {
                    console.log(data);
                    //Hidratos

                    let PH = parseFloat(data[0].hidratosTotales) + parseFloat(data[1].hidratosTotales);
                    let H1 = parseFloat(data[0].hidratosTotales) * 100 / PH;
                    let H2 = parseFloat(data[1].hidratosTotales) * 100 / PH;

                    //Azucares

                    let PA = parseFloat(data[0].azucares) + parseFloat(data[1].azucares);
                    let A1 = parseFloat(data[0].azucares) * 100 / PA;
                    let A11 = parseFloat(data[0].azucares) * 100 / 100;
                    let A2 = parseFloat(data[1].azucares) * 100 / PA;

                    //Fibras

                    let FH1 = parseFloat(data[0].hidratosTotales) - parseFloat(data[0].azucares);
                    let FH2 = parseFloat(data[1].hidratosTotales) - parseFloat(data[1].azucares);
                    //console.log(FH1 + "   " + FH2);

                    //Grasas Totales

                    let PG = parseFloat(data[0].grasasTotales) + parseFloat(data[1].grasasTotales);
                    let G1 = parseFloat(data[0].grasasTotales) * 100 / PG;
                    let G2 = parseFloat(data[1].grasasTotales) * 100 / PG;

                    //Grasas Saturadas

                    let PGS = parseFloat(data[0].grasasSaturadas) + parseFloat(data[1].grasasSaturadas);
                    let GS1 = parseFloat(data[0].grasasSaturadas) * 100 / PGS;
                    let GS2 = parseFloat(data[1].grasasSaturadas) * 100 / PGS;

                    //Grasas No Saturadas

                    let GH1 = parseFloat(data[0].grasasTotales) - parseFloat(data[0].grasasSaturadas);
                    let GH2 = parseFloat(data[1].grasasTotales) - parseFloat(data[1].grasasSaturadas);
                    //console.log(GH1 + "   " + GH2);

                    //Proteinas

                    let PP = parseFloat(data[0].proteinas) + parseFloat(data[1].proteinas);
                    let P1 = parseFloat(data[0].proteinas) * 100 / PP;
                    let P2 = parseFloat(data[1].proteinas) * 100 / PP;

                    //Valor Energetico

                    let PVE = parseFloat(data[0].valorEnergetico) + parseFloat(data[1].valorEnergetico);
                    let VE1 = parseFloat(data[0].valorEnergetico) * 100 / PVE;
                    let VE2 = parseFloat(data[1].valorEnergetico) * 100 / PVE;


                    var ctx = document.getElementById('myChart');
                    if (chart0) {
                        chart0.destroy();
                    }
                    chart0 = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [H1, H2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: {responsive: true}
                    });
                    var ctx1 = document.getElementById('myChart1');
                    if (chart1) {
                        chart1.destroy();
                    }
                    chart1 = new Chart(ctx1, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [A1, A2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: {responsive: true}
                    });
                    let ctx2 = document.getElementById('myChart2');
                    if (chart2) {
                        chart2.destroy();
                    }
                    chart2 = new Chart(ctx2, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [G1, G2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: {responsive: true}
                    });
                    let ctx3 = document.getElementById('myChart3');
                    if (chart3) {
                        chart3.destroy();
                    }
                    chart3 = new Chart(ctx3, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [GS1, GS2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: {responsive: true}
                    });
                    let ctx4 = document.getElementById('myChart4');
                    if (chart4) {
                        chart4.destroy();
                    }
                    chart4 = new Chart(ctx4, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [P1, P2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: {responsive: true}
                    });
                    let ctx5 = document.getElementById('myChart5');
                    if (chart5) {
                        chart5.destroy();
                    }
                    chart5 = new Chart(ctx5, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [VE1, VE2],
                                backgroundColor: ['rgb(219, 56, 56)', 'rgb(78, 196, 84)'],
                                label: 'Comparacion de Platos'
                            }],
                            labels: [document.getElementById("tituloComida1").innerHTML, document.getElementById("tituloComida2").innerHTML]
                        },
                        options: {responsive: true}
                    });
                    let ctx6 = document.getElementById('myChart6');
                    if (chart6) {
                        chart6.destroy();
                    }
                    Totales = FH1 + A1 + GH1 + GS1 + P1
                    Total1 = FH1 * 100 / Totales
                    Total2 = A1 * 100 / Totales
                    Total3 = GH1 * 100 / Totales
                    Total4 = GS1 * 100 / Totales
                    Total5 = P1 * 100 / Totales
                    chart6 = new Chart(ctx6, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [Total1, Total2, Total3, Total4, Total5],
                                backgroundColor: ['rgba(0, 255, 0, 1)', 'rgba(255, 153, 0, 1)', 'rgba(0, 153, 255, 1)', 'rgba(255, 0, 0, 1)', 'rgba(153, 0, 255, 1)'],
                                label: 'Comparación de Platos'
                            }],
                            labels: ['Fibras', 'Azúcares', 'Grasas No Saturadas', 'Grasas Saturadas', 'Proteinas']
                        },
                        options: {responsive: true}
                    });
                    let ctx7 = document.getElementById('myChart7');
                    if (chart7) {
                        chart7.destroy();
                    }
                    Totales2 = FH2 + A2 + GH2 + GS2 + P2
                    Total12 = FH2 * 100 / Totales2
                    Total22 = A2 * 100 / Totales2
                    Total32 = GH2 * 100 / Totales2
                    Total42 = GS2 * 100 / Totales2
                    Total52 = P2 * 100 / Totales2
                    chart7 = new Chart(ctx7, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [Total12, Total22, Total32, Total42, Total52],
                                backgroundColor: ['rgba(0, 255, 0, 1)', 'rgba(255, 153, 0, 1)', 'rgba(0, 153, 255, 1)', 'rgba(255, 0, 0, 1)', 'rgba(153, 0, 255, 1)'],
                                label: 'Comparación de Platos'
                            }],
                            labels: ['Fibras', 'Azúcares', 'Grasas No Saturadas', 'Grasas Saturadas', 'Proteinas']
                        },
                        options: {responsive: true}
                    });

                })

        })
    }
}