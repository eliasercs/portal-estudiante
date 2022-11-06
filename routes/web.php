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


// Controlador que utilizo para testear mis entidades
use App\Http\Controllers\AcademicRecordController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\SolNotapController;
use App\Http\Controllers\GeneradorController;

// Controlador que utilizo para testear mis entidades
use App\Http\Controllers\EntidadController;

// controladores para  pdf
use App\Http\Controllers\NotasController;
use App\Http\Controllers\PdfController;

use App\Http\Controllers\AsintenteSocial;
use App\Http\Controllers\SolicitudEstudiantil;

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

//ruta para Competencias Especficas
Route::name('com_esp')->get('/com_esp', function () {
    return view('com_esp');
});

//ruta para Ficha de Avance Curricular en PDF
Route::name('PDF')->get('/descargaFAC/academic_record={id}', [PdfController::class, 'FAC']);
Route::name('PDF')->post('/descargaFAC/', [PdfController::class, 'create']);
Route::get('/avanceCurricular', [PdfController::class, 'view']);

Route::get('/home', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if (count($user->AcademicRecord) == 0) {
            return redirect()->to("/estudiante/matricular");
        }
        return view('home', ['bootstrap' => True]);
    } else {
        return "Usted no tiene autorización para acceder a este recurso";
    }
});


#Route::get('/',[listController::class,'index']);
Route::match(['get', 'post'], '/botman', [BotmanController::class, 'handle']);

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

Route::post('/Change-Password', [UserSettingsController::class, 'changePasswordNoAuth'])
    ->name('Change-Password');

Route::get('/register-ramos', [RegisterRamosController::class, 'create'])
    ->name('register-ramo.index');

Route::post('/register-ramos', [RegisterRamosController::class, 'store'])
    ->name('register-ramo.store');

Route::get('/inscripcion', [RamosController::class, 'get_AcademicRecord'])
    ->name('ramos.index');

Route::post('/inscripcion', [RamosController::class, 'index'])
    ->name('ramos.store');

Route::post('/inscribir/curso', [RamosController::class, 'store']);

Route::post('/inscripcion/seccion', [RamosController::class, 'inscribirSectionView']);

Route::get('/Academico', [RamosController::class, 'selectAcademicRecord'])
    ->name('cursos.index');
Route::post('/Academico', [RamosController::class, 'create']);

// Vista para matricular un usuario a una carrera
Route::get('/estudiante/matricular', [AcademicRecordController::class, 'create_view']);

// Vista para generar una nueva carrera
Route::get('/carreras/new', [CarreraController::class, 'create_view'])->name('register-carrera.index');

Route::post('/carreras/new', [CarreraController::class, 'create_carrera'])->name('register-carrera.store');;

// Vista para visualizar el listado de carreras disponibles
Route::get("/carreras/show", [CarreraController::class, 'show_carreras']);

Route::post('/estudiante/matricular', [AcademicRecordController::class, 'enroll']);

// Rutas para testear entidades
Route::get('/testing/user/id={id}', [EntidadController::class, 'checkUser']);
Route::get('/testing/academic-record/userid={id}', [EntidadController::class, 'checkAcademicRecord']);
Route::get('/testing/cursos/new', [EntidadController::class, 'createCursoView']);
Route::post('/testing/cursos/new', [EntidadController::class, 'createCurso']);
Route::get('/testing/cursos/seccion/new/curso_id={id}', [EntidadController::class, 'createSeccionView'])
    ->name("nueva_seccion");
Route::post('/cursos/seccion/new_seccion', [EntidadController::class, 'newSeccion']);
Route::post('/testing', [EntidadController::class, 'AddNewSection']);
#Route::get('/inscripcion', [InscripcionController::class,create]);
#-> name('inscripcion.agregar');

// Vista para visualizar solicitudes nota p
Route::get('/solinotap', [SolNotapController::class, 'index']);

//Visualizar en pdf los cursos inscritos
Route::name('print')->get('/imprimir/academic_record={id}', [GeneradorController::class, 'imprimir']);

Route::get("/course/delete", [RamosController::class, 'deleteCourseView']);
Route::post("/course/delete", [RamosController::class, 'destroy']);
Route::post("/modules/delete/course", [RamosController::class, 'deleteCourse']);


Route::get('/notas', [NotasController::class, 'index'])
    ->name('notas.index');

Route::get('/notas/new', [NotasController::class, 'creadorNotas'])
    ->name('notas.store');

Route::post('/notas/new', [NotasController::class, 'PonerNota'])
    ->name('notas.store');

#Rutas de Asistente Social, gen es para un rellenado rapido de la base de datos.
Route::get('/gen', [AsintenteSocial::class, 'gen']);

Route::get('/Asistente', [AsintenteSocial::class, 'selectAcademicRecord']);
Route::post('/Asistente', [AsintenteSocial::class, 'data']);
Route::post("/dias", [AsintenteSocial::class, 'dias']);
Route::post("/horas", [AsintenteSocial::class, 'horas']);
Route::post('/reservar', [AsintenteSocial::class, 'reservar']);
Route::post("/hour/delete", [AsintenteSocial::class, 'destroy'])->name("deletehour");;

#Rutas de Solicitudes estudiantiles
Route::get('/Solicitudes', [SolicitudEstudiantil::class, 'selectAcademicRecord']);
Route::post('/Solicitudes', [SolicitudEstudiantil::class, 'data']);
Route::post("/motivo", [SolicitudEstudiantil::class, 'motivo']);
Route::post("/solicitud", [SolicitudEstudiantil::class, 'solicitud']);



