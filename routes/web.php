<?php

use App\Http\Controllers\AdministradorPersonalController;
use App\Http\Controllers\AdministradorProductosController;
use App\Http\Controllers\clienteNosotrosController;
use App\Http\Controllers\clienteProductosController;
use App\Http\Controllers\HomeAdministradorController;
use App\Http\Controllers\HomeClienteController;
use App\Http\Controllers\obtenerPersonalController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicio');
Route::get('/login',[LoginController::class, 'show'])->name('login.show');

Route::post('/login',[LoginController::class, 'login'] );
Route::get('/errorLogin',[LoginController::class, 'showErrorLogin'])->name('errorLogin.show');
Route::get('/registro',[RegisterController::class, 'show'])->name('registro');

Route::post('/registro',[RegisterController::class, 'register'] );
Route::get('/homeCliente',[HomeClienteController::class, 'show'])->name('homeCliente.show');
Route::get('/homeAdministrador',[HomeAdministradorController::class, 'show'])->name('homeAdministrador.show');

Route::get('/administradorProductos',[AdministradorProductosController::class, 'show'])->name('administradorProductos.show');//Rutas para el administrador de productos

Route::get('/clienteProductos',[clienteProductosController::class, 'show'])->name('clienteProductos.show');
Route::get('/clienteNosotros',[clienteNosotrosController::class,'show'])->name('clienteNosotros.show');



Route::get('/administradorPersonal', [AdministradorPersonalController::class, 'show'])->name('administradorPersonal.show');
Route::delete('eliminarUsuario/{id}',[AdministradorPersonalController::class,'eliminarUsuario'])->name('eliminarUsuario');
Route::get('/obtenerPorIdUsuario/{id}',[AdministradorPersonalController::class,'obtenerPorIdUsuario'])->name('obtenerPorIdUsuario');
Route::put('/actualizarUsuario/{id}',[AdministradorPersonalController::class,'actualizarUsuario'])->name('actualizarUsuario');
Route::get('/administradorAgregarPersonal',[AdministradorPersonalController::class,'agregarNuevoUsuario'])->name('administradorAgregarPersonal.show');
Route::post('/guardarNuevoUsuario',[AdministradorPersonalController::class,'guardarNuevoUsuario'])->name('guardarNuevoUsuario');

Route::delete('eliminarProducto/{id}',[AdministradorProductosController::class,'eliminarProducto'])->name('eliminarProducto');
Route::get('/obtenerPorIdProducto/{id}',[AdministradorProductosController::class,'obtenerPorIdProducto'])->name('obtenerPorIdProducto');
Route::put('/actualizarProducto/{id}',[AdministradorProductosController::class,'actualizarProducto'])->name('actualizarProducto');
Route::get('/administradorAgregarProducto',[AdministradorProductosController::class,'agregarNuevoProducto'])->name('administradorAgregarProducto.show');
Route::post('/guardarNuevoProducto',[AdministradorProductosController::class,'guardarNuevoProducto'])->name('guardarNuevoProducto');
