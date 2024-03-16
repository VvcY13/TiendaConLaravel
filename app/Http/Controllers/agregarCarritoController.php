<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class agregarCarritoController extends Controller
{
    
    public function agregarCarrito(Request $request)
    {
        Log::info('Iniciando acción de agregar al carrito...');

        $productoId = $request->input('id');
        Log::info('ID del producto: ' . $productoId);
        if (Auth::check()) {
            $userId = Auth::id();
            Log::info('ID del usuario: ' . $userId);
            $producto = Productos::findOrFail($productoId);
            Log::info('Producto encontrado: ' . $producto->nombre);
            Log::info($productoId);
            if ($producto && $producto->stock > 0) {
                Log::info($producto->stock);
                Log::info('Suficiente stock disponible.');
                $cartItem = Carrito::instance('shopping')->all();
                $existingItem = $cartItem->where('id', $productoId)->first();

                if ($existingItem) {
                    $existingItem->cantidad += 1;
                    $existingItem->update(['cantidad' => $existingItem->cantidad]); // Actualiza la cantidad
                    Log::info('Cantidad del producto actualizada en el carrito.');
                } else {
                    Carrito::instance('shopping')->add($producto->id, $producto->nombre, 1, $producto->precio_venta);
                    
                    Log::info('Producto agregado al carrito.');
                }

                return redirect()->back()->with('success', 'El producto se ha añadido al carrito.');
            } else {
                Log::info('No hay suficiente stock para este producto.');
                return redirect()->back()->withErrors(['error' => 'No hay suficiente stock para este producto']);
            }
        } else {
            return redirect()->route('login.show')->withErrors('error', 'Debe iniciar sesión para agregar productos al carrito');
        }
    }
}
