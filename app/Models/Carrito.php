<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_producto',
        'cantidad'
    ];
    public function productos() {
        return $this->belongsTo(Productos::class, 'id');
    }
    public function usuario(){
        return $this->belongsTo(User::class,'id');
    }
    public static function instance($name = 'shopping')
    {
        // Reemplaza esta lógica con tu implementación para manejar la instancia del carrito
        // (por ejemplo, almacenamiento en sesión, almacenamiento en base de datos basado en la ID de usuario)
        return new static; // Ejemplo: devuelve una nueva instancia de Carrito por ahora
    }
    public function add($productId, $productName, $quantity, $price)
    {
        
        $cartItem = new static([
            'id_usuario' => Auth::id(), // Suponiendo que tienes un usuario logueado
            'id_producto' => $productId,
            'cantidad' => $quantity
        ]);

        $cartItem->save(); // Guarda el carrito en la base de datos

        return $cartItem;
    }
    public function update(array $attributes = [], array $options = []){
        if (isset($attributes['cantidad'])) {
            $this->cantidad = $attributes['cantidad'];
        }
        return $this->save();
    }
}
