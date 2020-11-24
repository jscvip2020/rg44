<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 14:52
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - Contato')
@section('content')
    <div class="container-fluid contato-dados">
        <div class="row">
            <div class="col-md-8 col-sm-1">
                <h2>Fale comigo!</h2>
                <p>
                    Olá! Você poderá falar comigo em algumas das opções que disponibilizei.
                </p>
                <address>
                    <h1>RG44</h1>
                    <strong>CEP: </strong> <span>{{ env('CEP') }}</span><br>
                    <strong>Cidade/UF: </strong> <span>{{ env('CIDADE_UF') }}</span><br>
                </address>
                <address>
                    <strong><i class="fa fa-envelope"></i> </strong><span><a href="mailto://{{ env('EMAIL') }}">{{ env('EMAIL') }}</a></span><br>
                    <strong><i class="fa fa-phone"></i> </strong> <span>{{ env('TELEFONES') }}</span><br>
                </address>
                <address>
                    <ul class="midias-bar" style="justify-content: normal;">
                    @foreach($medias as $media)
                        <li class="midias-link" style=" font-size: 36px;"><a href="{{ $media->url }}" target="_blank" title="{{ $media->nome }}"><i
                                        class="fab {{ $media->faicon }}"></i></a></li>
                    @endforeach
                    </ul>
                </address>


            </div>
            <div class="col-md-4 col-sm-1">
                <h2>Deixe-me uma mensagem (com o seu contato)</h2>
                <form>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Seu nome completo">
                    </div>
                    <div class="form-group">
                        <label for="email1">Endereço de email</label>
                        <input type="email" class="form-control" id="email1" aria-describedby="emailHelp"
                               placeholder="Deixe seu email">
                        <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com
                            ninguém.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="mensagem">Mensagem</label>
                        <textarea name="mensagem" id="mensagem" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>

    </div>
@endsection

