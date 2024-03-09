<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Bienvenido Administrador</title>
    @vite(['resources/css/app.css'])
</head>
<header>
    <nav>
        <nav class="navbar fixed-top bg-body-tertiary">
            <div class="container-fluid">
                <img src="imagenes/logo.png" alt="Logo" width="150" height="60" class="d-inline-block align-text-top">
                <a class="navbar-brand" href="{{ route('homeAdministrador.show') }}">Home</a>
                <a class="navbar-brand" href="{{ route('administradorPersonal.show') }}">Personal</a>
                <a class="navbar-brand" href="{{ route('administradorProductos.show') }}">Productos</a>
                <a class="navbar-brand" href="{{ route('login.show') }}" id="">Cerrar sesión</a>
               
            </div>
        </nav>
    </nav>
</header>
<body>
    <div class="cuerpoMenu" style="padding-top: 80px;">
        <div style="margin:10px; ">
        </div>
        <div class="contenedorProductos">
           
        </div>
    </div>
</body>
</html>