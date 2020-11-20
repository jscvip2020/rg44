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
                <img src="{{ asset('images/'.env('TEXTO_PERFIL')) }}" alt="Logo com nome">
            </div>
            <div class="img-perfil col-md-4 col-lg-4 col-sm-4">
                <img src="{{ asset('images/'.env('FOTO_PERFIL')) }}" alt="Foto perfil">
            </div>
            <div class="text-sobre col-md-8 col-lg-8 col-sm-8">
                Sou Reginaldo Rodrigues, com formação na área de Filosofia, Teologia, Pedagogia, Informática e Fotografia. O gosto pela informática nasceu ainda em 1996 e fotografia em 1999, somente em 2011 iniciei efetivamente atividade na área da comunicação, mídias sociais e fotografia religiosa. Hoje, divido o tempo vago entre família, estudo e fotografia... eventos automotivos, esportes radicais, ciclo turismo, entretenimento, e eventos beneficentes, com cobertura colaborativa e gratuita. Busco através da foto e vídeo mostrar o cotidiano e a beleza própria de cada pessoa, evidenciar a harmonia das pessoas com a natureza e o mundo.
            </div>
        </div>
    </div>
@endsection

