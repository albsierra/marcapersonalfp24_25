<?php

use App\Http\Controllers\ProyectosController;
use App\Http\Middleware\MyMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('proyectos', [ProyectosController::class, 'getIndex']);

Route::get('proyectos/show/{id}', [ProyectosController::class, 'getShow'])
->middleware('id_mayor_de_10'.':2,6')
->where('id', '[0-9]+');

Route::get('proyectos/create', [ProyectosController::class, 'getCreate']);

Route::get('proyectos/edit/{id}', [ProyectosController::class, 'getEdit'])->where('id', '[0-9]+');
