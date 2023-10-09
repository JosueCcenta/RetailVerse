if (parseInt(getParameterByName('pagina')) === 0) {
    getData();
}
document.getElementById("campo").addEventListener("input", getData);
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

function getParameterByName(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}


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

