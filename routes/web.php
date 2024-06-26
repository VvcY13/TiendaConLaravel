<?php
use App\Models\User;
use App\Http\Controllers\AdministradorPersonalController;
use App\Http\Controllers\AdministradorProductosController;
use App\Http\Controllers\agregarCarritoController;
use App\Http\Controllers\clienteNosotrosController;
use App\Http\Controllers\clienteProductosController;
use App\Http\Controllers\editarCarritoController;
use App\Http\Controllers\HomeAdministradorController;
use App\Http\Controllers\HomeClienteController;
use App\Http\Controllers\obtenerPersonalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\verCarritoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
})->name('inicio');
Route::get('/login', [LoginController::class, 'show'])->name('login.show');

Route::post('/login', [LoginController::class, 'login']);
Route::get('/errorLogin', [LoginController::class, 'showErrorLogin'])->name('errorLogin.show');
Route::get('/registro', [RegisterController::class, 'show'])->name('registro');

Route::post('/registro', [RegisterController::class, 'register']);
Route::get('/homeCliente', [HomeClienteController::class, 'show'])->name('homeCliente.show');
Route::get('/homeAdministrador', [HomeAdministradorController::class, 'show'])->name('homeAdministrador.show');
Route::get('/administradorProductos', [AdministradorProductosController::class, 'show'])->name('administradorProductos.show');//Rutas para el administrador de productos

Route::get('/clienteProductos', [clienteProductosController::class, 'show'])->name('clienteProductos.show');
Route::get('/clienteNosotros', [clienteNosotrosController::class, 'show'])->name('clienteNosotros.show');

Route::get('/administradorPersonal', [AdministradorPersonalController::class, 'show'])->name('administradorPersonal.show');
Route::delete('eliminarUsuario/{id}', [AdministradorPersonalController::class, 'eliminarUsuario'])->name('eliminarUsuario');
Route::get('/obtenerPorIdUsuario/{id}', [AdministradorPersonalController::class, 'obtenerPorIdUsuario'])->name('obtenerPorIdUsuario');
Route::put('/actualizarUsuario/{id}', [AdministradorPersonalController::class, 'actualizarUsuario'])->name('actualizarUsuario');
Route::get('/administradorAgregarPersonal', [AdministradorPersonalController::class, 'agregarNuevoUsuario'])->name('administradorAgregarPersonal.show');
Route::post('/guardarNuevoUsuario', [AdministradorPersonalController::class, 'guardarNuevoUsuario'])->name('guardarNuevoUsuario');

Route::delete('eliminarProducto/{id}', [AdministradorProductosController::class, 'eliminarProducto'])->name('eliminarProducto');
Route::get('/obtenerPorIdProducto/{id}', [AdministradorProductosController::class, 'obtenerPorIdProducto'])->name('obtenerPorIdProducto');
Route::put('/actualizarProducto/{id}', [AdministradorProductosController::class, 'actualizarProducto'])->name('actualizarProducto');
Route::get('/administradorAgregarProducto', [AdministradorProductosController::class, 'agregarNuevoProducto'])->name('administradorAgregarProducto.show');
Route::post('/guardarNuevoProducto', [AdministradorProductosController::class, 'guardarNuevoProducto'])->name('guardarNuevoProducto');

Route::post('/agregarCarrito', [agregarCarritoController::class, 'agregarCarrito'])->name('agregarCarrito');
Route::get('/verCarrito', [verCarritoController::class, 'verCarrito'])->name('verCarrito');
Route::post('/aumentarcantidad/{idProducto}', [editarCarritoController::class, 'aumentarCantidad'])->name('aumentarCantidad');
Route::post('/reducircantidad/{idProducto}', [editarCarritoController::class, 'reducirCantidad'])->name('reducirCantidad');
Route::delete('/eliminarproducto/{idProducto}', [editarCarritoController::class, 'eliminarProducto'])->name('eliminarProductoCarrito');


//google rutas
Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();
    
    $existing_user = User::where('email', $user_google->email)->first();

    if ($existing_user) {
        if ($existing_user->cargo == 1) {
            return redirect("/homeAdministrador");
        } elseif ($existing_user->cargo == 2) {
            Auth::login($existing_user);
            return redirect("/homeCliente");
        }
    } else {
        $user = User::create([
            'google_id' => $user_google->id,
            'name' => $user_google->name,
            'email' => $user_google->email,
            'cargo' => 2,
            'perfil' => false
        ]);

        Auth::login($user);
        return redirect("/homeCliente");
    }
});


//CIERRE SESION
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');