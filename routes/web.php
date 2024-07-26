<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsociacionController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//login
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [SessionController::class, 'login_post'])
    ->name('login');

Route::get('logout', [SessionController::class, 'destroy'])
    ->name('login.destroy');

//asociacion fase 1
Route::get('/', function () {
    return view('asociacion');
});

Route::post('/asociaciones', [AsociacionController::class, 'store'])->name('fase1');
Route::get('/', [AsociacionController::class, 'municipios']);

Route::get('/fase2', function () {
    return view('fase2');
});


//vista admin solo asociaciones fase1
Route::get('/fase1', function () {
    return view('admin/fase1');
});
Route::get('fase1/datatable', [AdminController::class, 'getasociaciones'])->name('datatable.fases');
Route::get('fase1/info-{id}', [AdminController::class, 'getdata'])->name('info.fases');
Route::get('fase1', [AdminController::class, 'agencias']);
Route::post('/fase2', [AdminController::class, 'validarafase2'])->name('validarfase2');
Route::post('/fase3-{id}', [AdminController::class, 'infofase3'])->name('validarfase3');
Route::post('/registrarfase3', [AdminController::class, 'registrarfase3'])->name('registrarfase3');



Route::get('/firmas', function () {

    return view('admin/firma');
});


Route::post('/firmas', [AdminController::class, 'store'])->name('guardar.firma');
Route::get('/firmas',  [AdminController::class, 'index']);
Route::delete('/firmas/{id}', [AdminController::class, 'delete'])->name('eliminar.firma');

Route::get('/fase3', function () {

    return view('admin/fase3');
});
