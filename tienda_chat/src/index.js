const express = require('express');

const path = require('path');

const app = express();

const server = require('http').Server(app);
const socketio = require('socket.io')(server);

app.set('port' , process.env.PORT || 3000);

//Ejeutamos la funcion de sockets.js
require('./sockets')(socketio);

//Archivo estatico

app.use(express.static(path.join(__dirname, 'public')));

app.listen(3000, () =>{
    console.log('Servidor en el puerto 3000');
})