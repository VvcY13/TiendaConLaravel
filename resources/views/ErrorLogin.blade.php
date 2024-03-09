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
        <div class="contenedorBodyError">
            <div class="contenedorError">
                <h3><strong>Ups Algo Ocurrio en Tu inicio de Sesion !!!</strong></h3>
                <h3 class="subtexto">Al parecer se Ingresaron las credenciales erroneas, Recomendamos
                    probar de nuevo o registrarse si es la primera vez</h3>  
                <a class="vinculoLogin" href="{{ route('login.show') }}">Login</a> 
                <a class="vinculoRegistro" href="{{ route('registro') }}">Registrarme</a>
            </div>
        </div>
    </body>
    
    </html>
</html>
