const CheckXS = document.getElementById("XS");
const CheckS = document.getElementById("S");
const CheckM = document.getElementById("M");
const CheckL = document.getElementById("L");
const CheckXL = document.getElementById("XL");
const CheckZapatilla = document.getElementById("tallaZapatilla");
const IdZapatilla= document.getElementsByClassName("idZapatilla");

const inputVisibleXS = document.getElementById("XS-invisible");
const inputVisibleS = document.getElementById("S-invisible");
const inputVisibleM = document.getElementById("M-invisible");
const inputVisibleL = document.getElementById("L-invisible");
const inputVisibleXL = document.getElementById("XL-invisible");
const inputVisibleZapatilla = document.getElementById("Zapatilla-invisible");


/**
 * La función "mostrarInputsTallas" agrega detectores de eventos a las casillas de verificación y muestra las correspondientes
 * Campos de entrada cuando las casillas de verificación están marcadas.
 */

function mostrarInputsTallas(){

    CheckXS.addEventListener("change", function () {
        if (CheckXS.checked) {
            inputVisibleXS.style.display = "";
        }
    });
    CheckS.addEventListener("change", function () {
        if (CheckS.checked) {
            inputVisibleS.style.display = "";
        }
    });
    CheckM.addEventListener("change", function () {
        if (CheckM.checked) {
            inputVisibleM.style.display = "";
        }
    });
    CheckL.addEventListener("change", function () {
        if (CheckL.checked) {
            inputVisibleL.style.display = "";
        }
    });
    CheckXL.addEventListener("change", function () {
        if (CheckXL.checked) {
            inputVisibleXL.style.display = "";
        } 
    });
    CheckZapatilla.addEventListener("change", function () {
        if (CheckZapatilla.checked) {
            inputVisibleZapatilla.style.display = "";
        }
    });
}


