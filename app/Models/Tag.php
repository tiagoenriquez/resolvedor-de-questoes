<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function questoes() {
        return $this->belongsToMany(Questao::class, 'tag_de_questaos')->with('alternativas');
    }
}
