<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itempagina extends Model
{
    use HasFactory;
    protected $fillable = ['pagina_id', 'slug', 'titulo', 'capa', 'texto', 'status'];

    public function pagina()
    {
        return $this->belongsTo(Pagina::class);
    }
}
