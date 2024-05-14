<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Bienvenido al Carrito</title>
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
                <a class="navbar-brand" href="{{ route('login.show') }}" id="">Cerrar sesión</a>
               
            </div>
        </nav>
    </nav>
</header>
<body>
    <h1>Productos en el Carrito</h1>
    <ul>
        @php
            $totalCarrito = 0; // Variable para almacenar el total del carrito
        @endphp
        @foreach($productosAgrupados as $idProducto => $cantidad)
            @php
                $producto = App\Models\Productos::find($idProducto);
                $totalProducto = $producto->precio_venta * $cantidad;
                $totalCarrito += $totalProducto;
            @endphp
            <li>
                {{ $producto->nombre }} - Cantidad: {{ $cantidad }} - Precio unitario: {{ $producto->precio_venta }} - Total: {{ $totalProducto }}
                <form action="{{ route('aumentarCantidad', ['idProducto' => $idProducto]) }}" method="POST">
                    @csrf
                    <button type="submit">Aumentar</button>
                </form>
                <form action="{{ route('reducirCantidad', ['idProducto' => $idProducto]) }}" method="POST">
                    @csrf
                    <button type="submit">Reducir</button>
                </form>
                <form action="{{ route('eliminarProductoCarrito', ['idProducto' => $idProducto]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
    <h2>Total del Carrito: {{ $totalCarrito }}</h2>
</body>
</html>