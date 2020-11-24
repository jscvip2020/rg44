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
                <a class="nav-link {{ (request()->route()->getName()=='noticias')? 'active': '' }}" href="{{ route('noticias') }}">Notícias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName()=='fotos' OR request()->route()->getName()=='album')? 'active' :'' }}" href="{{ route('fotos') }}">Fotos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName()=='eventos')? 'active' :'' }}" href="{{ route('eventos') }}">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName()=='parceiros')? 'active' :'' }}" href="{{ route('parceiros') }}">Parceiros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName()=='sobre')? 'active': '' }}" href="{{ route('sobre') }}">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->route()->getName() == "contato" )? 'active': '' }}" href="{{ route('contato') }}">Contato</a>
            </li>
        </ul>
    </div>
</nav>

