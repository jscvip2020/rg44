<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 14:53
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - Fotos')
@section('content')
    @if($albunsEnd)
        <div class="content">
            <h1 class="titulo"><i class="fa fa-photo-video"></i> Galeria de fotos
                <div class="float-right">
                    <a href="{{ route('album.list',1) }}" class="btn  btn-dark"><i class="fa fa-plus"></i> ver mais</a>
                </div>
            </h1>
            @foreach ($albunsEnd as $albumsetT)
                <div class="album col-md-4 col-lg-4">
                    <div class="album-img">
                        <a href="{{ route('album', [$albumsetT->id, 1]) }}">
                            <img src="https://farm<?php echo $albumsetT->farm; ?>.staticflickr.com/<?php echo $albumsetT->server . "/" . $albumsetT->primary . "_" . $albumsetT->secret; ?>_n.jpg"
                                 width="100%">
                        </a>
                        <div class="album-titulo">
                            {{ $albumsetT->title->_content}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
