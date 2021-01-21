<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Media;
use App\Models\Pagina;
use App\Models\Parceiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ControllerPrincipal extends Controller
{
    public $apiKey;
    public $user_id;
    public $perPageAlbum;
    public $perPageList;
    public $perPagePhoto;
    public $media;
    public $paginas;

    public function __construct()
    {
        $this->paginas = Pagina::where('status', 1)->get();
        $gallery = Gallery::where('status', 1)->where('titulo','<>','Ensaios')->first();
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
        $albunsEnd = $albuns->photosets->photoset;
        $desc = $albuns->photosets->photoset[0]->description->_content;
        return view('frontend.album', compact(['fotos', 'pg', 'id', 'desc', 'albunsEnd', 'medias', 'paginas', 'row']));
    }

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

    public function sobre()
    {
        $row = null;
        $medias = $this->media;
        $paginas = $this->paginas;
        return view('frontend.sobre', compact(['medias', 'paginas', 'row']));
    }

    public function contato()
    {
        $row = null;
        $medias = $this->media;
        $paginas = $this->paginas;
        return view('frontend.contato', compact(['medias', 'paginas', 'row']));
    }
}
