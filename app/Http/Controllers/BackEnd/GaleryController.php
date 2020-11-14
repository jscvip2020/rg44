<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
            'titulo' => 'required|unique:galleries|max:255',
            'apikey' => 'required',
            'userid' => 'required',
            'perpagealbum' => 'required|integer',
            'perpagephoto' => 'required|integer',
            'perpagelist' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->route('galerias.create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $action = Gallery::create($request->all());

            if ($action){
                return redirect()->route('galerias.index')->with('success', 'Galeria inserida com sucesso!');
            }else{
                return redirect()->route('galerias.index')->with('error', 'Não foi possível inserir a galeria!');
            }

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
            $gallery = Gallery::findOrFail($id);
            return view('admin.gallery.edit', compact('gallery'));

        }catch (ModelNotFoundException $e){
            return redirect()->route('galerias.index')->with('error', 'Não foi possível encontrar a galeria!');
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
            'titulo' => 'required|max:255|unique:galleries,titulo,'.$id,
            'apikey' => 'required',
            'userid' => 'required',
            'perpagealbum' => 'required|integer',
            'perpagephoto' => 'required|integer',
            'perpagelist' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->route('galerias.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }else{
            try {
                $gallery = Gallery::findOrFail($id);
                $action = $gallery->update($request->all());

                if ($action) {
                    return redirect()->route('galerias.index')->with('success', 'Galeria inserida com sucesso!');
                } else {
                    return redirect()->route('galerias.index')->with('error', 'Não foi possível inserir a galeria!');
                }
            }catch (ModelNotFoundException $e){
                return redirect()->route('galerias.index')->with('error', 'Não foi possível encontrar a galeria!');
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
            $gallery = Gallery::findOrFail($id);
            $action = $gallery->delete();
            if ($action){
                return redirect()->route('galerias.index')->with('success', "Galeria $gallery->titulo DELETADA com sucesso!");
            }else{
                return redirect()->route('galerias.index')->with('error', "Não foi possível DELETAR a galeria  $gallery->titulo!");
            }
        }catch (ModelNotFoundException $e){
            return redirect()->route('galerias.index')->with('error', 'Não foi possível encontrar a galeria!');
        }
    }


    public function status($id, $status)
    {
        try{
            $gallery = Gallery::findOrFail($id);

            if (!$status){
                $galleryStatus = Gallery::all();
                foreach ($galleryStatus as $gStatus) {
                    $g = Gallery::find($gStatus->id);
                    $g->update(['status' => 0]);
                }
            }else{
                return redirect()->route('galerias.index')->with('error', 'Esta galeria já está ativa. Se quiser ative outra!');
            }

            $action = $gallery->update(['status' => !$status]);

            if ($action){
                return redirect()->route('galerias.index')->with('success', 'STATUS da galeria atualizado com sucesso!');
            }else{
                return redirect()->route('galerias.index')->with('error', 'Não foi possível atualiza STATUS da galeria!');
            }

        }catch (ModelNotFoundException $e){
            return redirect()->route('galerias.index')->with('error', 'Não foi possível encontrar a galeria!');
        }
        dd($gallery);
    }
}
