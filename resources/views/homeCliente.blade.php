<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Bienvenido Cliente</title>
    @vite(['resources/css/app.css'])
</head>
<header>
    <nav>
        <nav class="navbar fixed-top bg-body-tertiary">
            <div class="container-fluid">
                <img src="imagenes/logo.png" alt="Logo" width="150" height="60" class="d-inline-block align-text-top">
                <a class="navbar-brand" href="{{ route('homeCliente.show') }}">Inicio</a>
                <a class="navbar-brand" href="{{ route('clienteProductos.show') }}">Productos</a>
                <a class="navbar-brand" href="{{ route('clienteNosotros.show') }}">Nosotros</a>
                <a class="navbar-brand" href="{{ route('logout') }}" id="">Cerrar sesión</a>
               
            </div>
        </nav>
    </nav>
</header>
<body>
    <div class="cuerpoMenu" style="padding-top: 80px;">
        <div style="margin:10px; ">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('verCarrito') }}" class="btn btn-primary me-md-2">Ver Carrito</a>
            </div>   
        </div>
        <div class="contenedorProductos">
           
        </div>
    </div>
</body>
</html>