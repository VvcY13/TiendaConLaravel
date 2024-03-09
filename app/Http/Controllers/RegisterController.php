<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(){
        return view('registro');
    }
    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        return redirect()->route('inicio')->with('Exito', 'Cuenta creada');
    
    }
}
