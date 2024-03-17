<?php

use App\Http\Controllers\AlternativaController;
use App\Http\Controllers\QuestaoController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TagDeQuestaoController;
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
    return redirect('tag/selecionar');
});

Route::prefix('tag')->group(function() {
    Route::get('selecionar', [TagController::class, 'selecionar'])->name('selecionar-tag');
    Route::get('responder-questoes', [TagController::class, 'responderQuestoes'])->name('responder-questoes');
    Route::get('cadastrar', [TagController::class, 'cadastrar'])->name('cadastrar-tag');
    Route::get('listar', [TagController::class, 'listar'])->name('listar-tags');
    Route::get('editar/{id}', [TagController::class, 'editar'])->name('editar-tag');
    Route::get('ameacar/{id}', [TagController::class, 'ameacar'])->name('ameacar-tag');
    Route::post('inserir', [TagController::class, 'inserir'])->name('inserir-tag');
    Route::put('atualizar/{id}', [TagController::class, 'atualizar'])->name('atualizar-tag');
    Route::delete('excluir/{id}', [TagController::class, 'excluir'])->name('excluir-tag');
});

Route::prefix('questao')->group(function() {
    Route::get('cadastrar', [QuestaoController::class, 'cadastrar'])->name('cadastrar-questao');
    Route::get('listar', [QuestaoController::class, 'listar'])->name('listar-questoes');
    Route::get('editar/{id}', [QuestaoController::class, 'editar'])->name('editar-questao');
    Route::get('ameacar/{id}', [QuestaoController::class, 'ameacar'])->name('ameacar-questao');
    Route::get('selecionar/{id}', [QuestaoController::class, 'selecionar'])->name('selecionar-questao');
    Route::post('inserir', [QuestaoController::class, 'inserir'])->name('inserir-questao');
    Route::put('atualizar/{id}', [QuestaoController::class, 'atualizar'])->name('atualizar-questao');
    Route::delete('excluir/{id}', [QuestaoController::class, 'excluir'])->name('excluir-questao');
});

Route::prefix('tag-de-questao')->group(function() {
    Route::get('cadastrar/{questaoId}', [TagDeQuestaoController::class, 'cadastrar'])->name('cadastrar-tag-de-questao');
    Route::post('inserir', [TagDeQuestaoController::class, 'inserir'])->name('inserir-tag-de-questao');
    Route::delete('excluir/{questaoId}/{tagId}', [TagDeQuestaoController::class, 'excluir'])->name('excluir-tag-de-questao');
});

Route::prefix('alternativa')->group(function() {
    Route::get('cadastrar/{questaoId}', [AlternativaController::class, 'cadastrar'])->name('cadastrar-alternativa');
    Route::get('editar/{id}', [AlternativaController::class, 'editar'])->name('editar-alternativa');
    Route::get('ameacar/{id}', [AlternativaController::class, 'ameacar'])->name('ameacar-alternativa');
    Route::post('inserir', [AlternativaController::class, 'inserir'])->name('inserir-alternativa');
    Route::put('atualizar/{id}', [AlternativaController::class, 'atualizar'])->name('atualizar-alternativa');
    Route::delete('excluir/{id}', [AlternativaController::class, 'excluir'])->name('excluir-alternativa');
});
