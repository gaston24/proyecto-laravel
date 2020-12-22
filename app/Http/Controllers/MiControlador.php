<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Models\Productoo;
use App\Models\Alumno;
use App\Models\Nota;
use App\Models\Persona;

class MiControlador extends Controller
{

    // Session

    public function set(){
        session(['dato1'=>123, 'dato2' => 456]);
        return 'set session OK';
    }
    public function get1(){
        $value = session('dato1');
        return 'get1 session OK '.$value;
        
    }
    public function get2(){
        $value = session('dato2');
        return 'get2 session OK '.$value;
       
    }
    public function forget1(){
        session()->forget('dato1');
        return 'forget1 session OK';

    }

// -----------------REDIRECTION----------------
    public function redir(){
        return redirect('/home');
    }


    public function helpers(){

        // abort(403, 'No se dispone de autorizacion');
        $path = app_path();
        $path = database_path();
        
        
        return $path;

    }

    // ----------------------------------------------
    public function leer(){
        $personas = Persona::all();

        // $personas = Persona::findOrFail(3);

        return $personas;
    }
    public function guardar(){
        $persona = new Persona();

        $nombre = ['Jose', 'Juan', 'pedro'];
        $edad = [29, 23, 43];

        $nombre = Arr::random($nombre, 1);
        $edad = Arr::random($edad, 1);

        $persona->nombre = $nombre[0];
        $persona->edad = $edad[0];

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
