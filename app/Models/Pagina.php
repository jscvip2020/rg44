<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;
    protected $fillable = ['nome','description','slug','status'];

    public function itensPagina()
    {
        return $this->hasMany(Itempagina::class);
    }
}
