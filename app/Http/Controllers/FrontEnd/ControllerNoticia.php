<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Noticia;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ControllerNoticia extends Controller
{
    public $media;

    public function __construct()
    {
        $this->media = Media::where('status', 1)->get();
    }
    public function index()
    {
        $row=null;
        $fixo = Noticia::where('status',1)->OrderBy('id', 'DESC')->where('fixo',1)->get();
        $capa = Noticia::where('status',1)->limit(5)->OrderBy('id', 'DESC')->get();
        $noticias = Noticia::where('status',1)->OrderBy('id', 'DESC')->paginate(12);
        $medias = $this->media;
        return view('frontend.noticias', compact(['fixo', 'capa', 'noticias', 'medias', 'row']));
    }

    public function single($id)
    {
        try{
            $medias = $this->media;
            $row = Noticia::findOrFail($id);
            return view('frontend.noticiasingle', compact('medias','row'));

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
        return view('frontend.noticiasfull', compact(['noticias', 'medias', 'row']));

    }
}
