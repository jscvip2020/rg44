<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ControllerPrincipal extends Controller
{
    public $apiKey;
    public $user_id;
    public $perPageAlbum;
    public $perPageList;
    public $perPagePhoto;

    public function __construct(){
        $this->apiKey = "2a954f40e7345b0413bb81157ff1ea02";
        $this->user_id = "144330139@N06";
        $this->perPageAlbum = 6;
        $this->perPagePhoto = 12;
        $this->perPageList = 12;
    }

    public function welcome(){
        return view('welcome');
    }
    public function fotos(){

        $apiurl = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&per_page={$this->perPageAlbum}&api_key={$this->apiKey}&user_id={$this->user_id}&format=json&nojsoncallback=1");
        $albuns = json_decode($apiurl);
        $albunsEnd =$albuns->photosets->photoset;

        return view('backend.fotos', compact('albunsEnd'));
    }

    public function album($id,$pg)
    {
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
        return view('backend.album', compact(['fotos', 'pg', 'id', 'desc', 'albunsEnd']));
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

        $apiurl = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&per_page={$this->perPageList}&api_key={$this->apiKey}&user_id={$this->user_id}&format=json&nojsoncallback=1");
        $albuns = json_decode($apiurl);
        $albunsEnd =$albuns->photosets;
//dd($albunsEnd);
        return view('backend.albunslist', compact(['albunsEnd', 'pg']));
    }

    public function noticias(){
        return view('backend.noticias');
    }
    public function sobre(){
        return view('backend.sobre');
    }
    public function contato(){
        return view('backend.contato');
    }
}
