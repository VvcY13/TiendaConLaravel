<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class editarCarritoController extends Controller
{
    public function aumentarCantidad($idProducto)
{
    $userId = Auth::id();
    $carritoItem = Carrito::where('id_usuario', $userId)
        ->where('id_producto', $idProducto)
        ->first();

    if ($carritoItem) {
        $carritoItem->cantidad++;
        $carritoItem->save();
    }

    return redirect()->route('verCarrito');
}

public function reducirCantidad($idProducto)
{
    $userId = Auth::id();
    $carritoItem = Carrito::where('id_usuario', $userId)
        ->where('id_producto', $idProducto)
        ->first();

    if ($carritoItem) {
        if ($carritoItem->cantidad > 1) {
            $carritoItem->cantidad--;
            $carritoItem->save();
        } else {
            $carritoItem->delete();
        }
    }

    return redirect()->route('verCarrito');
}

public function eliminarProducto($idProducto)
{
    $userId = Auth::id();
    $carritoItem = Carrito::where('id_usuario', $userId)
        ->where('id_producto', $idProducto)
        ->first();

    if ($carritoItem) {
        $carritoItem->delete();
    }

    return redirect()->route('verCarrito');
}
}
