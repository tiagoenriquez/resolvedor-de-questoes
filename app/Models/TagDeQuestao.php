<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TagDeQuestao extends Model
{
    protected $fillable = ['tag_id', 'questao_id'];

    use HasFactory;
}
