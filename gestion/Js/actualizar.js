/* El código está comprobando si el valor del parámetro de consulta 'página' es igual a 0. Si es así, entonces el
Se llama a la función 'getData()'. */
if (parseInt(getParameterByName('pagina')) === 0) {
    getData();
}
document.getElementById("campo").addEventListener("input", getData);
/**
 * La función 'getData' envía una solicitud POST a dos URLs diferentes con datos de formulario que contienen un
 * de un campo de entrada y, a continuación, actualiza el contenido de dos elementos HTML diferentes con el atributo
 * Datos de respuesta.
 */
function getData() {
    let entrada = document.getElementById("campo").value;
    let contenido = document.getElementById("contenido");
    let contenido1 = document.getElementById("contenido1");
    let url1 = "http://localhost/inicio/gestion/funciones/actualizarProductos.php"; 
    let url2 = "http://localhost/inicio/gestion/funciones/actualizarUsuarios.php"; 
    let formData = new FormData();
    formData.append('campo', entrada);
    fetch(url1, {
        method: "POST",
        body: formData
    }).then(response => response.json())
    .then(data1 => {
        contenido.innerHTML = data1;
    })
    .catch(err => console.log(err));
    fetch(url2, {
         method: "POST",
         body: formData
    })
    .then(response => response.json())
    .then(data2 => {
        contenido1.innerHTML = data2;
    })
    .catch(err => console.log(err));
}

/**
 * La función 'getParameterByName' es una función de JavaScript que recupera el valor de un valor especificado
 * de la cadena de consulta de la URL.
 * @param name: el parámetro 'name' es el nombre del parámetro de consulta del que desea recuperarse
 * la URL.
 * @returns el valor del parámetro especificado por el parámetro "name" en la cadena de consulta de URL.
 */

function getParameterByName(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}


/* /* Este código agrega un detector de eventos al elemento con el id "editar". Cuando el botón está
Al hacer clic, el código verifica el estilo de visualización actual del elemento con el ID "formulario-editar".
Si el estilo de visualización es "ninguno" o una cadena vacía, significa que el formulario está oculto actualmente.
En este caso, el código establece el estilo de visualización en "none" en
ocultar el formulario y registra "Formulario oculto" en la consola. */

const botonMostrar = document.getElementById("editar");
const formularioEditar = document.getElementById("formulario-editar");
botonMostrar.addEventListener("click", function() {
    if (formularioEditar.style.display === "none" || formularioEditar.style.display === "") {
        console.log("Formulario mostrado");
        formularioEditar.style.display = "block";
    } else {
        console.log("Formulario oculto");
        formularioEditar.style.display = "none";
    }
});
/*Este código está agregando un detector de eventos al elemento con el id "eliminar".
Cuando se hace clic en el botón, el código comprueba el estilo de visualización actual del elemento con el id
"formulario-eliminar". Si el estilo de visualización es "ninguno" o una cadena vacía, significa que el formulario es
actualmente oculto. En este caso, el código establece el estilo de visualización en "block" para mostrar el formulario y los registros
"Formulario mostrado" a la consola. Si el estilo de visualización no es "ninguno" o una cadena vacía,
significa que el formulario está visible actualmente. En este caso, el código establece el estilo de visualización en "ninguno" para ocultar
el formulario y registra "Formulario oculto" en la consola. */


const formularioEliminar = document.getElementById("formulario-eliminar");
const botonEliminar = document.getElementById("eliminar");
botonEliminar.addEventListener("click", function() {
    if (formularioEliminar.style.display === "none" || formularioEliminar.style.display === "") {
        console.log("Formulario mostrado");
        formularioEliminar.style.display = "block";
    } else {
        console.log("Formulario oculto");
        formularioEliminar.style.display = "none";
    }
});

