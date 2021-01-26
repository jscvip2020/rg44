<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

use App\Models\Noticia;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Noticia::orderBy('id','DESC')->paginate(10);

        return view('admin.noticia.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noticia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statement = Noticia::OrderBy('id', 'DESC')->first();
        if ($statement) {
            $ultimoID = $statement->id;
        } else {
            $ultimoID = 0;
        }
        $id = $ultimoID + 1;

        preg_match_all('/(http:\/\/[^\s]+)/', $request->texto, $text);
        $imagemText = [];
        foreach ($text[0] as $urlText) {
            $urlImagem = explode("/", $urlText);
            $imagemText[] .= explode("\"", end($urlImagem))[0];

        }
        foreach (File::glob('images/noticias/images/*.*') as $imagem) {
            $url = explode("/", $imagem);
            $imagem = end($url);
            $idImg = explode("-", $imagem)[0];
            if($idImg == $id){
                if(!in_array($imagem, $imagemText)){
                    $file_path = "images/noticias/images/" . $imagem;

                    if (file_exists($file_path)) {
                        File::delete($file_path);
                    }
                }

            }
        }

        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'texto' => 'required',
            'capa' => 'mimes:jpg,png,jpeg|max:2000'
        ]);

        if ($validator->fails()) {
            return redirect()->route('noticias.create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $imageName = time().'.'.$request->capa->getClientOriginalExtension();
            $img = Image::make($request->capa->getRealPath());
            $width = getimagesize($request->capa)[0];
            $height = getimagesize($request->capa)[1];
            if ($width >= $height) {
                $img->resize(800, null, function ($c) {
                    $c->aspectRatio();
                });
            } else {
                $img->resize(null, 800, function ($c) {
                    $c->aspectRatio();
                });
            }
            $sucessImagem = $img->save('images/noticias/capas/'.$imageName);
            if ($sucessImagem) {
                $action = noticia::create([
                    'titulo' => $request->titulo,
                    'slug' => Str::slug($request->titulo, '-'),
                    'texto' => $request->texto,
                    'capa' => $imageName
                ]);
            } else {
                return redirect()->route('noticias.index')->with('error', 'Noticia não pode ser Inserida!');
            }
            if ($action) {
                return redirect()->route( 'noticias.index')->with('success', 'Noticia inserida com sucesso!');
            } else {
                return redirect()->route('noticias.index')->with('error', 'Noticia não pode ser Inserida!');
            }

        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $row = Noticia::findOrFail($id);
            return view('admin.noticia.show', compact('row'));
        }catch (ModelNotFoundException $e){
            return redirect()->route('noticias.index')->with('error', 'Não foi possível encontrar a noticia!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $row= Noticia::findOrFail($id);
            return view('admin.noticia.edit', compact('row'));

        }catch (ModelNotFoundException $e){
            return redirect()->route('noticias.index')->with('error', 'Não foi possível encontrar a NOTICIA!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        preg_match_all('/(http:\/\/[^\s]+)/', $request->texto, $text);
        $imagemText = [];
        foreach ($text[0] as $urlText) {

            $urlImagem = explode("/", $urlText);
            $imagemText[] .= explode("\"", end($urlImagem))[0];

        }

        foreach (File::glob('images/noticias/images/*.*') as $imagem) {
            $url = explode("/", $imagem);
            $imagem = end($url);
            $idImg = explode("-", $imagem)[0];
            if($idImg == $id){
                if(!in_array($imagem, $imagemText)){
                    $file_path = "images/noticias/images/" . $imagem;

                    if (file_exists($file_path)) {
                       File::delete($file_path);
                    }
                }

            }
        }

        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'texto' => 'required',
            'capa' => 'mimes:jpg,png,jpeg|max:2000'
        ]);

        if ($validator->fails()) {
            return redirect()->route('noticias.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }else{

            try {
                $row = Noticia::findOrFail($id);
                if ($request->capa == null) {
                    $action = $row->update([
                        'titulo' => $request->titulo,
                        'slug' => Str::slug($request->titulo, '-'),
                        'texto' => $request->texto,
                    ]);
                }else {
                    $file_path = "images/noticias/capas/" . $row->capa;
                    $imageName = time().'.'.$request->capa->getClientOriginalExtension();
                    $img = Image::make($request->capa->getRealPath());
                    $width = getimagesize($request->capa)[0];
                    $height = getimagesize($request->capa)[1];
                    if ($width >= $height) {
                        $img->resize(800, null, function ($c) {
                            $c->aspectRatio();
                        });
                    } else {
                        $img->resize(null, 800, function ($c) {
                            $c->aspectRatio();
                        });
                    }
                    if (file_exists($file_path)) {
                        File::delete($file_path);
                    };

                    $sucessImagem = $img->save('images/noticias/capas/'.$imageName);

                    if ($sucessImagem) {
                        $action = $row->update([
                            'titulo' => $request->titulo,
                            'slug' => Str::slug($request->titulo, '-'),
                            'texto' => $request->texto,
                            'capa' => $imageName
                        ]);
                    }else {
                        return redirect()->route('noticias.index')->with('error', 'Noticia não pode ser Modificada!');
                    }
                }
                if ($action) {
                    return redirect()->route( 'noticias.index')->with('success', 'Noticia modificada com sucesso!');
                } else {
                    return redirect()->route('noticias.index')->with('error', 'Noticia não pode ser modificada!');
                }

            }catch (ModelNotFoundException $e){
                return redirect()->route('noticiass.index')->with('error', 'Não foi possível encontrar a noticia!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $row = Noticia::findOrFail($id);
            $caminho = public_path("images/noticias/capas/" . $row->capa);

            preg_match_all('/(http:\/\/[^\s]+)/', $row->texto, $text);
            $imagemText = [];
            foreach ($text[0] as $urlText) {

                $urlImagem = explode("/", $urlText);
                $imagemText[] .= explode("\"", end($urlImagem))[0];

            }

            foreach (File::glob('images/noticias/images/*.*') as $imagem) {
                $url = explode("/", $imagem);
                $imagem = end($url);
                $idImg = explode("-", $imagem)[0];
                if($idImg == $id){
                    if(in_array($imagem, $imagemText)){

                        $file_path = "images/noticias/images/" . $imagem;
                        if (file_exists($file_path)) {
                            File::delete($file_path);
                        }
                    }

                }
            }
            if (file_exists($caminho)) {
                  if(File::delete($caminho)) {
                    $action = $row->delete();
                }
            }

            if ($action) {
                return redirect()->route('noticias.index')->with('success', "Noticia $row->titulo DELETADA com sucesso!");
            } else {
                return redirect()->route('noticias.index')->with('error', "Não foi possível DELETAR a Noticia  $row->titulo!");
            }

        }catch (ModelNotFoundException $e){
            return redirect()->route('noticias.index')->with('error', 'Não foi possível encontrar a Noticia!');
        }
    }

    /**
     * @param int $id
     * @param boolean $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status($id, $status)
    {
        try{
            $row = Noticia::findOrFail($id);

            $action = $row->update(['status' => !$status]);

            if ($action){
                return redirect()->route('noticias.index')->with('success', 'STATUS da NOTICIA atualizado com sucesso!');
            }else{
                return redirect()->route('noticias.index')->with('error', 'Não foi possível atualiza STATUS da NOTICIA!');
            }

        }catch (ModelNotFoundException $e){
            return redirect()->route('noticias.index')->with('error', 'Não foi possível encontrar a noticia!');
        }
    }

    /**
     * @param int $id
     * @param boolean $fixo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function fixo($id, $fixo)
    {
        try{
            $row = Noticia::findOrFail($id);

            if ($fixo == 0){
                $n = Noticia::where('fixo',1)->get();
                if(count($n) == 4){
                    return redirect()->route('noticias.index')->with('error', 'Já existe 4 notícias fixadas, desfixe uma primeiro para fixar outra!');
                }
            }

            $action = $row->update(['fixo' => !$fixo]);

            if ($action){
                return redirect()->route('noticias.index')->with('success', 'NOTICIA fixada com sucesso!');
            }else{
                return redirect()->route('noticias.index')->with('error', 'Não foi possível fixar a NOTICIA!');
            }

        }catch (ModelNotFoundException $e){
            return redirect()->route('noticias.index')->with('error', 'Não foi possível encontrar a noticia!');
        }
    }

}
