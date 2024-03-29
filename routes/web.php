<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
});
/*
Route::get('/create', function () {
    return view('empleados.create');
})->name('crear');

Route::get('/empleados/create', [EmpleadoController::class, 'create']);
*/
Route::resource('empleados', EmpleadoController::class)->middleware('auth');

/*
Route::get('/edit', function () {
    return view('empleados.edit');
})->name('editar');

Route::get('/form', function () {
    return view('empleados.form');
})->name('formulario');*/

Auth::routes(['register'=>false, 'reset'=>false ]);



Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});
