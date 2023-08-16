<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\viewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

/*Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');*/

Route::middleware('auth')->group(function () {

    Route::get('dashboard', function () {

        $viewController = app( viewController::class);
        $VisiterCount = $viewController->getVisiterCount();

        $AdminController = app( AdminController::class);
        $AdminCount = $AdminController->getAdminCount();

        $homeController = app( homeController::class);
        $HomeCount = $homeController->getHomeCount();

         $categoryController = app(categoryController::class);
         $categoryCount = $categoryController->getCategoryCount();

        $ReservationController = app(ReservationController::class);
        $ReserCount = $ReservationController->getReserCount();

         return view('dashboard', ['categoryCount' => $categoryCount ,'HomeCount' => $HomeCount],
             ['AdminCount' => $AdminCount,'ReserCount' => $ReserCount,'VisiterCount' => $VisiterCount]);
    })->name('dashboard');

    Route::controller(homeController::class)->prefix('home')->group(function () {
        Route::get('', 'index')->name('homes');
        Route::get('add', 'add')->name('homes.add');
        Route::post('add', 'save')->name('homes.save');
        Route::get('edit/{id}', 'edit')->name('homes.edit');
        Route::post('edit/{id}', 'update')->name('homes.update');
        Route::get('delete/{id}', 'delete')->name('homes.delete');
    });




    Route::controller(categoryController::class)->prefix('category')->group(function () {

        Route::get('', 'index')->name('category');
        Route::get('add', 'add')->name('category.add');
        Route::post('save', 'save')->name('category.save');
        Route::get('edit/{id}', 'edit')->name('category.edit');
        Route::post('edit/{id}', 'update')->name('category.update');
        Route::get('delete/{id}', 'delete')->name('category.delete');
    });



    Route::controller(AdminController::class)->prefix('admin')->group(function (){
        Route::get('', 'index')->name('admin');
        Route::post('add', 'save')->name('admin.save');
        Route::get('edit/{id}', 'edit')->name('admin.edit');
        Route::post('edit/{id}', 'update')->name('admin.update');
        Route::get('delete/{id}', 'delete')->name('admin.delete');
    });

    Route::controller(ReservationController::class)->prefix('reservation')->group(function (){
        Route::get('', 'show')->name('reserve');
        Route::post('add', 'save')->name('reserve.save');
        Route::get('edit/{id}', 'edit')->name('reserve.edit');
        Route::post('edit/{id}', 'update')->name('reserve.update');
        Route::get('delete/{id}', 'delete')->name('reserve.delete');
    });

    Route::controller(viewController::class)->prefix('visits')->group(function (){
        Route::get('', 'show')->name('visits');
        Route::post('add', 'save')->name('visits.save');
        Route::get('edit/{id}', 'edit')->name('visits.edit');
        Route::post('edit/{id}', 'update')->name('visits.update');
        Route::get('delete/{id}', 'delete')->name('visits.delete');

    });

});

