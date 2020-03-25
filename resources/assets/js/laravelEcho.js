import Echo from "laravel-echo"
window.io = require('socket.io-client');

let e = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001' // this is laravel-echo-server host
});

e.channel('test-channel')
    .listen('UserSignedUp', (e) => {
        let item = document.createElement("p");
        item.innerHTML = e.username;
        document.querySelector('body').appendChild(item);
    })

document.querySelector('#notify').addEventListener('click', function(e){
    e.preventDefault()
    fetch('/');
})
