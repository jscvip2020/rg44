<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensaio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'sobrenome',
        'cidadeuf',
        'atividade',
        'torcida',
        'sonho',
        'hobby',
        'frase',
        'musica',
        'personalidade',
        'mensagem',
        'ensaio_id',
        'link',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'linkedin',
        'tiktok',
        'status'
    ];
}
