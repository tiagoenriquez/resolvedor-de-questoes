<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    use HasFactory;

    protected $fillable = ['texto', 'correta', 'justificativa', 'questao_id'];

    public function setQuestaoIdAttribute(int $questaoId) {
        foreach(Questao::findOrFail($questaoId)->alternativas as $alternativa) {
            if ($alternativa->correta && $this->attributes['correta']) {
                throw new Exception('Duas alternativas corretas na mesma questão');
            }
        }
        $this->attributes['questao_id'] = $questaoId;
    }

    public function questao() {
        return $this->belongsTo(Questao::class);
    }
}
