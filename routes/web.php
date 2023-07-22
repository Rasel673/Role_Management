<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\AdminLoginController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//user route------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// admin routes-------------
Route::group(['middleware' => ['auth:admin'],'prefix'=>'admin',],function () {
    Route::get('/',[AdminController::class,'dashboard'])->name('admin.index');

    // roles route-----
    Route::resource('roles',RoleController::class);

    //general user by admin route----------------
    Route::resource('users',UserController::class,['names' => 'admin.users']);
    // admin route-----
    Route::resource('admins',AdminController::class,['names' => 'admin.admins']);
    // admin logout route-----
    Route::post('/logout', [AdminLoginController::class, 'destroy']) ->name('admin.logout');
 });


 // admin logins route -----
 Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
 Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.store');
        
      
  


require __DIR__.'/auth.php';
