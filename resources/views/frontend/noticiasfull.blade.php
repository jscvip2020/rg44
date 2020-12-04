<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 01/12/2020
 * Time: 14:26
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - Acessando todas as notícias')
@section('content')
    <div class="row  border-b-2  navbar-dark bg-transparent justify-content-between">
        <div class="col-md-6" style="font-size: 2.5rem;"><i class="fab fa-android"></i> Todas as Noticias</div>
        <form action="{{ route('noticias.full') }}" method="post" class="form-inline  col-md-6 justify-content-end">
            @csrf
            <input class="form-control mr-sm-2  col-md-8" type="search" name="search" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-dark" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="row justify-end" style="margin: 10px">
        {{ $noticias->links() }}
    </div>
    <div class="row">
        @foreach($noticias as $noticia)
            <div class="card-list-noticia pt-6">
                <div class="col-md-4">
                    @if($noticia->capa == 'default.jpg')
                        <img src="{{ asset('images/'.$noticia->capa) }}" alt="{{ $noticia->titulo }}" style="height: 200px;" class=" m-auto">
                    @else
                        <img src="{{ asset('images/noticias/capas/'.$noticia->capa) }}" alt="{{ $noticia->titulo }}" style="height: 200px;" class="m-auto">
                    @endif
                </div>
                <div class="col-md-8 relative">
                    <h2 style="font-size: 2rem;">{{ $noticia->titulo }}</h2>
                    <span class="text-sm text-gray-200">Criado em: {{ date('d/m/Y H:m:i') }}</span>
                    <div class="texto">
                        {{ substr(strip_tags($noticia->texto),0,244)."..." }}
                    </div>

                <a href="{{ route('noticia.single',[$noticia->id,$noticia->slug]) }}" title="Ver notícia" class="absolute btn-dark btn-light btn-sm" style="bottom: 10px; right: 10px;">Veja a notícia</a>
            </div>
            </div>
        @endforeach
    </div>
@endsection

