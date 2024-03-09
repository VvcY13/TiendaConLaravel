<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Bienvenido al area de Productos</title>
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

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif



        <div style="margin:10px; ">
        </div>
        <div style="margin:30px; ">
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <a href="{{ route('administradorAgregarProducto.show') }}" class="btn btn-primary me-md-2 btn-lg">Agregar Producto</a>
            </div>   
        </div>


        <div class="container mi-contenedor"> <!-- Contenedor principal -->
            <div class="row g-2"> <!-- Fila que contendrá las columnas -->
                <!-- Encabezados de las columnas -->
        <div class="col-md-2 d-flex align-items-center">
            <p>Nombres</p>
        </div>

        <div class="col-md-2 d-flex align-items-center">
            <p>Categoria</p>
        </div>

        <div class="col-md-2 d-flex align-items-center">
            <p>Presentacion</p>
        </div>

        <div class="col-md-1 d-flex align-items-center">
            <p>Precio Compra</p>
        </div>

        <div class="col-md-1 d-flex align-items-center">
            <p>Precio Venta</p>
        </div>

        <div class="col-md-2 d-flex align-items-center">
            <p>Stock</p>
        </div>
        <div class="col-md-1 d-flex align-items-center">
            <p>Editar</p>
        </div>
        <div class="col-md-1 d-flex align-items-center">
            <p>Eliminar</p>
        </div>
        @foreach ($productos as $productos)
            <div class="col-md-2 d-flex align-items-center">
                <p>{{ $productos->nombre }}</p>
            </div>

            <div class="col-md-2 d-flex align-items-center">
                <p>{{ $productos->categoria }}</p>
            </div>

            <div class="col-md-2 d-flex align-items-center">
                <p>{{ $productos->presentacion }}</p>
            </div>
            <div class="col-md-1 d-flex align-items-center">
                <p>{{ $productos->precio_compra }}</p>
            </div>
            <div class="col-md-1 d-flex align-items-center">
                <p>{{ $productos->precio_venta }}</p>
            </div>
            <div class="col-md-2 d-flex align-items-center">
                <p>{{ $productos->stock }}</p>
            </div>
            <div class="col-md-1 d-flex align-items-center">
                <a href="{{ route('obtenerPorIdProducto', $productos->id) }}" class="btn btn-warning btn-sm">Editar Producto</a>
            </div>

            <form class="col-md-1 d-flex align-items-center" action="{{ route('eliminarProducto', $productos->id) }}" method="post">
                @csrf
                @method('delete')
                <div class="col-md-1 d-flex align-items-center">
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar Producto</button>
                </div>
            </form>
        @endforeach
    
        </div>        
    </div>
    </div>
</body>

</html>