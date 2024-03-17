<?php

namespace App\Http\Controllers;

use App\Models\Questao;
use App\Models\Tag;
use App\Models\TagDeQuestao;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestaoController extends Controller
{
    public function ameacar(int $id) {
        try {
            return view('admin.questao.ameaca', ['questao' => Questao::findOrFail($id)]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function atualizar(Request $request, int $id) {
        try {
            $questao = Questao::findOrFail($id);
            $questao->update($request->all());
            return $this->listar();
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function cadastrar() {
        return view('admin.questao.cadastro');
    }

    public function editar(int $id) {
        try {
            return view('admin.questao.edicao', ['questao' => Questao::findOrFail($id)]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function excluir(int $id) {
        try {
            $questao = Questao::findOrFail($id);
            $questao->delete();
            return $this->listar();
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function inserir(Request $request) {
        try {
            $questao = Questao::create($request->all());
            $questao->save();
            return $this->listar();
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function listar() {
        return view('admin.questao.lista', ['questoes' => DB::table('questaos')->orderByDesc('created_at')->get()]);
    }

    public function selecionar(int $id) {
        try {
            return view('admin.questao.selecionada', ['questao' => Questao::findOrFail($id)]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }
}
