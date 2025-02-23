<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SecurityQuestionsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PasswordRecoveryController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservaController;


Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');


Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/admin/reservas/events', [ReservaController::class, 'getEventsByConsultorio'])->name('admin.reservas.events');


Route::get('password-recovery', [PasswordRecoveryController::class, 'showEmailForm'])->name('recovery.password.step1');
Route::post('password-recovery/questions', [PasswordRecoveryController::class, 'showSecurityQuestions'])->name('recovery.password.step2');
Route::post('password-recovery/verify', [PasswordRecoveryController::class, 'verifySecurityAnswers'])->name('verify.security.answers');
Route::post('password-recovery/reset', [PasswordRecoveryController::class, 'resetPassword'])->name('reset.password');
Route::get('password-recovery/incorrect', function () {
    return view('auth.passwords.respuestas_incorrectas');
})->name('recovery.password.incorrect');


Route::get('security-questions', [SecurityQuestionsController::class, 'showSecurityQuestionsForm'])->name('show.security.questions.form');
Route::post('security-questions', [SecurityQuestionsController::class, 'setSecurityQuestions'])->name('set.security.questions');


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');


Route::prefix('ajax')->group(function () {
    Route::get('/consultorios/{id}', [App\Http\Controllers\WebController::class, 'cargar_datos_consultorios'])->name('cargar_datos_consultorios');
    Route::get('/admin/horarios/consultorios/{id}', [App\Http\Controllers\HorarioController::class, 'cargar_datos_consultorios'])->name('admin.horarios.cargar_datos_consultorios');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    
    $resources = [
        'usuarios' => App\Http\Controllers\UsuarioController::class,
        'secretarias' => App\Http\Controllers\SecretariaController::class,
        'pacientes' => App\Http\Controllers\PacienteController::class,
        'consultorios' => App\Http\Controllers\ConsultorioController::class,
        'doctores' => App\Http\Controllers\DoctorController::class,
        'horarios' => App\Http\Controllers\HorarioController::class,
    ];

   
    foreach ($resources as $resource => $controller) {
        Route::prefix("admin/{$resource}")->group(function () use ($controller, $resource) {
            Route::get('/', [$controller, 'index'])->name("admin.{$resource}.index")->middleware("can:admin.{$resource}.index");
            Route::get('/create', [$controller, 'create'])->name("admin.{$resource}.create")->middleware("can:admin.{$resource}.create");
            Route::post('/create', [$controller, 'store'])->name("admin.{$resource}.store")->middleware("can:admin.{$resource}.store");

            if ($resource === 'doctores') {
                Route::get('/reportes', [$controller, 'reportes'])->name("admin.{$resource}.reportes")->middleware("auth", "can:admin.{$resource}.reportes");
                Route::get('/pdf', [$controller, 'pdf'])->name("admin.{$resource}.pdf")->middleware("auth", "can:admin.{$resource}.pdf");
            }

            Route::get('/{id}', [$controller, 'show'])->name("admin.{$resource}.show")->middleware("can:admin.{$resource}.show");
            Route::get('/{id}/edit', [$controller, 'edit'])->name("admin.{$resource}.edit")->middleware("can:admin.{$resource}.edit");
            Route::put('/{id}', [$controller, 'update'])->name("admin.{$resource}.update")->middleware("can:admin.{$resource}.update");
            Route::get('/{id}/confirm-delete', [$controller, 'confirmDelete'])->name("admin.{$resource}.confirmDelete")->middleware("can:admin.{$resource}.confirmDelete");
            Route::delete('/{id}', [$controller, 'destroy'])->name("admin.{$resource}.destroy")->middleware("can:admin.{$resource}.destroy");
        });
    }

   
Route::prefix('admin/reservas')->group(function () {
    Route::get('/', [App\Http\Controllers\ReservaController::class, 'index'])
        ->name('admin.reservas.index')
        ->middleware('auth', 'can:admin.reservas.index');

    Route::get('/create', [App\Http\Controllers\ReservaController::class, 'create'])
        ->name('admin.reservas.create')
        ->middleware('auth', 'can:admin.reservas.create');

    Route::post('/', [App\Http\Controllers\ReservaController::class, 'store'])
        ->name('admin.reservas.store')
        ->middleware('auth', 'can:admin.reservas.store');

    Route::get('/{id}', [App\Http\Controllers\ReservaController::class, 'show'])
        ->name('admin.reservas.show')
        ->middleware('auth', 'can:admin.reservas.show');

    Route::get('/{id}/edit', [App\Http\Controllers\ReservaController::class, 'edit'])
        ->name('admin.reservas.edit')
        ->middleware('auth', 'can:admin.reservas.edit');

    Route::put('/{id}', [App\Http\Controllers\ReservaController::class, 'update'])
        ->name('admin.reservas.update')
        ->middleware('auth', 'can:admin.reservas.update');

    Route::delete('/{id}', [App\Http\Controllers\ReservaController::class, 'destroy'])
        ->name('admin.reservas.destroy')
        ->middleware('auth', 'can:admin.reservas.destroy');
});

Route::get('/admin/reservas/{id}/confirm-delete', [App\Http\Controllers\ReservaController::class, 'confirmDelete'])
    ->name('admin.reservas.confirmDelete')
    ->middleware('auth', 'can:admin.reservas.confirmDelete');

    
    Route::get('/calendar', [HomeController::class, 'showCalendar'])->name('calendar');

    
    Route::prefix('admin/historial')->group(function () {
        Route::get('/', [App\Http\Controllers\HistorialController::class, 'index'])->name('admin.historial.index')->middleware('auth', 'can:admin.historial.index');
        Route::get('/create', [App\Http\Controllers\HistorialController::class, 'create'])->name('admin.historial.create')->middleware('auth', 'can:admin.historial.create');
        Route::post('/create', [App\Http\Controllers\HistorialController::class, 'store'])->name('admin.historial.store')->middleware('auth', 'can:admin.historial.store');
        Route::get('/pdf/{id}', [App\Http\Controllers\HistorialController::class, 'pdf'])->name('admin.historial.pdf')->middleware('auth', 'can:admin.historial.pdf');
        Route::get('/buscar_paciente', [App\Http\Controllers\HistorialController::class, 'buscar_paciente'])->name('admin.historial.buscar_paciente')->middleware('auth', 'can:admin.historial.buscar_paciente');
        Route::get('/pdf/paciente/{id}', [App\Http\Controllers\HistorialController::class, 'imprimir_historial'])->name('admin.historial.imprimir_historial')->middleware('auth', 'can:admin.historial.imprimir_historial');
        Route::get('/{id}', [App\Http\Controllers\HistorialController::class, 'show'])->name('admin.historial.show')->middleware('auth', 'can:admin.historial.show');
        Route::get('/{id}/edit', [App\Http\Controllers\HistorialController::class, 'edit'])->name('admin.historial.edit')->middleware('auth', 'can:admin.historial.edit');
        Route::put('/{id}', [App\Http\Controllers\HistorialController::class, 'update'])->name('admin.historial.update')->middleware('auth', 'can:admin.historial.update');
        Route::get('/{id}/confirm-delete', [App\Http\Controllers\HistorialController::class, 'confirmDelete'])->name('admin.historial.confirm-delete')->middleware('auth', 'can:admin.historial.confirm-delete');
        Route::delete('/{id}', [App\Http\Controllers\HistorialController::class, 'destroy'])->name('admin.historial.destroy')->middleware('auth', 'can:admin.historial.destroy');
    });

    
    Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorarioController::class, 'edit'])->name('admin.horarios.edit');
    Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'update'])->name('admin.horarios.update');
});