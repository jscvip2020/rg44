<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 09/12/2020
 * Time: 16:59
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - '.$item->nome)
@section('content')
    <div class="container-fluid">
        <h1 class="pt-6" style="font-size: revert;">{{$item->nome}}</h1>
        <p>{!! $item->description !!}</p>
        <hr style="border-bottom: 1px solid #cccccc;">
        <div class="paginas m-2">
            @foreach($item->itenspagina as $pag)
                <a href="{{ route('pag.pagina',[$pag->id, $pag->slug]) }}">
                    <div class="card m-1 mycard">
                        <img src="{{ asset('images/pags/capas/'.$pag->capa) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $pag->titulo }}</h5>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
@endsection

