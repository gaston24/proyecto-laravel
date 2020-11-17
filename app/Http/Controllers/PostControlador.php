<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostControlador extends Controller
{
    public function create(){
        return view('post.create');
    }


    public function store(Request $request){
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $edad = $request->edad;
        $email = $request->email;

        $request->validate(
            [
                'nombre' => 'required|min:3|max:15',
                'apellido' => 'required',
                'edad' => 'required|numeric|min:3|max:15',
                'email' => 'required|email',

            ],
            [
                'nombre.required' => 'El campo nombre es obligatorio',
                'apellido.required' => 'El campo apellido es obligatorio',
                'edad.required' => 'El campo edad es obligatorio',
                'email.required' => 'El email nombre es obligatorio',
            ]
        );

        // return $request;
        return back()->with('mensaje', "Nombre: $nombre, Apellido: $apellido, Edad: $edad, Email: $email") ;
    }


    public function request(){
        return view('vistas.request');
    }

    public function datosGet(Request $request, $dni = 'no disponible'){
        // $nombre = $request->input('nombre');
        // $edad = $request->input('edad');
        $nombre = $request->get('nombre');
        $edad = $request->get('edad');
        // return "<h2 style='color:blue'>GET dni: $dni</h2>";
        return "<h2 style='color:blue'>GET dni: $nombre , edad: $edad </h2>";
        
    }
    
    public function datosRequest(Request $request){
        $nombre = $request->nombre;
        $edad = $request->edad;
        
        return "<h2 style='color:blue'>GET dni: $nombre , edad: $edad </h2>";
    }


}
