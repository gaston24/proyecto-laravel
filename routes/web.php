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
Route::get('/', 'NotasControlador@root')->name('notas.menu');

// read individual
Route::get('/detalle/{id}', 'NotasControlador@detalle')->name('notas.detalle');

// insert
Route::post('/', 'NotasControlador@crear')->name('notas.crear');
Route::delete('/eliminar/{id}', 'NotasControlador@eliminar')->name('notas.eliminar');

Route::get('/editar/{id}', 'NotasControlador@editar')->name('notas.editar');
Route::put('/update/{id}', 'NotasControlador@update')->name('notas.update');


// VALIDACION DE FORMULARIOS

Route::get('/post/create', 'PostControlador@create');
Route::post('/post', 'PostControlador@store');

// CONSULTAS A LA BBDD EMPLEANDO EL ORM ELOQUENT COMO MODELO DE ACCESO A LA BBDD

Route::get('/vuelos/info', 'VueloControlador@info');

Route::get('/request', 'PostControlador@request');
Route::get('/datos/{dni?}', 'PostControlador@datosGet')->name('misDatos');
Route::post('/datosForm', 'PostControlador@datosRequest')->name('datosForm');

/* ACCESO A LA BBDD SIN MIGRACION */

Route::get('/leer', 'MiControlador@leer');
Route::get('/guardar', 'MiControlador@guardar');
Route::get('/borrar', 'MiControlador@borrar');
Route::get('/actualizar', 'MiControlador@actualizar');


/* HELPERS */

Route::get('/helpers', 'MiControlador@helpers');