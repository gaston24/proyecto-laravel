<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelo;

class VueloControlador extends Controller
{
    public function info(){
        // return "Vuelos OK";

        // $vuelos = Vuelo::all();
        
        // $vuelo = new Vuelo();
        // $vuelos = $vuelo->get();
        
        // $vuelos = Vuelo::where('demorado', 0)
        //                 ->orderBy('codigo', 'desc')    
        //                 ->take(1)
        //                 ->get();
        
        // $vuelo = new Vuelo();
        // $vuelos = $vuelo->where('demorado', 0)
        //                 ->orderBy('codigo', 'desc')    
        //                 // ->take(1)
        //                 ->get();


        // $vuelos = Vuelo::find(2);

        // $vuelos = Vuelo::where('activo', 0)
        //                 ->first();

        // $vuelos = Vuelo::find([1, 2]);

        // $vuelos = Vuelo::where('id', '>', '8')
        //                 ->firstOrFail();
        //                 // ->get();

        // $vuelos = Vuelo::where('activo', 1)->count();
        
        // $vuelos = Vuelo::where('activo', 1)->max('precio');
        


        // return $vuelos;



        /* CREATE */

        // $vuelo = new Vuelo();
        // $vuelo->codigo = 'UY345';
        // $vuelo->destino = 'URUGUAY';
        // $vuelo->demorado = 1;
        // $vuelo->activo = 1;
        // $vuelo->empresa = 'LAN';
        // $vuelo->precio = 3245.98;

        // $vuelo->save();

        // return 'Vuelo insertado en la bbdd';

        /* UPDATE */

        // $vuelo = Vuelo::find(5);

        // $vuelo->precio = 666;

        // $vuelo->save();


        
        /* CREATE AVANZADO */

        // $vuelo = Vuelo::create([
        //     'codigo' => 'US789'
        // ]);
        
        // $vuelo = Vuelo::create([
        //     'codigo' => 'PR589',
        //     'precio' => 5465.45
        // ]);

        // $vuelo = new Vuelo();
        // $vuelo->fill([
        //         'codigo' => 'ES765',
        //         'precio' => 3452.78
        //     ]);
        // $vuelo->save();

        /* UPDATE AVANZADO */

        /*
        Vuelo::where('activo', 1)
                ->where('destino', 'CHILE')
                ->update([
                    'demorado' => 0
                ]);
        
        
        $vuelo = Vuelo::firstOrCreate(['codigo'=>'AR456']);
        $vuelo->precio = 70000;
        $vuelo->demorado = 1;
        $vuelo->save();
        
        

        $vuelo = Vuelo::updateOrCreate(
            ['codigo' => 'GR865'],
            ['precio' => 5555]
        );

        return 'update ok';
        */

        /* DELETE Y DELETE AVANZADO */
        /*
        $vuelo = Vuelo::find(3);
        $vuelo->delete();
        
        
        $array = array(4, 5);
        $vuelo = Vuelo::destroy($array);
        
        */


        $vuelo = Vuelo::where('demorado',1)
            ->delete();

        return $vuelo;



    }
}
