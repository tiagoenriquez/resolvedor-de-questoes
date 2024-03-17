<?php

namespace App\Http\Controllers;

use App\Models\Alternativa;
use App\Models\Questao;
use Exception;
use Illuminate\Http\Request;

class AlternativaController extends Controller
{
    private $questaoController;

    public function __construct()
    {
        $this->questaoController = new QuestaoController();
    }

    public function ameacar(int $id) {
        try {
            return view('admin.alternativa.ameaca', ['alternativa' => Alternativa::findOrFail($id)]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function atualizar(Request $request, int $id) {
        try {
            $alternativa = Alternativa::findOrFail($id);
            $alternativa->update($request->all());
            return $this->questaoController->selecionar($alternativa->questao_id);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function cadastrar(int $questaoId) {
        try {
            return view('admin.alternativa.cadastro', ['questao' => Questao::findOrFail($questaoId)]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function editar(int $id) {
        try {
            return view('admin.alternativa.edicao', ['alternativa' => Alternativa::findOrFail($id)]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function excluir(int $id) {
        try {
            $alternativa = Alternativa::findOrFail($id);
            $alternativa->delete();
            return $this->questaoController->selecionar($alternativa->questao->id);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function inserir(Request $request) {
        try {
            $alternativa = Alternativa::create($request->all());
            return $this->questaoController->selecionar(($alternativa->questao_id));
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }
}
