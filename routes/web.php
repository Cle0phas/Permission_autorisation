<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\AssignPermissionController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserInfosController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These'
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/sendEmail',[MailController::class, 'sendEmail'])->name('mail.send');
// Route::get('/sendSolo',[MailController::class, 'sendSolo'])->name('mail.sendSolo');

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/posts',PostController::class)->middleware(['auth', 'verified']);


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group( function () {
    Route::get('/',[IndexController::class,'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::get('/assignations',[IndexController::class,'assign'])->name('assign');
    Route::resource('/assignRoles', AssignRoleController::class); 
    Route::resource('/assignPermissions', AssignPermissionController::class); 
    Route::resource('/userInfos',UserInfosController::class);
    Route::get('/userRemoveRole/{id}',[UserInfosController::class,'edit2'])->name('edit2');
    Route::post('/userRemoveRole/{id}',[UserInfosController::class,'update'])->name('edited2');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
