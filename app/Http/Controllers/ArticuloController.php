<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

// use App\Models\Articulo;

class ArticuloController extends Controller
{
    public function leer(){

        // $articulos = DB::table('articulos')->get();

        // $articulos = DB::table('articulos')
        //                     ->where('nombre', 'TV33')
        //                     ->first();
        
        // $articulos = DB::table('articulos')
        //                     ->where('nombre', 'TV32')
        //                     ->value('precio');

        // $articulos = DB::table('articulos')->count();

        // $articulos = DB::table('articulos')->max('precio');

        // $articulos = DB::table('articulos')
        //             ->select('nombre', 'precio as costo')
        //             ->get();


        //////////////////////// RAW ////////////////////

        // $articulos = DB::table('articulos')
        //             ->select(DB::raw('count(*) as articulos_totales, status'))
        //             ->where('status', '<>', 0)
        //             ->groupBy('status')
        //             ->get();

        $articulos = DB::table('articulos')->where('stock', '>', 5)
        ->avg('precio');

        return $articulos;
        
    }
    public function guardar(){

        // DB::table('articulos')->insert([
        //     'nombre' => 'TV40',
        //     'descripcion' => 'tv grande',
        //     'codigo' => 'LCD40P',
        //     'stock' => 10,
        //     'precio' => 10987,
        //     'status' => 1,

        // ]);
        DB::table('articulos')->insert(
            [
                [
                    'nombre' => 'TV40',
                    'descripcion' => 'tv grande',
                    'codigo' => 'LCD40P',
                    'stock' => 10,
                    'precio' => 10987,
                    'status' => 1,
                ], 
                [
                    'nombre' => 'TV145',
                    'descripcion' => 'tv + grande',
                    'codigo' => 'LCD40P2',
                    'stock' => 100,
                    'precio' => 102987,
                    'status' => 1,
                ]
            ]
    );

        return 'ok guardado';

    }
    public function borrar(){
        DB::table('articulos')->where('id', '>', 5)->delete();

        return 'borrados';

    }
    public function actualizar(){
        DB::table('articulos')->where('id', 1)
        ->update([
            'precio' => 11111
        ]);

        return 'actualizado';

    }
}