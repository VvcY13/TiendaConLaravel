<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Minimarket|Registro</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="contenedorBody">
        <div class="contenedorRegistro">
            <h3><strong>Registro</strong></h3>
            <div class="registroForm">
                <form action="/registro" method="POST">
                    @csrf
                    <label for="firstName">Ingresa tu Nombre</label>
                    <br>
                    <input class="form-control" type="text" name="firstName" id="firstName">
                    <br>
                    <label for="lastName">Ingresa tu Apellido</label>
                    <br>
                    <input class="form-control" type="text" name="lastName" id="lastName">
                    <br>
                    <input class="form-control" type="hidden" name="cargo" id="cargo" value="1">
                    
                    <label for="email">Ingresa tu correo</label>
                    <br>
                    <input class="form-control" type="text" name="email" id="email">
                    <br>
                    <label for="contraseña">Ingresa tu contraseña</label>
                    <br>
                    <input class="form-control" type="password" name="password" id="contraseña">
                    <br><br>
                    <input class="btn btn-primary" class="inputRegistrar" type="submit" value="Registrarme">
                </form>
            </div>
            <p><strong>¿Ya tienes una cuenta?</strong></p>
            <a href="{{ route('inicio') }}">Iniciar Sesion</a>
        </div>
    </div>
</body>

</html>