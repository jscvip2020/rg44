<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Itempagina;
use App\Models\Pagina;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ItemPaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Itempagina::orderBy('pagina_id','DESC')->paginate(10);

        return view('admin.itempagina.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paginas = Pagina::where('status',1)->get();
        return view('admin.itempagina.create', compact(['paginas']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statement = Itempagina::OrderBy('id', 'DESC')->first();
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
        foreach (File::glob(public_path('images/pags/*.*')) as $imagem) {
            $url = explode("/", $imagem);
            $imagem = end($url);
            $idImg = explode("-", $imagem)[0];
            if($idImg == $id){
                if(!in_array($imagem, $imagemText)){
                    $file_path = public_path("images/pags/" . $imagem);

                    if (file_exists($file_path)) {
                        File::delete($file_path);
                    }
                }

            }
        }

        $validator = Validator::make($request->all(), [
            'pagina_id' => 'required',
            'titulo' => 'required',
            'texto' => 'required',
            'capa' => 'mimes:jpg,png,jpeg|max:2000'
        ]);

        if ($validator->fails()) {
            return redirect()->route('itempaginas.create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $imageName = time().'.'.$request->capa->getClientOriginalExtension();
            $img = Image::make($request->capa->getRealPath());
            $img->resize(600, 600);
            $sucessImagem = $img->save(public_path('images/pags/capas/').$imageName);
            if ($sucessImagem) {
                $action = itempagina::create([
                    'pagina_id' => $request->pagina_id,
                    'titulo' => $request->titulo,
                    'slug' => Str::slug($request->titulo, '-'),
                    'texto' => $request->texto,
                    'capa' => $imageName
                ]);
            } else {
                return redirect()->route('itempaginas.index')->with('error', 'Itempagina não pode ser Inserida!');
            }
            if ($action) {
                return redirect()->route( 'itempaginas.index')->with('success', 'Itempagina inserida com sucesso!');
            } else {
                return redirect()->route('itempaginas.index')->with('error', 'Itempagina não pode ser Inserida!');
            }

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
            $itempagina= Itempagina::findOrFail($id);
            $paginas = Pagina::where('status',1)->get();
            //dd($imagemTextOld);
            return view('admin.itempagina.edit', compact('itempagina','paginas'));

        }catch (ModelNotFoundException $e){
            return redirect()->route('itempaginas.index')->with('error', 'Não foi possível encontrar a ITEMPAGINA!');
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

        foreach (File::glob(public_path('images/pags/*.*')) as $imagem) {
            $url = explode("/", $imagem);
            $imagem = end($url);
            $idImg = explode("-", $imagem)[0];
            if($idImg == $id){
                if(!in_array($imagem, $imagemText)){
                    $file_path = public_path("images/pags/" . $imagem);

                    if (file_exists($file_path)) {
                        File::delete($file_path);
                    }
                }

            }
        }

        $validator = Validator::make($request->all(), [
            'pagina_id' => 'required',
            'titulo' => 'required',
            'texto' => 'required',
            'capa' => 'mimes:jpg,png,jpeg|max:2000'
        ]);

        if ($validator->fails()) {
            return redirect()->route('itempaginas.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }else{

            try {
                $itempagina = Itempagina::findOrFail($id);
                if ($request->capa == null) {
                    $action = $itempagina->update([
                        'pagina_id' => $request->pagina_id,
                        'titulo' => $request->titulo,
                        'slug' => Str::slug($request->titulo, '-'),
                        'texto' => $request->texto,
                    ]);
                }else {
                    $file_path = public_path("images/pags/capas/" . $itempagina->capa);
                    $imageName = time().'.'.$request->capa->getClientOriginalExtension();
                    $img = Image::make($request->capa->getRealPath());
                    $img->resize(600, 600);

                    if (file_exists($file_path)) {
                        File::delete($file_path);
                    };

                    $sucessImagem = $img->save(public_path('images/pags/capas/').$imageName);

                    if ($sucessImagem) {
                        $action = $itempagina->update([
                            'pagina_id' => $request->pagina_id,
                            'titulo' => $request->titulo,
                            'slug' => Str::slug($request->titulo, '-'),
                            'texto' => $request->texto,
                            'capa' => $imageName
                        ]);
                    }else {
                        return redirect()->route('itempaginas.index')->with('error', 'Itempagina não pode ser Modificada!');
                    }
                }
                if ($action) {
                    return redirect()->route( 'itempaginas.index')->with('success', 'Itempagina modificada com sucesso!');
                } else {
                    return redirect()->route('itempaginas.index')->with('error', 'Itempagina não pode ser modificada!');
                }

            }catch (ModelNotFoundException $e){
                return redirect()->route('itempaginass.index')->with('error', 'Não foi possível encontrar a itempagina!');
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
            $row = Itempagina::findOrFail($id);
            $caminho = public_path("images/pags/capas/" . $row->capa);

            preg_match_all('/(http:\/\/[^\s]+)/', $row->texto, $text);
            $imagemText = [];
            foreach ($text[0] as $urlText) {
                $urlImagem = explode("/", $urlText);
                $imagemText[] .= explode("\"", end($urlImagem))[0];

            }

            foreach (File::glob(public_path('images/pags/*.*')) as $imagem) {
                $url = explode("/", $imagem);
                $imagem = end($url);
                $idImg = explode("-", $imagem)[0];
                if($idImg == $id){
                    if(in_array($imagem, $imagemText)){

                        $file_path = public_path("images/pags/" . $imagem);
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
                return redirect()->route('itempaginas.index')->with('success', "Item $row->titulo DELETADO com sucesso!");
            } else {
                return redirect()->route('itempaginas.index')->with('error', "Não foi possível DELETAR o item  $row->titulo!");
            }

        }catch (ModelNotFoundException $e){
            return redirect()->route('itempaginas.index')->with('error', 'Não foi possível encontrar o item!');
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
            $itempagina = Itempagina::findOrFail($id);

            $action = $itempagina->update(['status' => !$status]);

            if ($action){
                return redirect()->route('itempaginas.index')->with('success', 'STATUS da ITEMPAGINA atualizado com sucesso!');
            }else{
                return redirect()->route('itempaginas.index')->with('error', 'Não foi possível atualiza STATUS da ITEMPAGINA!');
            }

        }catch (ModelNotFoundException $e){
            return redirect()->route('itempaginas.index')->with('error', 'Não foi possível encontrar a itempagina!');
        }
    }

}
