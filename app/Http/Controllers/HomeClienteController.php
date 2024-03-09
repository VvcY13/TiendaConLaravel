<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeClienteController extends Controller
{
    public function show() {
        
        return view('homeCliente');
    }
}
