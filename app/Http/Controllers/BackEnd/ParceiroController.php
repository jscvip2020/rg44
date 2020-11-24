<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Parceiro;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use File;

class ParceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Parceiro::paginate(10);

        return view('admin.parceiro.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parceiro.create');
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
            'nome' => 'required|unique:parceiros',
            'area' => 'required',
            'imagem' => 'required|mimes:jpg,png,jpeg',
            'endereco' => 'nullable|min:10',
            'descricao' => 'nullable|min:10'
        ]);

        if ($validator->fails()) {
            return redirect()->route('parceiros.create')
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
            $sucessImagem = $img->save(public_path('images/parceiros/').$imageName);
            if ($sucessImagem) {
                $action = Parceiro::create([
                    'nome' => $request->nome,
                    'area' => $request->area,
                    'imagem' => $imageName,
                    'endereco' => $request->endereco,
                    'fones' => $request->fones,
                    'whatsapp' => $request->whatsapp,
                    'email' => $request->email,
                    'link' => $request->link,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube,
                    'twitter' => $request->twitter,
                    'descricao' => $request->descricao
                ]);
            } else {
                return redirect()->route('parceiros.index')->with('error', 'Parceiro não pode ser Inserido!');
            }
            if ($action) {
                return redirect()->route( 'parceiros.index')->with('success', 'Parceiro inserido com sucesso!');
            } else {
                return redirect()->route('parceiros.index')->with('error', 'Parceiro não pode ser Inserido!');
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
            $row = Parceiro::findOrFail($id);
            return view('admin.parceiro.show', compact('row'));
        }catch (ModelNotFoundException $e){
            return redirect()->route('parceiros.index')->with('error', 'Não foi possível encontrar o parceiro!');
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
            $row= Parceiro::findOrFail($id);
            return view('admin.parceiro.edit', compact('row'));

        }catch (ModelNotFoundException $e){
            return redirect()->route('parceiros.index')->with('error', 'Não foi possível encontrar o PARCEIRO!');
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
            'nome' => 'required|unique:parceiros,nome,'.$id,
            'area' => 'required',
            'imagem' => 'mimes:jpg,png,jpeg',
            'endereco' => 'nullable|min:10',
            'descricao' => 'nullable|min:10'
        ]);
        if ($validator->fails()) {
            return redirect()->route('parceiros.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }else{
            try {
                $row = Parceiro::findOrFail($id);
                if ($request->imagem == null) {
                    $action = $row->update([
                        'nome' => $request->nome,
                        'area' => $request->area,
                        'endereco' => $request->endereco,
                        'fones' => $request->fones,
                        'whatsapp' => $request->whatsapp,
                        'email' => $request->email,
                        'link' => $request->link,
                        'facebook' => $request->facebook,
                        'instagram' => $request->instagram,
                        'youtube' => $request->youtube,
                        'twitter' => $request->twitter,
                        'descricao' => $request->descricao
                    ]);
                }else {
                    $file_path = public_path("images/parceiros/" . $row->imagem);

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

                    $sucessImagem = $img->save(public_path('images/parceiros/') . $imageName);
                    if ($sucessImagem) {
                        $action = $row->update([
                            'nome' => $request->nome,
                            'area' => $request->area,
                            'imagem' => $imageName,
                            'endereco' => $request->endereco,
                            'fones' => $request->fones,
                            'whatsapp' => $request->whatsapp,
                            'email' => $request->email,
                            'link' => $request->link,
                            'facebook' => $request->facebook,
                            'instagram' => $request->instagram,
                            'youtube' => $request->youtube,
                            'twitter' => $request->twitter,
                            'descricao' => $request->descricao
                        ]);
                    }
                }
                if ($action) {
                    return redirect()->route('parceiros.index')->with('success', 'Parceiro alterado com sucesso!');
                } else {
                    return redirect()->route('parceiros.index')->with('error', 'Não foi possível alterar o parceiro!');
                }
            }catch (ModelNotFoundException $e){
                return redirect()->route('parceiros.index')->with('error', 'Não foi possível encontrar o parceiro!');
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
            $row = Parceiro::findOrFail($id);
            $file_path = public_path("images/parceiros/" . $row->imagem);

            if (file_exists($file_path)) {
                if(File::delete($file_path)) {
                    $action = $row->delete();
                }
            }
            if ($action) {
                return redirect()->route('parceiros.index')->with('success', "Parceiro $row->titulo DELETADO com sucesso!");
            } else {
                return redirect()->route('parceiros.index')->with('error', "Não foi possível DELETAR o parceiro  $row->titulo!");
            }

        }catch (ModelNotFoundException $e){
            return redirect()->route('parceiros.index')->with('error', 'Não foi possível encontrar o parceiro!');
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
            $row = Parceiro::findOrFail($id);

            $action = $row->update(['status' => !$status]);

            if ($action){
                return redirect()->route('parceiros.index')->with('success', 'STATUS do PARCEIRO atualizado com sucesso!');
            }else{
                return redirect()->route('parceiros.index')->with('error', 'Não foi possível atualiza STATUS do PARCEIRO!');
            }

        }catch (ModelNotFoundException $e){
            return redirect()->route('parceiros.index')->with('error', 'Não foi possível encontrar o parceiro!');
        }
    }
}
