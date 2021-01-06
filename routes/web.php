<?php

use Illuminate\Support\Facades\Route;

// VISTAS

Route::get('/bienvenido', 'NotasControlador@bienvenido');
Route::get('/foto', 'NotasControlador@foto' )->name('foto');
Route::get('/blog', 'NotasControlador@blog')->name('blog');
Route::get('/home/{nombre?}', 'NotasControlador@home')->name('home');
Route::get('/productos', 'NotasControlador@productos')->name('productos');

Route::get('/patrones', 'NotasControlador@patrones')->name('patrones');
Route::get('/patron/{nombre}', 'NotasControlador@patron')->name('patron');

// API REST
// read all
Route::get('/', 'NotasControlador@root')->name('notas.menu')
->middleware('mantenimiento:on', 'mantenimiento2');

Route::get('/mantenimiento', function(){
    return view('mantenimiento');
});

// read individual
Route::get('/detalle/{id}', 'NotasControlador@detalle')->name('notas.detalle');

// insert
Route::post('/', 'NotasControlador@crear')->name('notas.crear');
Route::delete('/eliminar/{id}', 'NotasControlador@eliminar')->name('notas.eliminar');

Route::get('/editar/{id}', 'NotasControlador@editar')->name('notas.editar');
Route::put('/update/{id}', 'NotasControlador@update')->name('notas.update');

Route::get('/volver', 'NotasControlador@volver')->name('editar.volver');

// VALIDACION DE FORMULARIOS

Route::get('/post/create', 'PostControlador@create');
Route::post('/post', 'PostControlador@store');

// CONSULTAS A LA BBDD EMPLEANDO EL ORM ELOQUENT COMO MODELO DE ACCESO A LA BBDD

Route::get('/vuelos/info', 'VueloControlador@info');

Route::get('/request', 'PostControlador@request');
Route::get('/datos/{dni?}', 'PostControlador@datosGet')->name('misDatos');
Route::post('/datosForm', 'PostControlador@datosRequest')->name('datosForm');

/* ACCESO A LA BBDD SIN MIGRACION */
// CON EL MIDDLEWARE DE MANTENIMIENTO
Route::group(['middleware'=>['mantenimiento:on']], function(){
    Route::get('/leer', 'MiControlador@leer');
    Route::get('/guardar', 'MiControlador@guardar');
    Route::get('/borrar', 'MiControlador@borrar');
    Route::get('/actualizar', 'MiControlador@actualizar');
});


// USO DE QUERY BUILDER

Route::get('/qbleer', 'ArticuloController@leer');
Route::get('/qbguardar', 'ArticuloController@guardar');
Route::get('/qbborrar', 'ArticuloController@borrar');
Route::get('/qbactualizar', 'ArticuloController@actualizar');



// USO DE MOCK.IO
// https://mockapi.io/projects/5ff39a8228c3980017b196e4

Route::get('/httpclient/get/{id?}', function($id=null){
    $url = 'https://5ff39a8228c3980017b196e3.mockapi.io/v1/datos/';
    // $url = 'https://jsonplaceholder/typicode.com/posts/';
    
    $client = new \GuzzleHttp\Client();
    $request = $client->get($url.$id);
    $response = $request->getBody();

    return $response;

});

Route::get('/httpclient/post', function(){
    $url = 'https://5ff39a8228c3980017b196e3.mockapi.io/v1/datos/';
    
    $client = new \GuzzleHttp\Client();

    $request = $client->post($url, [
        'form_params' => [
            'nombre'=> 'gaston', 
            'apellido'=> 'marcilio',
            'email'=> 'hola@hola.com'
        ]
    ]);

    $response = $request->getBody();
    // return $response;
    return redirect('/httpclient/get/');
    
});

Route::get('/httpclient/put/{id}', function($id){

    $url = 'https://5ff39a8228c3980017b196e3.mockapi.io/v1/datos/';
    
    $client = new \GuzzleHttp\Client();
    $request = $client->put($url.$id, [
        'form_params' => [
            'nombre'=> 'gabriela', 
            'apellido'=> 'magallanes',
            'email'=> 'hola@hola.com'
        ]
    ]);

    $response = $request->getBody();
    return $response;
    
});

Route::get('/httpclient/delete/{id}', function($id){

    $url = 'https://5ff39a8228c3980017b196e3.mockapi.io/v1/datos/';
    
    $client = new \GuzzleHttp\Client();
    $request = $client->delete($url.$id);
    
    $response = $request->getBody();
    return $response;
});



/* HELPERS */

Route::get('/helpers', 'MiControlador@helpers');

// SESSION

Route::get('/set', 'MiControlador@set');
Route::get('/get1', 'MiControlador@get1');
Route::get('/get2', 'MiControlador@get2');
Route::get('/forget1', 'MiControlador@forget1');

// REDIRECTION

Route::get('/redir', 'MiControlador@redir');





// COLLECTIONS

use Illuminate\Support\Collection;
use Illuminate\Support\Str;


Collection::macro('toUpper', function(){
    return $this->map(function($value){
        return Str::upper($value);
    });
});

Collection::macro('toLower', function(){
    return $this->map(function($value){
        return Str::lower($value);
    });
});

Route::get('/collections', function(){

    // $collection = \Collect([1,2,3])->all();
    $collection = \Collect(['Juan', 'Pedro', ''])
    ->map(function($name){
        dump( $name);
        return strtoupper($name);
    })
    ->reject(function($name){
        dump( $name);
        return empty($name);
    });


    $collectiones = \Collect(['Primero', 'Segundo']);
    $upper = $collectiones->toUpper();
    $lower = $collectiones->toLower();
    
    dump($collection);
    dump($upper);
    dump($lower);

    $coll = Collect([1,2,3,4,5,6,7,8]);
    $chunks = $coll->chunk(3);
    dump($chunks);

    return 'collections ok';


});