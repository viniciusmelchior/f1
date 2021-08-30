<?php

use App\Http\Controllers\CampeaoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\PistaController;
use App\Http\Controllers\TemporadaController;
use App\Http\Controllers\EventoController;
use App\Models\Campeao;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

/*rotas de admnistrador */
route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

route::get('/form-adiciona-pais', [PaisController::class, 'create'])->name('form-adiciona-pais');
route::post('/adiciona-pais', [PaisController::class, 'store'])->name('adiciona_pais');

route::get('/form-adiciona-pista', [PistaController::class, 'create'])->name('form-adiciona-pista');
route::post('/adiciona-pista', [PistaController::class, 'store'])->name('adiciona-pista');

route::get('/form-adiciona-piloto', [PilotoController::class, 'create'])->name('form-adiciona-piloto');
route::post('/adiciona-piloto', [PilotoController::class, 'store'])->name('adiciona-piloto');

route::get('/form-adiciona-equipe', [EquipeController::class, 'create'])->name('form-adiciona-equipe');
route::post('/adiciona-equipe', [EquipeController::class, 'store'])->name('adiciona-equipe');

route::get('/form-adiciona-temporada', [TemporadaController::class, 'create'])->name('form-adiciona-temporada');
route::post('/adiciona-temporada', [TemporadaController::class, 'store'])->name('adiciona-temporada');
route::get('/temporadas', [TemporadaController::class, 'index'])->name('temporadas');
route::get('/temporadas/edit/{id}', [TemporadaController::class, 'edit'])->name('temporadas-edit-form');
route::put('/temporadas/edit/{id}', [TemporadaController::class, 'update'])->name('editar-temporada');
route::get('/temporada/deleta/{id}', [TemporadaController::class, 'destroy'])->name('deleta-temporada');

route::get('/form-adiciona-campeao', [CampeaoController::class, 'create'])->name('form-adiciona-campeao');
route::post('/adiciona-campeao', [CampeaoController::class, 'store'])->name('adiciona-campeao');

route::get('form-adiciona-evento', [EventoController::class, 'create'])->name('form-adiciona-evento');
route::post('adiciona-evento', [EventoController::class, 'store'])->name('adiciona-evento');

route::get('deleta-evento/{id}', [EventoController::class, 'destroy'])->name('deleta-evento');
route::get('form-edita-evento/{id}', [EventoController::class, 'edit'])->name('form-edita-evento');
route::put('form-edita-evento/edita-evento/{id}', [EventoController::class, 'update'])->name('edita-evento');


route::get('deleta-campeao/{id}', [CampeaoController::class, 'destroy'])->name('deleta-campeao');
route::get('edita-campeao/{id}', [CampeaoController::class, 'edit'])->name('edita-campeao');
route::put('editar-campeao/{id}', [CampeaoController::class, 'update'])->name('edita-campeao');




//Route::get('/user', [UserController::class, 'index']);
