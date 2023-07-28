<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
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

Route::get('/', [AuthController::class, 'login']);
Route::get('/daftar', [AuthController::class, 'signUp']);

Route::post('/', [AuthController::class, 'login']);
Route::post('/daftar', [AuthController::class, 'signUp']);

Route::get('/keluar', [AuthController::class, 'logout']);

// patient
Route::get('/patient/home', [PatientController::class, 'home']);
Route::get('/patient/profil', [PatientController::class, 'profile']);
Route::post('/patient/profil', [PatientController::class, 'profile']);
Route::get('/patient/diagnosa', [PatientController::class, 'diagnosa']);
Route::post('/patient/diagnosa', [PatientController::class, 'diagnosa']);
Route::get('/patient/history', [PatientController::class, 'diagnosaList']);
Route::get('/patient/diagnosa/{id}/detail', [PatientController::class, 'diagnosaDetail']);

// doctor
Route::get('/doctor/home', [DoctorController::class, 'home']);
Route::get('/doctor/profil', [DoctorController::class, 'profile']);
Route::post('/doctor/profil', [DoctorController::class, 'profile']);
Route::get('/doctor/pasien', [DoctorController::class, 'patient']);
Route::get('/doctor/pasien/{id}/daftar-diagnosa', [DoctorController::class, 'diagnosaList']);
Route::get('/doctor/pasien/{id}/detail-diagnosa', [DoctorController::class, 'diagnosaDetail']);
Route::post('/doctor/suggest', [DoctorController::class, 'giveSuggestion']);
Route::get('/doctor/autentikasi', [DoctorController::class, 'authentication']);
Route::post('/doctor/autentikasi/update', [DoctorController::class, 'editAuthentication']);
Route::get('/doctor/autentikasi/delete/{id}', [DoctorController::class, 'deleteAuthentication']);
