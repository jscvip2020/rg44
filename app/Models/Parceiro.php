<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    use HasFactory;
    protected $fillable = [
        'imagem',
        'nome',
        'area',
        'endereco',
        'fones',
        'whatsapp',
        'email',
        'link',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'descricao',
        'status'];
}
