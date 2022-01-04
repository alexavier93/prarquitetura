<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoImagem extends Model
{
    use HasFactory;

    protected $table = 'projeto_imagens';

    protected $fillable = [
        'projeto_id',
        'imagem',
        'thumbnail',
    ];

    public $timestamps = false;

    public function projeto()
    {
        return $this->belongsTo(Galeria::class);
    }

}
