<?php

namespace App\Http\Controllers;

use App\Models\Questao;
use App\Models\TagDeQuestao;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagDeQuestaoController extends Controller
{
    private $questaoController;

    public function __construct()
    {
        $this->questaoController = new QuestaoController();
    }

    public function cadastrar(int $questaoId) {
        try {
            return view('admin.tagDeQuestao.cadastro', [
                'questao' => Questao::findOrFail($questaoId),
                'tags' => DB::table('tags')->orderBy('nome')->get()
            ]);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function inserir(Request $request) {
        try {
            $tagDeQuestao = TagDeQuestao::create($request->all());
            $tagDeQuestao->save();
            return $this->questaoController->selecionar($tagDeQuestao->questao_id);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }

    public function excluir(int $questaoId, int $tagId) {
        try {
            $tagDeQuestao = TagDeQuestao::where('questao_id', $questaoId)->where('tag_id', $tagId)->first();
            $tagDeQuestao->delete();
            return $this->questaoController->selecionar($questaoId);
        } catch (Exception $exception) {
            return $this->mostrarErro($exception->getMessage());
        }
    }
}
