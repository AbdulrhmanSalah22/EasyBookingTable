<?php

use App\Http\Controllers\Admin\dashboardController;
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

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/dashboard' , [dashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/mark' , function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
    });

require __DIR__.'/auth.php';
