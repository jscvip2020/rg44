<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Ensaio;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Media;
use App\Models\Pagina;
use App\Models\Parceiro;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ControllerPrincipal extends Controller
{
    public $apiKey;
    public $user_id;
    public $apiKeyEnsaio;
    public $user_idEnsaio;
    public $perPageAlbum;
    public $perPageList;
    public $perPagePhoto;
    public $media;
    public $paginas;

    public function __construct()
    {
        $ensaio = Gallery::where('status', 1)->where('titulo', 'Ensaios')->first();
        if ($ensaio) {
            $this->apiKeyEnsaio = $ensaio->apikey;
            $this->user_idEnsaio = $ensaio->userid;
        }

        $this->paginas = Pagina::where('status', 1)->get();
        $gallery = Gallery::where('status', 1)->where('titulo', '<>', 'Ensaios')->first();
        $this->media = Media::where('status', 1)->get();
        if ($gallery) {
            $this->apiKey = $gallery->apikey;
            $this->user_id = $gallery->userid;
            $this->perPageAlbum = $gallery->perpagealbum;
            $this->perPagePhoto = $gallery->perpagephoto;
            $this->perPageList = $gallery->perpagelist;
        }
    }

    public function welcome()
    {
        $row = null;
        $medias = $this->media;
        $paginas = $this->paginas;
        return view('welcome', compact(['medias', 'paginas', 'row']));
    }

    public function eventos()
    {
        $row = null;
        $eventos = Event::where('status', 1)->orderBy('id', 'DESC')->paginate(10);
        $medias = $this->media;
        $paginas = $this->paginas;

        return view('frontend.eventos', compact(['medias', 'paginas', 'eventos', 'row']));
    }

    public function parceiros()
    {
        $row = null;
        $parceiros = Parceiro::where('status', 1)->paginate(10);
        $medias = $this->media;
        $paginas = $this->paginas;

        return view('frontend.parceiros', compact(['medias', 'paginas', 'parceiros', 'row']));
    }

    public function emailContato(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nome' => 'required|string',
            'email' => 'required|email',
            'assunto' => 'required|string|min:10',
            'mensagem' => 'required|min:20'
        ]);

        if ($validator->fails()) {
            return redirect()->route('contato')
                ->withErrors($validator)
                ->withInput();
        } else {

            Mail::send('emails.retorno', $request->all(), function ($message) {
                $message->to(request()->input('email'), request()->input('nome'))
                    ->subject('Email Recebido');
                $message->from('contato@rg44.com.br', 'RG44 Fotos');
            });
            Mail::send('emails.contato', request()->all(), function ($message) {
                $message->to('contato@fenixbyte.com', 'RG44 Fotos')
                    ->subject('Contato via Site - ' . request()->input('assunto'));
                $message->from(request()->input('email'), request()->input('nome'));
            });
            return redirect()->route('contato')->with('success', 'Email enviado com sucesso!');
        }
    }

    public function fotos()
    {
        $row = null;
        $apiurl = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&per_page={$this->perPageAlbum}&api_key={$this->apiKey}&user_id={$this->user_id}&format=json&nojsoncallback=1");
        $albuns = json_decode($apiurl);

        if ($albuns->stat != 'fail') {
            $albunsEnd = $albuns->photosets->photoset;
        } else {
            $albunsEnd = null;
        }

        $medias = $this->media;
        $paginas = $this->paginas;
        return view('frontend.fotos', compact(['albunsEnd', 'medias', 'paginas', 'row']));
    }

    public function album($id, $pg)
    {
        $row = null;
        $medias = $this->media;
        $paginas = $this->paginas;
        $urlAlbuns = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&per_page={$this->perPageAlbum}&api_key={$this->apiKey}&user_id={$this->user_id}&format=json&nojsoncallback=1");
        $albuns = json_decode($urlAlbuns);
        $apiUrl = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key={$this->apiKey}&photoset_id={$id}&user_id={$this->user_id}&per_page={$this->perPagePhoto}&page={$pg}&privacy_filter=1&format=json&nojsoncallback=1");
        $fotosBusca = json_decode($apiUrl);

        if ($fotosBusca->stat != 'fail') {
            $fotos = $fotosBusca->photoset;
        } else {
//            $pg = 1;
            $fotosBusca = json_decode(file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key={$this->apiKey}&photoset_id={$id}&user_id={$this->user_id}&per_page={$this->perPagePhoto}&page={$pg}&privacy_filter=1&format=json&nojsoncallback=1"));
            $fotos = $fotosBusca->photoset;
        }

        $urlAlbuns2 = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&api_key={$this->apiKey}&user_id={$this->user_id}&format=json&nojsoncallback=1");
        $albuns2 = json_decode($urlAlbuns2);
        $albunsEnd = $albuns2->photosets->photoset;
        $desc = $albuns->photosets->photoset[0]->description->_content;
//        dd($albunsEnd);

        return view('frontend.album', compact(['fotos', 'pg', 'id', 'desc', 'albunsEnd', 'medias', 'paginas', 'row']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function albumBusca(Request $request)
    {
        $album = $request->album;
        $oldAlbum = $request->oldAlbum;
        if ($album == 0) {
            return Redirect::to("album/{$oldAlbum}/1");
        } else {
            return Redirect::to("album/{$album}/1");
        }
    }

    /**
     * @param null $pg
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function albumList($pg = null)
    {
        $row = null;
        $medias = $this->media;
        $paginas = $this->paginas;
        $apiurl = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&per_page={$this->perPageList}&api_key={$this->apiKey}&page={$pg}&user_id={$this->user_id}&format=json&nojsoncallback=1");
        $albuns = json_decode($apiurl);
        $albunsEnd = $albuns->photosets;
//dd($albunsEnd);
        return view('frontend.albunslist', compact(['albunsEnd', 'pg', 'medias', 'paginas', 'row']));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sobre()
    {
        $row = null;
        $medias = $this->media;
        $paginas = $this->paginas;
        return view('frontend.sobre', compact(['medias', 'paginas', 'row']));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function contato()
    {
        $row = null;
        $medias = $this->media;
        $paginas = $this->paginas;
        return view('frontend.contato', compact(['medias', 'paginas', 'row']));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function ensaios()
    {
        $data = ['user_id' => $this->user_idEnsaio, 'api_key' => $this->apiKeyEnsaio];
        $row = null;
        $medias = $this->media;
        $paginas = $this->paginas;
        $ensaios = Ensaio::where('status', 1)->paginate(12);
        return view('frontend.ensaios', compact('ensaios', 'row', 'medias', 'paginas', 'data'));
    }

    public function ensaio($id, $nome)
    {
        try {
            $ensaio = Ensaio::findOrFail($id);


            $medias = $this->media;
            $paginas = $this->paginas;

            $photoset_id = $ensaio->ensaio_id;
            $apiUrl = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key={$this->apiKeyEnsaio}&photoset_id={$photoset_id}&user_id={$this->user_idEnsaio}&privacy_filter=1&format=json&nojsoncallback=1");
            $album = json_decode($apiUrl);

            $apiUrl = file_get_contents("https://www.flickr.com/services/rest/?method=flickr.photosets.getInfo&api_key={$this->apiKeyEnsaio}&photoset_id={$photoset_id}&user_id={$this->user_idEnsaio}&format=json&nojsoncallback=1");
            $albumCapa = json_decode($apiUrl);
//            dd($albumCapa->stat);
            if ($albumCapa->stat != "fail") {
                $row = (object)[
                    'ensaio' => true,
                    'titulo' => $ensaio->nome . ' ' . $ensaio->sobrenome,
                    'texto' => $ensaio->cidadeuf,
                    'capa' => "https://farm" . $albumCapa->photoset->farm . ".staticflickr.com/" . $albumCapa->photoset->server . "/" . $albumCapa->photoset->primary . "_" . $albumCapa->photoset->secret . "_n.jpg",
                ];
            } else {
                $row = null;
            }
            if ($album->stat != "fail") {
                $fotos = $album->photoset;
            } else {
                $fotos = null;
            }

            return view('frontend.ensaio', compact('fotos', 'ensaio', 'row', 'medias', 'paginas'));
        } catch (ModelNotFoundException $e) {
            abort(404, 'Página de Ensaio não encontrada');
        }
    }
}
