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
            <form class="formularioEdit" action="{{ route('actualizarUsuario', $usuario->id) }}" method="post">
                @csrf
                @method('put')

                
                <div class="mb-3">
                    <label for="name" class="form-label">Nombres y Apellidos:</label>
                    <input type="text" name="name" value="{{ $usuario->name }}" class="form-control" required>
                    <label for="cargo" class="form-label">Cargo:</label>
                    <input type="text" name="cargo" value="{{ $usuario->cargo }}" class="form-control" required>
                    <label for="email" class="form-label">email:</label>
                    <input type="text" name="email" value="{{ $usuario->email }}" class="form-control" required>
                    <label for="password" class="form-label">Nueva Contraseña:</label>
                    <input type="password" name="password" class="form-control" >
                </div>

                

                <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            </form>
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>