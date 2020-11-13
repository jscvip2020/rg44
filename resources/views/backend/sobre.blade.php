<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 14:53
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - Sobre mim')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="logo-text col-md-12 col-sm-12 col-lg-12">
                <img src="{{ asset('images/rg44.png') }}" alt="Logo com nome">
            </div>
            <div class="img-perfil col-md-4 col-lg-4 col-sm-4">
                <img src="{{ asset('images/FOTO-PERFIL-REGINALDO.png') }}" alt="Foto perfil">
            </div>
            <div class="text-sobre col-md-8 col-lg-8 col-sm-8">
                Meu nome é Reginado Rodrigues.
                <br>
                Sou um fotógrafo profissional de Pérola, Pr. Espero que você goste do meu portfólio de fotos e depois
                disso possamos criar algo ótimo juntos! Através das lentes, o mundo parece diferente e eu gostaria de mostrar
                essa diferença. Aprendi a fotografar e desde então a fotografia tornou-se meu Robby e paixão. Depois disso,
                com anos de prática e toneladas de experiência, aprendi as técnicas, o que me ajuda no meu trabalho com
                Eventos em várias cidades da Região. Atendo Festas de Rodeios, Igrejas, Eventos, etc. E tudo isso pode ser seu,
                basta entrar em <a href="/contato">contato</a>.
            </div>
        </div>
    </div>
@endsection

