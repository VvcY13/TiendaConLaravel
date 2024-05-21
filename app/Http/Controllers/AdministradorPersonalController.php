<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdministradorPersonalController extends Controller
{
    public function show() {
        $users = User::all();
        return view('administradorPersonal', compact('users'));
    }
    public function eliminarUsuario($id){
        User::destroy($id);
        return redirect()->back()->with('success', 'Usuario eliminado correctamente');
    }
    public function obtenerPorIdUsuario($id){
        $usuario = User::find($id);
        return view('administradorPersonalEditar', compact('usuario'));
    }
    public function actualizarUsuario(Request $request, $id){
        $usuario = User::find($id);
        $usuario->name = $request->input('name');
        $usuario->cargo = $request->input('cargo');
        $usuario->email = $request->input('email');

        if($request->filled('password')){
            $usuario->password = bcrypt($request->input('password'));
        }
        $usuario->save();


        return redirect()->route('administradorPersonal.show')->with('success', 'Usuario actualizado correctamente');
    }
    public function agregarNuevoUsuario(){
        return view('administradorAgregarPersonal');
    }
    public function  guardarNuevoUsuario(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'cargo' => 'required|integer',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        $user = new User;
       
        $user->name=$request->input('name');
        $user->cargo= $request->input('cargo');
        $user->email= $request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->save();
        
        return redirect('administradorPersonal')->with('success','Se ha registrado el usuario exitosamente.');
       
        
    }                     

}
