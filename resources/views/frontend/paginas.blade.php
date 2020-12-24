<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 09/12/2020
 * Time: 16:59
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - '.$item->titulo)
@section('content')
    <div class="container-fluid">
        <h1 class="pt-6" style="font-size: revert;">{{$item->titulo}}</h1>
        <h3 class="pb-3">enviado em: {{ date("d/m/Y H:m:i",strtotime($item->created_at)) }}</h3>
        <hr style="border-bottom: 1px solid #cccccc;">
        <div class="share-facebook p-1">
            <div class="fb-like" data-colorscheme = "dark" data-href="`{{ Request::url() }}" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="true"></div>
        </div>
        <div class="texto">
            {!! $item->texto !!}
        </div>
    </div>
@endsection

