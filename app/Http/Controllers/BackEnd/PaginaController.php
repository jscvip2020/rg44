<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Itempagina;
use App\Models\Pagina;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas     = Pagina::all();
        return view('admin.pagina.index', compact('paginas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pagina.create');
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
            'nome' => 'required|unique:paginas|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->route('paginas.create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $request['slug'] = Str::slug($request->nome,'-');
            $action = Pagina::create($request->all());

            if ($action){
                return redirect()->route('paginas.index')->with('success', 'pagina inserida com sucesso!');
            }else{
                return redirect()->route('paginas.index')->with('error', 'Não foi possível inserir a pagina!');
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
            $pagina = Pagina::findOrFail($id);
            return view('admin.pagina.edit', compact('pagina'));

        }catch (ModelNotFoundException $e){
            return redirect()->route('paginas.index')->with('error', 'Não foi possível encontrar a pagina!');
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
            'nome' => 'required|max:255|unique:paginas,nome,'.$id,
        ]);

        if ($validator->fails()) {
            return redirect()->route('paginas.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }else{
            try {
                $request['slug'] = Str::slug($request->nome,'-');
                $pagina = Pagina::findOrFail($id);
                $action = $pagina->update($request->all());

                if ($action) {
                    return redirect()->route('paginas.index')->with('success', 'pagina inserida com sucesso!');
                } else {
                    return redirect()->route('paginas.index')->with('error', 'Não foi possível inserir a pagina!');
                }
            }catch (ModelNotFoundException $e){
                return redirect()->route('paginas.index')->with('error', 'Não foi possível encontrar a pagina!');
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
            $pagina = Pagina::findOrFail($id);
            $item = Itempagina::where('pagina_id',$id)->get();
            if($item->count()){
                return redirect()->route('paginas.index')->with('error', "O menu  contem items relacionados, mude os itens para outro menu ou exclua-os!");
            }else {
                $action = $pagina->delete();
                if ($action) {
                    return redirect()->route('paginas.index')->with('success', "pagina DELETADA com sucesso!");
                } else {
                    return redirect()->route('paginas.index')->with('error', "Não foi possível DELETAR a pagina!");
                }
            }
        }catch (ModelNotFoundException $e){
            return redirect()->route('paginas.index')->with('error', 'Não foi possível encontrar a pagina!');
        }
    }


    public function status($id, $status)
    {
        try{
            $pagina = Pagina::findOrFail($id);

            $action = $pagina->update(['status' => !$status]);

            if ($action){
                return redirect()->route('paginas.index')->with('success', 'STATUS da pagina atualizado com sucesso!');
            }else{
                return redirect()->route('paginas.index')->with('error', 'Não foi possível atualiza STATUS da pagina!');
            }

        }catch (ModelNotFoundException $e){
            return redirect()->route('paginas.index')->with('error', 'Não foi possível encontrar a pagina!');
        }
    }
}
