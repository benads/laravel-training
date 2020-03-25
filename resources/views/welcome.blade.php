<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <h1>New Users</h1>

     

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.16/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>
    
        <script src="{{ asset('/js/app.js') }}"></script>
        <script>
        Echo.channel('test-channel')
            .listen('UserSignedUp', e => {
                console.log(e.username)
            })
        </script>
    </body>
</html>