<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdministradorProductosController extends Controller
{
    public function show() {
        $productos = Productos::all();
        return view('administradorProductos',compact('productos'));
    }
    public function eliminarProducto($id){
        Productos::destroy($id);
        return redirect()->back()->with('success', 'Producto eliminado correctamente');
    }
    public function obtenerPorIdProducto($id){
        $productos = Productos::find($id);
        return view('administradorProductosEditar', compact('productos'));
    }
    public function actualizarProducto(Request $request, $id){
        $productos = Productos::find($id);
        $productos->nombre = $request->input('nombre');
        $productos->categoria = $request->input('categoria');
        $productos->presentacion = $request->input('presentacion');
        $productos->precio_venta = $request->input('precio_venta');
        $productos->precio_compra = $request->input('precio_compra');
        $productos->stock = $request->input('stock');
       
        $productos->save();


        return redirect()->route('administradorProductos.show')->with('success', 'Producto actualizado correctamente');
    }
    public function agregarNuevoProducto(){
        return view('administradorAgregarProducto');
    }
    public function guardarNuevoProducto(Request $request)
    {
        if(
       $request->validate([
            'nombre' => 'required|string|max:255' ,
            'categoria' => 'required|string|max:255',
            'presentacion' => 'required|string|max:255',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'stock' => 'nullable|numeric',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ])
       ){
        $producto = new Productos;
        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->presentacion = $request->presentacion;
        $producto->precio_venta = $request->precio_venta;
        $producto->precio_compra = $request->precio_compra;
        $producto->stock = $request->stock;
    
      
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = $image->getClientOriginalName();
        
            
            $path = Storage::disk('local')->put($imageName, $image);  
            if (!Storage::disk('local')->exists('imagenesProductos')) {
                Storage::disk('local')->makeDirectory('imagenesProductos');
            }
            if ($path) {  
                //$producto->imagen = $path;
            $producto->imagen = $path;
            };
    
        $producto->save();
    
        return redirect()->route('administradorProductos.show')->with('success', 'Producto Guardado correctamente');
    }else{
        return back()->with('error');
    }
         
        
    }     
    
}
}