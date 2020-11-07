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
            <img src="{{ asset("images/logobranco.png") }}" alt="">
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link active" href="#">Notícias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Fotos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contato</a>
            </li>
        </ul>
        {{--@if (Route::has('login'))--}}
        {{--<div>--}}
        {{--@auth--}}
        {{--<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>--}}
        {{--@else--}}
        {{--<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>--}}

        {{--@if (Route::has('register'))--}}
        {{--<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>--}}
        {{--@endif--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--@endif--}}
    </div>
</nav>

