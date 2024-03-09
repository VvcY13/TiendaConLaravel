<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Editar Personal</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="cuerpoMenu" style="padding-top: 80px;">

      
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="container fomularioEditar">
            <form class="formularioEdit" action="{{ route('actualizarProducto', $productos->id) }}" method="post">
                @csrf
                @method('put')

                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $productos->nombre }}" >
                    <label for="categoria" class="form-label">Categoria:</label>
                    <input type="text" name="categoria" class="form-control" value="{{ $productos->categoria }}">
                    <label for="presentacion" class="form-label">Presentacion:</label>
                    <input type="text" name="presentacion" class="form-control" value="{{ $productos->presentacion }}">
                    <label for="precio_venta" class="form-label">Precio Venta:</label>
                    <input type="text" name="precio_venta" class="form-control" value="{{ $productos->precio_venta }}">
                    <label for="precio_compra" class="form-label">Precio Compra:</label>
                    <input type="text" name="precio_compra" class="form-control" value="{{ $productos->precio_compra }}">
                    <label for="stock" class="form-label">Stock:</label>
                    <input type="number" name="stock" class="form-control" value="{{ $productos->stock }}" >
                </div>

                

                <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            </form>
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>