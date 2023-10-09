let productos = [];

const contenedorProductos = document.querySelector("#contenedor-productos");
const botonesCategorias = document.querySelectorAll(".boton-categoria");
const tituloPrincipal = document.querySelector("#titulo-principal");
let botonesAgregar = document.querySelectorAll(".producto-agregar");
const numero = document.querySelector(".numero");

/* El código realiza una solicitud GET al punto de conexión "http://localhost:9000/api" mediante la API de recuperación. Eso
A continuación, controla la respuesta llamando al método 'json()' en el objeto de respuesta para analizar el objeto
cuerpo de respuesta como JSON. A continuación, los datos JSON resultantes se asignan a la variable 'productos' y
pasado como argumento a la función 'cargarProductos', que carga los productos en la página web. */

fetch("http://localhost:9000/api")
    .then(response => response.json())
    .then(data => {
        productos = data;
        cargarProductos(productos);
    })



/**
 * La funcion "cargarProductos" toma un array de productos elegidos y los inserta dinamicamente elementos para 
 * mostrar detalles de cada producto en un HTML que se llamo contenedorProductos
 * @param {String} productosElegidos - El parametro "productosElegidos" es un array de objetos que representan
 * los productos elegidos. Cada objeto de la matriz debe de tener las siguientes propiedades:
 * id,titulo,categoria,precio,cantidad,imagen.
 * Luego se insertan en el HTML y se llama a la funcion actualizar botones
 */
function cargarProductos(productosElegidos) {

    contenedorProductos.innerHTML = "";

    productosElegidos.forEach(producto => {

        const div = document.createElement("div");
        div.classList.add("producto");
        div.innerHTML = `
            <img class="producto-imagen" src="${producto.imagen}" alt="${producto.titulo}">
            <div class="producto-detalles">
                <h3 class="producto-titulo">${producto.titulo}</h3>
                <p class="producto-precio">$${producto.precio}</p>
                <button class="producto-agregar" id="${producto.id}">Agregar</button>
            </div>
        `;

        contenedorProductos.append(div);
    })
    actualizarBotonesAgregar();
}

/**
*El código agrega un detector de eventos de clic a cada botón con la clase "boton-categoria". Cuando un
*se hace clic en el botón y se ejecuta la función de escucha de eventos. botonesCategorias es un array que
*nos trae todos los botones que tenemos en el HTML. Cuando tocaran el boton se remueve la clase active del
*boton donde estaba y se agrega al boton que acabamos de clickear. Ademas nos busca dentro del array productos
*su categoria y si es igual a el id del boton donde clickeamos nos insertara el nombre de la categoria del productos
*en el titulo. De igual manera nos cargaran solamente los productos que coindican con la categoria del boton y si no
*El titulo se mantendra en Todos los productos y nos cargaran todos los productos.
*/
botonesCategorias.forEach(boton => {
    boton.addEventListener("click", (e) => {

        botonesCategorias.forEach(boton => boton.classList.remove("active"));
        e.currentTarget.classList.add("active");

        if (e.currentTarget.id != "todos") {
            const productoCategoria = productos.find(producto => producto.categoria === e.currentTarget.id);
            tituloPrincipal.innerText = productoCategoria.categoria;
            const productosBoton = productos.filter(producto => producto.categoria === e.currentTarget.id);
            cargarProductos(productosBoton);
        } else {
            tituloPrincipal.innerText = "Todos los productos";
            cargarProductos(productos);
        }

    })
});

/**
 * La función "actualizarBotonesAgregar" agrega un detector de eventos a cada botón con la clase
 * "producto-agregar" que llama a la función "agregarAlCarrito" al hacer clic.
 */
function actualizarBotonesAgregar(){
    botonesAgregar = document.querySelectorAll(".producto-agregar");

    botonesAgregar.forEach(boton =>{
        boton.addEventListener("click",agregarAlCarrito);
    });
}
/**@type {string} */
let productosEnCarrito;

/* 
*La línea 'let productosEnCarritoLS = localStorage.getItem("productos-en-carrito");' está recuperando
*El valor almacenado en la clave "productos-en-carrito" en el almacenamiento local del navegador. Asigna el atributo
*recuperado a la variable 'productosEnCarritoLS'. 
*/
let productosEnCarritoLS = localStorage.getItem("productos-en-carrito");

/* Este bloque de código comprueba si hay algún valor almacenado en la clave "productos-en-carrito" en el archivo
almacenamiento local del navegador. Si hay un valor, analiza el valor de una cadena a una matriz usando
'JSON.parse()' y lo asigna a la variable 'productosEnCarrito'. A continuación, llama a la función
Función 'actualizarNumerito()' para actualizar la visualización del número de artículos en el carrito. Si hay
no es un valor en el almacenamiento local, asigna una matriz vacía a 'productosEnCarrito'. */


if (productosEnCarritoLS) {
    productosEnCarrito = JSON.parse(productosEnCarritoLS);
    actualizarNumerito();
} else {
    productosEnCarrito = [];
}

/**
 * La función agrega un producto al carrito de compras y muestra una notificación del sistema.
 * @param {String} e - El parámetro "e" es un objeto de evento que representa el evento que desencadenó el
 *función. Se usa comúnmente en controladores de eventos para acceder a información sobre el evento, como el
 * elemento de destino o cualquier dato asociado con el evento. En este caso, se utiliza para obtener el id del archivo
 * botón que usaremos para buscar productos dentro del array productos. Y finalmente ejecutando actualizarNumero() 
 */

function agregarAlCarrito(e){
    Toastify({
        text: "Producto agregado",
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
      
      const idBoton = parseInt(e.currentTarget.id); 

      const productoAgregado = productos.find(producto => producto.id === idBoton);
/* 
*Este bloque de codigo esta validando si un producto con el mismo id como el del boton clickeado existe en el carrito de compras("productosEnCarrito")
*/
    if(productosEnCarrito.some(producto => producto.id === idBoton)) {
        /*
        *En esta linea busca el id del producto existente en el carrito que tiene el id del boton clickeado y se almacena en index
        *Luego incrementa la cantidad del producto existente en el carrito si es que se agrega nuevamente al carrito.
        */
        const index = productosEnCarrito.findIndex(producto => producto.id === idBoton);
        productosEnCarrito[index].cantidad++;
    } else {
        /*/
        *Si no existia en el carrito sencillamente nos pondra que es 1 y lo introduce en el carrito
        */
        productoAgregado.cantidad = 1;
        productosEnCarrito.push(productoAgregado);
    }

    actualizarNumero();

/* Esta parte del codigo esta almacenando the `productosEnCarrito` en el almacenamiento local del navegador. */
    localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));
}

/**
 * La función "actualizarNumero" actualiza el número del carrito que se muestra en la página web sumando el
 * Cantidades de todos los productos en la cesta de la compra.
 */

function actualizarNumero() {
    let nuevoNumero = productosEnCarrito.reduce((acc, producto) => acc + producto.cantidad, 0);
    numero.innerText = nuevoNumero;

}