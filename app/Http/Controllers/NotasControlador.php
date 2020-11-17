<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productoo;
use App\Models\Alumno;
use App\Models\Nota;

class NotasControlador extends Controller
{
    public function root(){
        $notas = Nota::all();
        // return view('welcome');
        // return redirect('/home');
        // return $notas;
        return view('notas.menu', compact('notas'));
    }

    public function detalle($id){
        $nota = Nota::findOrFail($id);

        return view('notas.detalle', compact('nota'));
    }


    public function crear(Request $request){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        // return $request;
        $notaNueva = new Nota();
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;

        $notaNueva->save();

        return back()->with('mensaje', 'Nota agregada');
    }
    

    public function eliminar($id){
        $notaEliminar = Nota::findOrFail($id);
        $notaEliminar->delete();

        
        return back()->with('mensajeEliminar', 'Nota eliminada');
    }


    public function editar($id){

        $nota = Nota::findOrFail($id);

        return view('notas.editar', compact('nota'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $notaActualizada = Nota::findOrFail($id);
        $notaActualizada->nombre = $request->nombre;
        $notaActualizada->descripcion = $request->descripcion;

        $notaActualizada->save();

        // return back()->with('mensajeActualizado', 'Nota actualizada');
        return redirect('/')->with('mensajeActualizado', 'Nota actualizada');
    }

    // 

    public function foto(){
        return view('vistas.foto');
    }

    public function bienvenido(){
        return 'hola mundo';
    }

    public function blog(){
        return view('vistas.blog');
    }

    public function home($nombre = null){
        // $alumnos = [
        //     ['nombre' => 'Juan',    'apellido' => 'Gomez',  'edad' => 32,'foto' => 'https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/12_avatar-256.png'],
        //     ['nombre' => 'Ana',     'apellido' => 'Perez',  'edad' => 29,'foto' => 'https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/12_avatar-256.png'],
        //     ['nombre' => 'Lucia',   'apellido' => 'Pieres', 'edad' => 25,'foto' => 'https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/12_avatar-256.png'],
        //     ['nombre' => 'Lucas',   'apellido' => 'Mei',    'edad' => 37,'foto' => 'https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/12_avatar-256.png'],
        //     ['nombre' => 'Pedro',   'apellido' => 'Lopez',  'edad' => 24,'foto' => 'https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/12_avatar-256.png']
        // ];
        // return view('home', ['nombre' => $nombre, 'alumnos' =>$alumnos]);
        $alumnos = Alumno::all();
        return view('vistas.home', compact('nombre', 'alumnos') );
    }

    public function productos(){

        // $productos2 = array(
        //     ['nombre' => 'harina',  'descripcion' => 'producto comestible', 'codigo' => 'AAA123', 'precio' => 132],
        //     ['nombre' => 'manteca', 'descripcion' => 'tipo manteca',        'codigo' => 'BBB456', 'precio' => 178],
        //     ['nombre' => 'fideos',  'descripcion' => 'mas rico',            'codigo' => 'CCC789', 'precio' => 145],
        //     ['nombre' => 'pan',     'descripcion' => 'pancito',             'codigo' => 'DDD012', 'precio' => 123]

        // );

        $productos = Productoo::all();

        return view('vistas.productos', compact('productos'));
    }

    public function patrones(){
        return view('vistas.patrones');
    }

    public function patron($nombre){
        return view("patrones.$nombre", ['type' => $nombre]);
    }
}
