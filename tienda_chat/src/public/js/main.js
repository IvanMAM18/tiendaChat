$(function(){
    const socket = io();

    //Accedemos a los elementos del DOM

    const messageForm = $('#messages-form');
    const messageBox = $('#message');
    const chat = $('#chat');

    //Eventos

    //Enviamos un mensaje al servicio
    messageForm.submit(e => {
        e.preventDefault();
        socket.emit('enviar mensaje', messageBox.val());
        messageBox.val('');
    })

    //Obtener respuesta del servidor
    socket.on('nuevo mensaje', function(datos){
        //console.log(datos);
        chat.append(`<div class="msg-area mb-2"><p class="msg">${datos.msg}</p></div>`)
    });
})