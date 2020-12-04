<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 14:52
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - Noticias')
@section('content')
    <row>
        <div class="container-grid{{count($fixo)?'':1}} py-3">
            <div class="slide pr-2">
                <div id="carroseu" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i=0; $i < count($capa); $i++)
                            <li data-target="#carroseu" data-slide-to="{{ $i }}"
                                class="{{($i == 0)?'active':''}}"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner">
                        @foreach($capa as $key=>$not)
                            <div class="carousel-item {{ ($key == 0) ? 'active' : '' }}">
                                @if($not->capa == 'default.jpg')
                                    <img class="d-block w-100" src="{{ asset('images/'.$not->capa) }}"
                                         alt="{{ $not->titulo }}" style="max-height: 400px;">
                                    <div class="carousel-caption d-none d-md-block">
                                        <a href="{{route('noticia.single',[$not->id,$not->slug])}}"
                                           title="Acesse a notícia" class="btn btn-sm btn-light">Acesse a notícia</a>
                                        <h5>{{ $not->titulo }}</h5>
                                    </div>
                                @else
                                    <img class="d-block w-100" src="{{ asset('images/noticias/capas/'.$not->capa) }}"
                                         alt="{{ $not->titulo }}" style="max-height: 400px;">
                                    <div class="carousel-caption d-none d-md-block">
                                        <a href="{{route('noticia.single',[$not->id,$not->slug])}}"
                                           title="Acesse a notícia" class="btn btn-sm btn-light">Acesse a Notícia</a>
                                        <h5>{{ $not->titulo }}</h5>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#carroseu" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carroseu" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </div>
            <div class="destaques-grid{{count($fixo)}}">
                @if(count($fixo)>0)
                    <h1 class="titulo destaques col-md-12">Destaques</h1>
                @endif
                @foreach($fixo as $key=>$f)
                    <div class="item-destaque{{ $key }}">
                        @if($f->capa == 'default.jpg')
                            <a href="{{route('noticia.single',[$f->id,$f->slug])}}" title="{{$f->titulo}}">
                                <img class="d-block" src="{{ asset('images/'.$f->capa) }}"
                                     alt="{{ $f->titulo }}" title="{{ $f->titulo }}">
                            </a>
                        @else
                            <a href="{{route('noticia.single',[$f->id,$f->slug])}}" title="{{$f->titulo}}">
                                <img class="d-block" src="{{ asset('images/noticias/capas/'.$f->capa) }}"
                                     alt="{{ $f->titulo }}" title="{{ $f->titulo }}">
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </row>
    <row>
        <h1 class="titulo">Notícias <a href="{{ route('noticias.full') }}" class="btn btn-sm btn-light float-right"><i
                        class="fa fa-plus"></i> Veja
                mais</a></h1>
        <div class="noticias">
            @foreach($noticias as $noticia)
                <div class="card-noticia">
                    <a href="{{route('noticia.single',[$noticia->id, $noticia->slug])}}">
                        <img class="h-100 w-100"
                             src="{{($noticia->capa =='default.jpg') ?'images/'.$noticia->capa:'images/noticias/capas/'.$noticia->capa}}"
                             alt="{{$noticia->titulo}}">
                        <p>{{$noticia->titulo}}</p>
                    </a>
                </div>
            @endforeach

        </div>
    </row>
@endsection

