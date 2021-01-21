<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 13:04
 */ ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand" href="/">
            <img src="{{ asset("images/".env('LOGO_BRANCO')) }}" alt="logo {{ env('APP_NAME') }}">
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName()=='noticias.all' OR request()->route()->getName()=='noticia.single')? 'active': '' }}"
                   href="{{ route('noticias.all') }}">Notícias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName()=='fotos' OR request()->route()->getName()=='album')? 'active' :'' }}"
                   href="{{ route('fotos') }}">Fotos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName()=='eventos')? 'active' :'' }}"
                   href="{{ route('eventos') }}">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName()=='ensaios')? 'active' :'' }}"
                   href="{{ route('ensaios') }}">Ensaios</a>
            </li>
            @foreach($paginas as $pag)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ (request()->route()->getName()=='pag.pagina' OR request()->route()->getName()=='pag.fullpagina')? 'active' :'' }}"
                       href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $pag->nome }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('pag.fullpagina',[$pag->id, $pag->slug]) }}">Todas</a>
                        <hr class="dropdown-divider">
                        @foreach($pag->itensPagina as $items)
                            <a class="dropdown-item"
                               href="{{ route('pag.pagina',[$items->id, $items->slug]) }}">{{$items->titulo}}</a>
                        @endforeach
                    </div>
                </li>
            @endforeach

            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName()=='parceiros')? 'active' :'' }}"
                   href="{{ route('parceiros') }}">Parceiros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName()=='sobre')? 'active': '' }}"
                   href="{{ route('sobre') }}">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName() == "contato" )? 'active': '' }}"
                   href="{{ route('contato') }}">Contato</a>
            </li>
        </ul>
    </div>
</nav>

