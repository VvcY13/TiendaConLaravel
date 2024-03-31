<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class verCarritoController extends Controller
{
    public function verCarrito(){
   /* $userId = Auth::id(); // Obtener el ID del usuario actual
    $carrito = Carrito::where('id_usuario', $userId)
        ->with('productos')
        ->get();
    return view('verCarrito', ['carrito' => $carrito]);*/

    $userId = Auth::id(); // Obtener el ID del usuario actual
    $carrito = Carrito::where('id_usuario', $userId)
        ->with('productos')
        ->get();

    // Array para almacenar la cantidad total de cada producto
    $productosAgrupados = [];

    foreach ($carrito as $item) {
        $idProducto = $item->id_producto;
        $cantidad = $item->cantidad;

        if (isset($productosAgrupados[$idProducto])) {
            $productosAgrupados[$idProducto] += $cantidad; // Sumar la cantidad al producto existente
        } else {
            $productosAgrupados[$idProducto] = $cantidad; // Agregar el producto al array
        }
    }

    return view('verCarrito', ['productosAgrupados' => $productosAgrupados]);

    }
}
