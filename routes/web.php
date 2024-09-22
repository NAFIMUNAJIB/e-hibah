<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController as MainController;
use App\Http\Controllers\ProposalController as ProposalController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\ProposalController as AdminProposalController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[MainController::class,'index'])->name('index');

Route::group(['prefix' => 'proposal','as' => 'proposal.'], function()
{
    Route::get('/',[ProposalController::class,'list'])->name('list');
    Route::get('create',[ProposalController::class,'create'])->name('create');
    Route::post('store',[ProposalController::class,'store'])->name('store');
});

Route::group(['prefix' => 'admin','as' => 'admin.'], function()
{
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('login',[AdminAuthController::class,'showLoginForm'])->name('login.show');
        Route::post('login',[AdminAuthController::class,'login'])->name('login');
        Route::get('logout',[AdminAuthController::class,'logout'])->name('logout');
    });
});

Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => 'admin'], function()
{
    Route::get('dashboard',[AdminMainController::class,'dashboard'])->name('dashboard');

    Route::get('proposal.datatable',[AdminProposalController::class,'datatable'])->name('proposal.datatable');
    Route::resource('proposal', AdminProposalController::class);

    Route::get('users.datatable',[AdminUsersController::class,'datatable'])->name('users.datatable');
    Route::resource('users', AdminUsersController::class);

});
