<?php

use App\Http\Controllers\Admin\ArquitetoController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProjetoController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteImovelProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/admin', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin');
Route::post('/admin/do_login', [App\Http\Controllers\Admin\AuthController::class, 'do_login'])->name('admin.do_login');
Route::get('/admin/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/password', [App\Http\Controllers\Admin\AuthController::class, 'password'])->name('admin.password');

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->name('admin.')->group(function(){

        Route::prefix('dashboard')->name('dashboard.')->group(function(){
            Route::get('', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');
        });

        Route::resources([
            'users' => UserController::class,
            'banners' => BannerController::class,
            'categorias' => CategoriaController::class,
            'projetos' => ProjetoController::class,
            'arquitetos' => ArquitetoController::class
        ]);

        // PROJETOS
        Route::prefix('projetos')->name('projetos.')->group(function(){
            Route::get('/{projeto}/edit}', [ProjetoController::class, 'edit'])->name('edit');
            Route::put('/update/{projeto}', [ProjetoController::class, 'update'])->name('update');
            Route::post('/delete', [ProjetoController::class, 'delete'])->name('delete');

            Route::post('/getProjeto', [ProjetoController::class, 'getProjeto'])->name('getProjeto');
            Route::post('/uploadProjeto', [ProjetoController::class, 'uploadProjeto'])->name('uploadProjeto');
            Route::post('/deleteImagem', [ProjetoController::class, 'deleteImagem'])->name('deleteImagem');
        });

        // CATEGORIAS
        Route::prefix('categorias')->name('categorias.')->group(function(){
            Route::post('/delete', [CategoriaController::class, 'delete'])->name('delete');
        });

        // ARQUITETOS
        Route::prefix('arquitetos')->name('arquitetos.')->group(function(){
            Route::post('/delete', [ArquitetoController::class, 'delete'])->name('delete');
        });
        
        // BANNERS
        Route::prefix('banners')->name('banners.')->group(function(){
            Route::post('/delete', [BannerController::class, 'delete'])->name('delete');
        });

        // USUÁRIOS
        Route::prefix('users')->name('users.')->group(function(){
            Route::post('/delete', [UserController::class, 'delete'])->name('delete');
        });

        // MESSAGES
        Route::prefix('messages')->name('messages.')->group(function(){
            Route::get('', [MessageController::class, 'index'])->name('index');
            Route::get('/{message}', [MessageController::class, 'show'])->name('show');
            Route::post('/delete', [MessageController::class, 'delete'])->name('delete');
        });

    });
    
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('projetos')->name('projetos.')->group(function(){
    Route::get('/', [App\Http\Controllers\ProjetoController::class, 'index'])->name('index');
    Route::get('/{slug}', [App\Http\Controllers\ProjetoController::class, 'info'])->name('info');
});

Route::prefix('contato')->name('contato.')->group(function(){
    Route::get('/', [App\Http\Controllers\ContatoController::class, 'index'])->name('index');
    Route::post('/sendMail', [App\Http\Controllers\ContatoController::class, 'sendMail'])->name('sendMail');
});