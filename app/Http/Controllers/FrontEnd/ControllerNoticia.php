<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Noticia;
use App\Models\Pagina;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ControllerNoticia extends Controller
{
    public $media;
    public $paginas;

    public function __construct()
    {
        $this->paginas = Pagina::where('status',1)->get();
        $this->media = Media::where('status', 1)->get();
    }
    public function index()
    {
        $row=null;
        $fixo = Noticia::where('status',1)->OrderBy('id', 'DESC')->where('fixo',1)->get();
        $capa = Noticia::where('status',1)->limit(5)->OrderBy('id', 'DESC')->get();
        $noticias = Noticia::where('status',1)->OrderBy('id', 'DESC')->paginate(12);
        $medias = $this->media;
        $paginas = $this->paginas;
        return view('frontend.noticias', compact(['paginas', 'fixo', 'capa', 'noticias', 'medias', 'row']));
    }

    public function single($id)
    {
        try{
            $medias = $this->media;
            $paginas = $this->paginas;
            $row = Noticia::findOrFail($id);
            return view('frontend.noticiasingle', compact(['paginas', 'medias','row']));

        }catch (ModelNotFoundException $e){
            return redirect()->route('noticias.all');
        }
    }

    public function all(Request $request)
    {
        if($request->all()){
            if($request->search) {
                $noticias = Noticia::where('status', 1)->where("titulo", "LIKE", "%{$request->search}%")->orWhere("texto", "LIKE", "%{$request->search}%")->paginate(12)->appends('search',$request->search);
            }else{
                $noticias = Noticia::where('status', 1)->paginate(12);
            }
        }else {
            $noticias = Noticia::where('status', 1)->paginate(12);
        }

        $row=null;
        $medias = $this->media;
        $paginas = $this->paginas;
        return view('frontend.noticiasfull', compact(['paginas', 'noticias', 'medias', 'row']));

    }
}
