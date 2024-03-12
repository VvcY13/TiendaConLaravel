<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_compra',
        'id_producto',
        'cantidad',
        'precio',
    ];
    public function compra() {
        return $this->belongsTo(PurchaseDetail::class,'id_compra');
    }
    public function producto(){
        return $this->belongsTo(Productos::class,'id');
    }
}
