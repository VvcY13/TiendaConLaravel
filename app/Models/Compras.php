<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_usuario',
        'fecha_compra',  
        'total',
        'metodo_pago',
        'estado'
    ];
    public function usuario() {
        return $this->belongsTo(User::class, 'id');
    }
    public function detalles(){
        return $this->hasMany(PurchaseDetail::class,'id_compra');
    }
}
