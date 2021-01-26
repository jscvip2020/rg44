<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 14:53
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - ensaios')
@section('content')
    @if($ensaios)
        <div class="content">
            <div class="flex justify-content-between tensaio pb-3">
                <i class="fa fa-photo-video" style="font-size: 2rem;"> Galeria de Ensaios</i>
                <div>{{ $ensaios->onEachSide(3)->links() }}</div>
            </div>
            <div class="ensaios">
                <?php $n = 1; ?>
                @foreach($ensaios as $ensaio)
                    <a href="{{ route('ensaio', [$ensaio->id, $ensaio->nome.'-'.$ensaio->sobrenome]) }}">
                        <div class="ensaios__album">
                            <div class="album__img">
                                <?php
                                $photoset_id = $ensaio->ensaio_id;
                                $apiUrl = file_get_contents("https://www.flickr.com/services/rest/?method=flickr.photosets.getInfo&api_key={$data['api_key']}&photoset_id={$photoset_id}&user_id={$data['user_id']}&format=json&nojsoncallback=1");
                                $album = json_decode($apiUrl);
                                ?>
                                @if($album->stat!='fail')
                                    <img width="250" height="166"
                                         src="https://farm{{$album->photoset->farm}}.staticflickr.com/{{$album->photoset->server . "/" . $album->photoset->primary . "_" . $album->photoset->secret}}_n.jpg">
                                @endif

                            </div>
                            <div class="album__nome">
                                {{ $ensaio->nome.' '.$ensaio->sobrenome }}
                            </div>
                        </div>
                    </a>
                    <?php $n++; ?>
                @endforeach
            </div>

        </div>
    @endif
@endsection
