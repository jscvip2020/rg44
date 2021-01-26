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
        'grau_escolaridade',
        'escolaridade',
        'graduadoem',
        'esporte',
        'sonho',
        'hobby',
        'frase',
        'musica',
        'personalidade',
        'prato',
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
