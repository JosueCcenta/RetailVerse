const express = require('express')
const cors = require('cors')
const mysql = require('mysql')
const myconn = require('express-myconnection')

const routes = require('./routes')

const app = express()
app.set('port', process.env.PORT || 9000)
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
app.use(myconn(mysql, dbOptions, 'single'))
app.use(express.json())
app.use(cors({
    origin: WhiteList
}));

//rutas--------------------------------------------------------------------
app.get('/', (req, res)=>{
    res.send('Welcome to my API')
})
app.use('/api', routes)

//correr server-------------------------------------------------------------
app.listen(app.get('port'), ()=>{
    console.log('server running on port', app.get('port'))
})