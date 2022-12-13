<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\PermissionController;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);
Route::view('/appointment-success', 'appointment-success')->name('appointment.success');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
});

Route::middleware(['auth', 'verified', 'role:user|admin'])->group(function () {
    Route::get('/home', [FrontendController::class, 'home'])->name('home');
    Route::get('/services', [FrontendController::class, 'services'])->name('services');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/about', [FrontendController::class, 'about'])->name('about');
    Route::get('/set-appointment', [FrontendController::class, 'setappointment'])->name('set-appointment');
});
require __DIR__ . '/auth.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
