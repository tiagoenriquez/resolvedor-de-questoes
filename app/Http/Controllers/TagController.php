<?php

namespace App\Http\Controllers;

use App\Models\Questao;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function ameacar(int $id) {
        try {
            return view('admin.tag.ameaca', ['tag' => Tag::findOrFail($id)]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function atualizar(Request $request, int $id) {
        try {
            $tag = Tag::findOrFail($id);
            $tag->update($request->all());
            return $this->listar();
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function cadastrar() {
        return view('admin.tag.cadastro');
    }

    public function editar(int $id) {
        try {
            return view('admin.tag.edicao', ['tag' => Tag::findOrFail($id)]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function excluir(int $id) {
        try {
            $tag = Tag::findOrFail($id);
            $tag->delete();
            return $this->listar();
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function inserir(Request $request) {
        try {
            $tag = Tag::create($request->all());
            $tag->save();
            return $this->listar();
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function listar() {
        return view('admin.tag.lista', ['tags' => Tag::with('questoes')->orderBy('nome')->get()]);
    }

    public function responderQuestoes(Request $request) {
        try {
            return view('site.responderQuestoes.index', ['questoes' => Tag::findOrFail($request->tag_id)->questoes]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function selecionar() {
        try {
            return view('site.selecionarTag', ['tags' => Tag::orderBy('nome')->get()]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }
}
