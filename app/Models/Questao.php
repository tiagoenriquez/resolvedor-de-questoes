<?php

namespace App\Models;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    use HasFactory;

    protected $fillable = ['enunciado', 'imagem'];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'tag_de_questaos');
    }

    public function alternativas() {
        return $this->hasMany(Alternativa::class)->orderBy('created_at');
    }

    public function setImagemAttribute(UploadedFile $imagem) {
        $nomeOriginal = $imagem->getClientOriginalName();
        $extensao = $imagem->getClientOriginalExtension();
        $nomeDaImagem = md5($imagem->getClientOriginalName() . strtotime("now")) . "-img." . $extensao;
        $imagem->move(public_path("images"), $nomeDaImagem);
        $this->attributes['enunciado'] = str_replace($nomeOriginal, $nomeDaImagem, $this->attributes['enunciado']);
    }
}
