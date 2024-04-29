<?php

use App\DataTables\RoleDataTable;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SomethingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignUpCtrl;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDataTableController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\employeesController;
use App\Http\Controllers\EmployeesController as ControllersEmployeesController;
use App\Http\Controllers\RoleController;
use App\Http\Livewire\RoleComponent;
use App\Http\Livewire\RoleTest;
use App\Http\Livewire\UserModal;
use Livewire\Livewire;
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




// Login Routes
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




Route::group(['prefix' => 'admin', "middleware" => "admin"], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/signUp', [SignUpCtrl::class, 'showSignUpForm'])->name('admin.signup');
    Route::post('/signUp', [SignUpCtrl::class, 'signUp']);

    // Route::get('/employee', [EmployeesController::class, 'getEmployee'])->name('admin.employee.data');
    Route::get('/employee', [EmployeesController::class, 'index'])->name('admin.employee');

    Route::get('/role', [RoleController::class, 'showRole'])->name('admin.role');
    Livewire::component('/role', RoleComponent::class);
    Livewire::component('/role', RoleDataTable::class);

});


// PUT

// FETCH API METHOD: "PUT"