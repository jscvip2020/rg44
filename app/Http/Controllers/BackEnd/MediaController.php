<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::all();

        return view('admin.media.index', compact(['medias']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
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
            'nome' => 'required|unique:media|max:50',
            'url' => 'required',
            'faicon' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('medias.create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $action = Media::create($request->all());

            if ($action){
                return redirect()->route('medias.index')->with('success', 'MEDIA inserida com sucesso!');
            }else{
                return redirect()->route('medias.index')->with('error', 'Não foi possível inserir a MEDIA!');
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
            $row= Media::findOrFail($id);
            return view('admin.media.edit', compact('row'));

        }catch (ModelNotFoundException $e){
            return redirect()->route('medias.index')->with('error', 'Não foi possível encontrar a MEDIA!');
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
            'nome' => 'required|max:50|unique:media,nome,'.$id,
            'url' => 'required',
            'faicon' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('medias.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }else{
            try {
                $row = Media::findOrFail($id);
                $action = $row->update($request->all());

                if ($action) {
                    return redirect()->route('medias.index')->with('success', 'Media inserida com sucesso!');
                } else {
                    return redirect()->route('medias.index')->with('error', 'Não foi possível inserir a media!');
                }
            }catch (ModelNotFoundException $e){
                return redirect()->route('medias.index')->with('error', 'Não foi possível encontrar a media!');
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
            $row = Media::findOrFail($id);
            $action = $row->delete();
            if ($action){
                return redirect()->route('medias.index')->with('success', "Media $row->nome DELETADA com sucesso!");
            }else{
                return redirect()->route('medias.index')->with('error', "Não foi possível DELETAR a media  $row->nome!");
            }
        }catch (ModelNotFoundException $e){
            return redirect()->route('medias.index')->with('error', 'Não foi possível encontrar a media!');
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
            $row = Media::findOrFail($id);

            $action = $row->update(['status' => !$status]);

            if ($action){
                return redirect()->route('medias.index')->with('success', 'STATUS da MEDIA atualizado com sucesso!');
            }else{
                return redirect()->route('medias.index')->with('error', 'Não foi possível atualiza STATUS da MEDIA!');
            }

        }catch (ModelNotFoundException $e){
            return redirect()->route('medias.index')->with('error', 'Não foi possível encontrar a media!');
        }
    }
}
