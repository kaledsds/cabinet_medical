<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/guest', function () {
  return view('auth.guest');
});


Route::get('/', [App\Http\Controllers\toguest::class, 'index']);


Route::get('/login', function () {
  return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/patients', App\Http\Controllers\PatientController::class);
Route::resource('/medecins', App\Http\Controllers\MedecinController::class);
Route::resource('/medicaments', App\Http\Controllers\MedicamentController::class);
Route::resource('/rdvs', App\Http\Controllers\RdvController::class);
Route::resource('/consultations', App\Http\Controllers\ConsultationController::class);
Route::resource('/prescriptions', App\Http\Controllers\PrescriptionController::class);
