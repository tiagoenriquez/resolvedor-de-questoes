<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    use HasFactory;

    protected $fillable = ['enunciado'];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'tag_de_questaos');
    }

    public function alternativas() {
        return $this->hasMany(Alternativa::class)->orderBy('created_at');
    }
}
