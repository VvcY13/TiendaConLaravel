<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;

class clienteProductosController extends Controller
{
    public function show (){
        $productos=Productos::all();
        return view ('clienteProductos',compact('productos'));
    }

}
