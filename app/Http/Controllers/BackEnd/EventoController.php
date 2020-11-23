<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use File;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Event::paginate(10);
        return view('admin.evento.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.evento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'data' => 'required',
            'local' => 'required',
            'imagem' => 'required|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('eventos.create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $imageName = time().'.'.$request->imagem->getClientOriginalExtension();
            $img = Image::make($request->imagem->getRealPath());
            $width = getimagesize($request->imagem)[0];
            $height = getimagesize($request->imagem)[1];
            if ($width >= $height) {
                $img->resize(800, null, function ($c) {
                    $c->aspectRatio();
                });
            } else {
                $img->resize(null, 800, function ($c) {
                    $c->aspectRatio();
                });
            }
            $sucessImagem = $img->save(public_path('images/eventos/').$imageName);
            if ($sucessImagem) {
                $action = Event::create([
                    'titulo' => $request->titulo,
                    'data' => $request->data,
                    'local' => $request->local,
                    'link' => $request->link,
                    'imagem' => $imageName,
                ]);
            } else {
                return redirect()->route('eventos.index')->with('error', 'Evento não pode ser Inserido!');
            }
            if ($action) {
                return redirect()->route( 'eventos.index')->with('success', 'Evento inserido com sucesso!');
            } else {
                return redirect()->route('eventos.index')->with('error', 'Evento não pode ser Inserido!');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $row = Event::findOrFail($id);
            return view('admin.evento.show', compact('row'));
        }catch (ModelNotFoundException $e){
            return redirect()->route('eventos.index')->with('error', 'Não foi possível encontrar a evento!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $row= Event::findOrFail($id);
            return view('admin.evento.edit', compact('row'));

        }catch (ModelNotFoundException $e){
            return redirect()->route('eventos.index')->with('error', 'Não foi possível encontrar a EVENTO!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'data' => 'required',
            'local' => 'required',
            'imagem' => 'mimes:jpg,png,jpeg',
        ]);
        if ($validator->fails()) {
            return redirect()->route('eventos.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }else{
            try {
                $row = Event::findOrFail($id);
                if ($request->imagem == null) {
                    $action = $row->update([
                        'titulo' => $request->titulo,
                        'data' => $request->data,
                        'local' => $request->local,
                        'link' => $request->link,
                    ]);
                }else {
                    $file_path = public_path("images/eventos/" . $row->imagem);

                    $imageName = explode(".", $row->imagem)[0] . '.' . $request->imagem->getClientOriginalExtension();
                    $img = Image::make($request->imagem->getRealPath());
                    $width = getimagesize($request->imagem)[0];
                    $height = getimagesize($request->imagem)[1];
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

                    $sucessImagem = $img->save(public_path('images/eventos/') . $imageName);
                    if ($sucessImagem) {
                        $action = $row->update([
                            'titulo' => $request->titulo,
                            'data' => $request->data,
                            'local' => $request->local,
                            'link' => $request->link,
                            'imagem' => $imageName,
                        ]);
                    }
                }
                if ($action) {
                    return redirect()->route('eventos.index')->with('success', 'Evento inserida com sucesso!');
                } else {
                    return redirect()->route('eventos.index')->with('error', 'Não foi possível inserir a evento!');
                }
            }catch (ModelNotFoundException $e){
                return redirect()->route('eventos.index')->with('error', 'Não foi possível encontrar a evento!');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $row = Event::findOrFail($id);
            $file_path = public_path("images/eventos/" . $row->imagem);

            if (file_exists($file_path)) {
                if(File::delete($file_path)) {
                    $action = $row->delete();
                }
            }
                if ($action) {
                    return redirect()->route('eventos.index')->with('success', "Evento $row->titulo DELETADO com sucesso!");
                } else {
                    return redirect()->route('eventos.index')->with('error', "Não foi possível DELETAR a evento  $row->titulo!");
                }

        }catch (ModelNotFoundException $e){
            return redirect()->route('eventos.index')->with('error', 'Não foi possível encontrar a evento!');
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
            $row = Event::findOrFail($id);

            $action = $row->update(['status' => !$status]);

            if ($action){
                return redirect()->route('eventos.index')->with('success', 'STATUS do EVENTO atualizado com sucesso!');
            }else{
                return redirect()->route('eventos.index')->with('error', 'Não foi possível atualiza STATUS do EVENTO!');
            }

        }catch (ModelNotFoundException $e){
            return redirect()->route('eventos.index')->with('error', 'Não foi possível encontrar o evento!');
        }
    }
}
