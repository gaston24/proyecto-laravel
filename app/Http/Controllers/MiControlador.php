<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productoo;
use App\Models\Alumno;
use App\Models\Nota;
use App\Models\Persona;

class MiControlador extends Controller
{

    public function helpers(){

        // abort(403, 'No se dispone de autorizacion');
        $path = app_path();
        $path = database_path();
        
        
        return $path;

    }

    // ----------------------------------------------
    public function leer(){
        $personas = Persona::all();

        return $personas;
    }
    public function guardar(){
        $persona = new Persona();

        $nombre = 'Jose';
        $edad = 29;

        $persona->nombre = $nombre;
        $persona->edad = $edad;

        $persona->save();

    }
    public function borrar(){
        $filasBorradas = Persona::where('personas_id', '>=', 4)->delete();

        return $filasBorradas;
    }
    public function actualizar(){
        $persona = Persona::find(3);
        $persona->nombre = "Juan Carlos Pedro";
        $persona->save();

        return "Actualizado";
    }
}
