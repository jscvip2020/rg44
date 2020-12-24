<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Itempagina;
use App\Models\Media;
use App\Models\Pagina;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ControllerPagina extends Controller
{
    public $media;
    public $paginas;

    public function __construct()
    {
        $this->paginas = Pagina::where('status', 1)->get();
        $this->media = Media::where('status', 1)->get();
    }

    public function fullpagina($id, $slug){
        $paginas = $this->paginas;
        $medias = $this->media;
        try {
            $item = Pagina::findOrFail($id);
            $row = null;
            return view('frontend.fullpaginas', compact(['medias', 'paginas', 'item', 'row']));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('welcome');
        }
    }
    public function pagina($id, $slug)
    {
        $paginas = $this->paginas;
        $medias = $this->media;
        try {
            $item = Itempagina::findOrFail($id);
            $row = (object)[
                'titulo' => $item->titulo,
                'texto' => $item->texto,
                'capa' => $item->capa
            ];
            return view('frontend.paginas', compact(['medias', 'paginas', 'item', 'row']));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('welcome');
        }
    }
}
