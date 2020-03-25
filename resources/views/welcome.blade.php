<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <h1>New Users</h1>

    
        <script src="{{ asset('/js/app.js') }}"></script>
        <script>
        Echo.channel('test-channel')
            .listen('UserSignedUp', e => {
                let item = document.createElement("p");
                item.innerHTML = e.username;
                document.querySelector('body').appendChild(item);
            })
        </script>
    </body>
</html>