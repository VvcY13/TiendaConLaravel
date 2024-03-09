<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function show(){
        return view('welcome');
    }
    public function showErrorLogin(){
        return view('ErrorLogin');
    }
    public function login(LoginRequest $request){
        $credentials = $request->only('email','password');
         if(Auth::attempt($credentials)){
            // Authentication passed...
            $user = Auth::user();
            if($user->cargo == 1){
                // Si es cargo 1 (administrador), redirigir a la vista de administrador
                return redirect()->route('homeAdministrador.show')->with('Exito', 'Estas Logueado');
            } elseif($user->cargo == 2){
                // Si es cargo 2 (cliente), redirigir a la vista de cliente
                return redirect()->route('homeCliente.show')->with('Exito', 'Estas Logueado');
            } 
    }else{
        return redirect()->route('errorLogin.show')->withErrors('auth.failed');
    }
}
}
