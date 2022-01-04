<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'titulo',
        'descricao',
        'imagem',
        'slug',
        'status'
    ];


    public function imagens()
    {
        return $this->hasMany(ProjetoImagem::class);
    }
}
