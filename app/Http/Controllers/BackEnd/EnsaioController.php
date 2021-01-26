<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Ensaio;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnsaioController extends Controller
{
    public $apiKey;
    public $user_id;

    public function __construct()
    {
        $gallery = Gallery::where('status', 1)->where('titulo', 'Ensaios')->first();
        if ($gallery) {
            $this->apiKey = $gallery->apikey;
            $this->user_id = $gallery->userid;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = ['user_id' => $this->user_id, 'api_key' => $this->apiKey];
        $rows = Ensaio::orderBy('nome', 'DESC')->paginate(5);

        return view('admin.ensaios.index', compact('rows', 'data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apiurl = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&api_key={$this->apiKey}&user_id={$this->user_id}&format=json&nojsoncallback=1");
        $albunsJson = json_decode($apiurl);

        if ($albunsJson->stat != 'fail') {
            $albuns = $albunsJson->photosets->photoset;
        } else {
            $albuns = null;
        }

        return view('admin.ensaios.create', compact('albuns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'sobrenome' => 'required',
            'cidadeuf' => 'required',
            'grau_escolaridade' => 'required',
            'escolaridade' => 'required',
            'ensaio_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('ensaios.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $action = Ensaio::create($request->all());
            if ($action) {
                return redirect()->route('ensaios.index')->with('success', 'Ensaio inserido com sucesso!');
            } else {
                return redirect()->route('ensaios.index')->with('error', 'Ensaio não pode ser Inserido!');
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
        $apiurl = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&api_key={$this->apiKey}&user_id={$this->user_id}&format=json&nojsoncallback=1");
        $albunsJson = json_decode($apiurl);

        if ($albunsJson->stat != 'fail') {
            $albuns = $albunsJson->photosets->photoset;
        } else {
            $albuns = null;
        }

        try {
            $row = Ensaio::findOrFail($id);
            return view('admin.ensaios.edit', compact('row', 'albuns'));

        } catch (ModelNotFoundException $e) {
            return redirect()->route('ensaios.index')->with('error', 'Não foi possível encontrar o ENSAIO!');
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
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'sobrenome' => 'required',
            'cidadeuf' => 'required',
            'grau_escolaridade' => 'required',
            'escolaridade' => 'required',
            'ensaio_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('ensaios.edit', $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            try {
                $row = Ensaio::findOrFail($id);
                $action = $row->update($request->all());
                if ($action) {
                    return redirect()->route('ensaios.index')->with('success', 'Ensaio alterado com sucesso!');
                } else {
                    return redirect()->route('ensaios.index')->with('error', 'Não foi possível alterar o ensaio!');
                }
            } catch (ModelNotFoundException $e) {
                return redirect()->route('wnsaios.index')->with('error', 'Não foi possível encontrar o ensaio!');
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
        try {
            $row = Ensaio::findOrFail($id);

            $action = $row->delete();

            if ($action) {
                return redirect()->route('ensaios.index')->with('success', "Ensaio de $row->nome $row->sobrenome DELETADO com sucesso!");
            } else {
                return redirect()->route('ensaios.index')->with('error', "Não foi possível DELETAR o ensaio de $row->nome $row->sobrenome!");
            }

        } catch (ModelNotFoundException $e) {
            return redirect()->route('ensaios.index')->with('error', 'Não foi possível encontrar o ensaio!');
        }
    }

    /**
     * @param int $id
     * @param boolean $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status($id, $status)
    {
        try {
            $row = Ensaio::findOrFail($id);

            $action = $row->update(['status' => !$status]);

            if ($action) {
                return redirect()->route('ensaios.index')->with('success', 'STATUS do ENSAIO atualizado com sucesso!');
            } else {
                return redirect()->route('ensaios.index')->with('error', 'Não foi possível atualiza STATUS do ENSAIO!');
            }

        } catch (ModelNotFoundException $e) {
            return redirect()->route('ensaios.index')->with('error', 'Não foi possível encontrar o ensaio!');
        }
    }
}
