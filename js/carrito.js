/* Este código recupera el valor de la clave "productos-en-carrito" del objeto localStorage y
almacenándolo en la variable 'productosEnCarrito'. El valor recuperado de localStorage es una cadena,
por lo que 'JSON.parse()' se usa para convertirlo en un objeto JavaScript. */

let productosEnCarrito = localStorage.getItem("productos-en-carrito");
productosEnCarrito = JSON.parse(productosEnCarrito);

const contenedorCarritoVacio = document.querySelector("#carrito-vacio");
const contenedorCarritoProductos = document.querySelector(".carrito-productos");
const contenedorCarritoAcciones = document.querySelector("#carrito-acciones");
const contenedorCarritoComprado = document.querySelector("#carrito-comprado");
let botonesEliminar = document.querySelectorAll(".carrito-producto-eliminar");
const botonVaciar = document.querySelector("#carrito-acciones-vaciar");
const contenedorTotal = document.querySelector("#total");
const botonComprar = document.querySelector("#carrito-acciones-comprar");


/**
 * La funcion "cargarProductosCarrito" es responsable de cargar los productos del carrito de compras 
 * y actualizar los respectivos elementos en HTML.
 */
function cargarProductosCarrito() {
    if (productosEnCarrito) {

        contenedorCarritoVacio.classList.add("disabled");
        contenedorCarritoProductos.classList.remove("disabled");
        contenedorCarritoAcciones.classList.remove("disabled");
        contenedorCarritoComprado.classList.add("disabled");
    
        contenedorCarritoProductos.innerHTML = "";
    
        productosEnCarrito.forEach(producto => {
    
            const div = document.createElement("div");
            div.classList.add("carrito-producto");
            div.innerHTML = `
                <img class="carrito-producto-imagen" src="${producto.imagen}" alt="${producto.titulo}">
                <div class="carrito-producto-titulo">
                    <small>Título</small>
                    <h3>${producto.titulo}</h3>
                </div>
                <div class="carrito-producto-cantidad">
                    <small>Cantidad</small>
                    <p>${producto.cantidad}</p>
                </div>
                <div class="carrito-producto-precio">
                    <small>Precio</small>
                    <p>$${producto.precio}</p>
                </div>
                <div class="carrito-producto-subtotal">
                    <small>Subtotal</small>
                    <p>$${producto.precio * producto.cantidad}</p>
                </div>
                <button class="carrito-producto-eliminar" id="${producto.id}"><i class="bi bi-trash-fill"></i></button>
            `;
            //aca agrega los productos
            contenedorCarritoProductos.append(div);
        })
    
    actualizarBotonesEliminar();
    actualizarTotal();
	
    } else {
        contenedorCarritoVacio.classList.remove("disabled");
        contenedorCarritoProductos.classList.add("disabled");
        contenedorCarritoAcciones.classList.add("disabled");
        contenedorCarritoComprado.classList.add("disabled");
    }

}

cargarProductosCarrito();

/**
 * La funcion "actualizarBotonesEliminar" agrega detectores de evento a todos los elementos con la clase
 * "carrito-producto-eliminar" para activar la funcion "eliminarDelCarrito" cuando se clickea.
 */
function actualizarBotonesEliminar() {
    botonesEliminar = document.querySelectorAll(".carrito-producto-eliminar");

    botonesEliminar.forEach(boton => {
        boton.addEventListener("click", eliminarDelCarrito);
    });
}

/**
 * La funcion `eliminarDelCarrito` remueve un producto del carrito de compras, muestra tambien una notificacion,
 * Actualiza la visualización del carro y guarda el carro actualizado en el almacenamiento local.
 * @param e - El parámetro "e" es un objeto de evento que representa el evento que desencadenó la
 *función. Se usa comúnmente en controladores de eventos para acceder a información sobre el evento, como el
 * elemento de destino o cualquier dato asociado con el evento. En este caso, se utiliza para obtener el id del archivo
 * botón que se utilizara para buscar el index del producto del carrito.
 */
function eliminarDelCarrito(e) {
    
    Toastify({
        text: "Producto eliminado",
        duration: 3000,
        close: true,
        gravity: "top", 
        position: "right", 
        stopOnFocus: true, 
        style: {
          background: "linear-gradient(to right, #4b33a8, #785ce9)",
          borderRadius: "2rem",
          textTransform: "uppercase",
          fontSize: ".75rem"
        },
        offset: {
            x: '1.5rem', 
            y: '1.5rem' 
          },
        onClick: function(){} 
    }).showToast();

    const idBoton = e.currentTarget.id;
    const index = productosEnCarrito.findIndex(producto => producto.id === idBoton);
    
    productosEnCarrito.slice(index, 1);
    cargarProductosCarrito();

    localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));

}

/* El código 'botonVaciar.addEventListener("click", vaciarCarrito);' está agregando un detector de eventos a la carpeta
'botonVaciar'. Escucha un evento de clic en el elemento y, cuando se produce el evento,
llama a la función 'vaciarCarrito'. Esto permite que la función 'vaciarCarrito' se ejecute cuando el
se hace clic en el botón. */
botonVaciar.addEventListener("click", vaciarCarrito);

/**
 * La función "vaciarCarrito" avisa al usuario con un mensaje de confirmación y si se confirma, se vacía
 * el carrito de compras y actualiza el almacenamiento local y la interfaz de usuario.
 */
function vaciarCarrito() {

    Swal.fire({
        title: '¿Estás seguro?',
        icon: 'question',
        html: `Se van a borrar ${productosEnCarrito.reduce((acc, producto) => acc + producto.cantidad, 0)} productos.`,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText: 'Sí',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            productosEnCarrito.length = 0;
            localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));
            cargarProductosCarrito();
        }
      })
}


/**
 * La función "actualizarTotal" calcula el precio total de los productos en un carrito de compras y actualiza
 * La visualización total.
 */
function actualizarTotal() {
    const totalCalculado = productosEnCarrito.reduce((acc, producto) => acc + (producto.precio * producto.cantidad), 0);
    total.innerText = `$${totalCalculado}`;
}

/* El código 'botonComprar.addEventListener("click", comprarCarrito);' está agregando un detector de eventos a
el elemento 'botonComprar'. Escucha un evento de clic en el elemento y, cuando se produce el evento,
llama a la función 'comprarCarrito'. Esto permite ejecutar la función 'comprarCarrito'
cuando se hace clic en el botón. */

botonComprar.addEventListener("click", comprarCarrito);

/**
 * La función "comprarCarrito" borra el carrito de compras, actualiza el almacenamiento local y oculta/muestra
 * Los elementos apropiados en la página.
 */
function comprarCarrito() {

    productosEnCarrito.length = 0;
    localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));
    
    contenedorCarritoVacio.classList.add("disabled");
    contenedorCarritoProductos.classList.add("disabled");
    contenedorCarritoAcciones.classList.add("disabled");
    contenedorCarritoComprado.classList.remove("disabled");

}