<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\PodaciController;
use App\Http\Controllers\PraceniPredmetKorupcijeController;
use App\Http\Controllers\TuzilastvoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Auth::routes(['/register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('podaci', PodaciController::class);
    Route::delete('podaci/{id}/destroy', [PodaciController::class, 'destroy'])->name('podaci.destroy');
    Route::resource('tuzilastvo', TuzilastvoController::class);
    Route::resource('praceni-predmeti-korupcije', PraceniPredmetKorupcijeController::class);
    Route::delete('praceni-predmeti-korupcije/{id}/destroy', [PraceniPredmetKorupcijeController::class, 'destroy'])->name('praceni-predmeti-korupcije.destroy');

    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});

Route::get('/', function () {
    return view('welcome', ['language' => 'bs']);
});

Route::get('/{language}/', function ($language) {
    return view('welcome', ['language' => $language]);
});
Route::get('/{language}/{tuzilastvo}/', function ($language, $tuzilastvo) {
    return view('welcome', ['language' => $language, 'tuzilastvo' => $tuzilastvo]);
});
Route::get('/{language}/{tuzilastvo}/{par2}/', function ($language, $tuzilastvo, $par2) {
    return view('welcome', ['language' => $language, 'parameter1' => $tuzilastvo, 'parameter2' => $par2]);
});

Route::get('/{language}/tuzilastvo/{id}/praceni-predmeti-korupcije', function ($language, $id) {
    return view('welcome', ['language' => $language, 'id' => $id]);
});

Route::get('/{language}/tuzilastvo/{id}/compare', function ($language, $id) {
    return view('welcome', ['language' => $language, 'id' => $id]);
});

