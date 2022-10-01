<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotmanController;
use App\Http\Controllers\listController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\NewPasswordController;
use App\Mail\UCTtestMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\RegisterRamosController;
use App\Http\Controllers\RamosController;
use App\Http\Controllers\InscripcionController;

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


Route::get('/home', function () {
    return view('home');
});


#Route::get('/',[listController::class,'index']);
Route::match(['get', 'post'], '/botman', [BotmanController::class, 'handle']);

#Route::get('/',[listController::class,'index']);
Route::get('/info', function () {
    return view('info');
});


Route::get('/register', [RegisterController::class, 'create'])->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/', [SessionController::class, 'create'])->middleware('guest')->name('login.index');

Route::post('/', [SessionController::class, 'store'])->name('login.store');

Route::get('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');


Route::get('UCT', function () {
    $correo = new UCTtestMailable;

    Mail::to("testuct@gmail.com")->send($correo);

    return "mensaje enviado";
});

Route::post('/Change-Password', [UserSettingsController::class, 'changePasswordPost'])
    ->name('Change-Password');



Route::get('/register-ramos', [RegisterRamosController::class, 'create']) 
    -> name('register-ramo.index');

Route::post('/register-ramos', [RegisterRamosController::class, 'store'])
    ->name('register-ramo.store');

Route::get('/inscripcion', [RamosController::class, 'index']) 
    -> name('ramos.index');

Route::post('/inscripcion', [RamosController::class, 'store'])
    ->name('ramos.store');

Route::get('/tramos', [InscripcionController::class, 'create']) 
    -> name('cursos.index');

#Route::get('/inscripcion', [InscripcionController::class,create]);
    #-> name('inscripcion.agregar');