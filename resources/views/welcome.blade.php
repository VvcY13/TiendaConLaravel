<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Minimarket</title>
        @vite(['resources/css/app.css'])
    </head>
    <header>
    
    </header>
    <body>
        <div class="contenedorBody">
            <div class="contenedorRegistro">
                <h3><strong>Iniciar Sesion</strong></h3>
                <div class="loginForm">
                    <form action="/login" method="POST">
                        @csrf
                        <label for="email">Ingresa tu correo</label>
                        <br>
                        <input class="form-control" type="email" name="email" id="email">
                        <br>
                        <label for="password" >Ingresa tu contraseña</label>
                        <br>
                        <input class="form-control" type="password" name="password" id="password">
                        <br><br>
                        <input class="btn btn-primary" class="inputLogin" type="submit" value="Iniciar Sesion">
                    </form>
                </div>
                <p><strong>¿No tienes cuenta?</strong></p>
                <a href="{{ route('registro') }}">Registrarme</a>
            </div>
        </div>
    </body>
    
    </html>
</html>
