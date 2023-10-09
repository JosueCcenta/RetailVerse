const express = require('express')
const cors = require('cors')
const mysql = require('mysql')
const myconn = require('express-myconnection')

const routes = require('./routes')

/* In this code snippet, `const app = express()` creates an instance of the Express application. */
const app = express()
app.set('port', process.env.PORT || 9000)

/* In this code snippet, `const WhiteList = ('http://localhost');` is defining a variable named
`WhiteList` and assigning it the value `'http://localhost'`. */
const WhiteList = ('http://localhost');
//base de datos------------------------------------------------------------
const dbOptions = {
    host: 'localhost',
    port: 3306,
    user: 'root',
    password: '',
    database: 'test'
}

//middlewares--------------------------------------------------------------
/* El fragmento de código 'app.use(myconn(mysql, dbOptions, 'single'))' está configurando un middleware para
establecer una conexión a una base de datos MySQL utilizando la configuración 'dbOptions' proporcionada. */

app.use(myconn(mysql, dbOptions, 'single'))
app.use(express.json())
/* El código 'app.use(cors({ origin: WhiteList }));' está configurando el CORS (Cross-Origin Resource
Compartir) para la aplicación Express. */
app.use(cors({
    origin: WhiteList
}));

/* El código 'app.get('/', (req, res)=>{ res.send('Bienvenido a mi API') })' está definiendo un manejador de rutas
para la dirección URL raíz ("/") de la aplicación. Cuando se realiza una solicitud GET a la dirección URL raíz, el controlador
se ejecuta la función. En este caso, envía la respuesta "Bienvenido a mi API" al cliente. */

app.get('/', (req, res)=>{
    res.send('Welcome to my API')
})
app.use('/api', routes)

/* 'app.listen(app.get('port'), ()=>{ console.log('servidor que se ejecuta en el puerto', app.get('port')) })' es
Iniciar el servidor y escuchar las solicitudes entrantes en el puerto especificado. */
app.listen(app.get('port'), ()=>{
    console.log('server running on port', app.get('port'))
})