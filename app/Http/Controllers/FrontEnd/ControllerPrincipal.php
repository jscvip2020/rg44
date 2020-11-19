<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ControllerPrincipal extends Controller
{
    public $apiKey;
    public $user_id;
    public $perPageAlbum;
    public $perPageList;
    public $perPagePhoto;
    public $media;

    public function __construct(){
        $gallery = Gallery::where('status',1)->first();
        $this->media = Media::where('status', 1)->get();
        if ($gallery) {
            $this->apiKey = $gallery->apikey;
            $this->user_id = $gallery->userid;
            $this->perPageAlbum = $gallery->perpagealbum;
            $this->perPagePhoto = $gallery->perpagephoto;
            $this->perPageList = $gallery->perpagelist;
        }
    }

    public function welcome(){
        $medias = $this->media;
//        dd($medias);
        return view('welcome', compact(['medias']));
    }
    public function fotos(){

        $apiurl = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&per_page={$this->perPageAlbum}&api_key={$this->apiKey}&user_id={$this->user_id}&format=json&nojsoncallback=1");
        $albuns = json_decode($apiurl);

        if ($albuns->stat != 'fail') {
            $albunsEnd = $albuns->photosets->photoset;
        }else{
            $albunsEnd = null;
        }
        $medias = $this->media;
        return view('frontend.fotos', compact(['albunsEnd', 'medias']));
    }

    public function album($id,$pg)
    {
        $medias = $this->media;
        $urlAlbuns = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&per_page={$this->perPageAlbum}&api_key={$this->apiKey}&user_id={$this->user_id}&format=json&nojsoncallback=1");
        $albuns = json_decode($urlAlbuns);
        $apiUrl = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key={$this->apiKey}&photoset_id={$id}&user_id={$this->user_id}&per_page={$this->perPagePhoto}&page={$pg}&privacy_filter=1&format=json&nojsoncallback=1");
        $fotosBusca = json_decode($apiUrl);
        if($fotosBusca->stat != 'fail'){
            $fotos = $fotosBusca->photoset;
        }else{
            $pg=1;
            $fotosBusca = json_decode(file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key={$this->apiKey}&photoset_id={$id}&user_id={$this->user_id}&per_page={$this->perPagePhoto}&page={$pg}&privacy_filter=1&format=json&nojsoncallback=1"));
            $fotos = $fotosBusca->photoset;
        }
        $albunsEnd = $albuns->photosets->photoset;
        $desc = $albuns->photosets->photoset[0]->description->_content;
        return view('frontend.album', compact(['fotos', 'pg', 'id', 'desc', 'albunsEnd', 'medias']));
    }

    public function albumBusca(Request $request)
    {
        $album = $request->album;
        $oldAlbum = $request->oldAlbum;
        if ($album == 0){
            return Redirect::to("album/{$oldAlbum}/1");
        }else{
            return Redirect::to("album/{$album}/1");
        }
    }

    public function albumList($pg=null)
    {
        $medias = $this->media;
        $apiurl = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&per_page={$this->perPageList}&api_key={$this->apiKey}&user_id={$this->user_id}&format=json&nojsoncallback=1");
        $albuns = json_decode($apiurl);
        $albunsEnd =$albuns->photosets;
//dd($albunsEnd);
        return view('frontend.albunslist', compact(['albunsEnd', 'pg', 'medias']));
    }

    public function noticias(){
        $medias = $this->media;
        return view('frontend.noticias', ['medias']);
    }
    public function sobre(){
        $medias = $this->media;
        return view('frontend.sobre', compact(['medias']));
    }
    public function contato(){
        $medias = $this->media;
        return view('frontend.contato', compact(['medias']));
    }
}
