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
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h2 class="alert-heading">Muito bem!</h2>
                        <p>{{ session('success') }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h2 class="alert-heading">OOPs!</h2>
                        <p>{{ session('error') }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <h2>Deixe-me uma mensagem (com o seu contato)</h2>
                <form class="form-horizontal" method="POST" action="{{ route('email.contato') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" class="form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}" id="nome" placeholder="Seu nome completo" value="{{ isset($row) ? $row->nome : old('nome') }}">
                        @if ($errors->has('nome'))
                            <span class="help-block invalid-feedback"><strong>{{ $errors->first('nome') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email1">Endereço de email</label>
                        <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email1" aria-describedby="emailHelp"
                               placeholder="Deixe seu email" value="{{ isset($row) ? $row->email : old('email') }}">
                        <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com
                            ninguém.
                        </small>
                        @if ($errors->has('email'))
                            <span class="help-block invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="assunto">Assunto do email</label>
                        <input name="assunto" type="text" class="form-control{{ $errors->has('assunto') ? ' is-invalid' : '' }}" id="assunto"
                               placeholder="Deixe seu assunto" value="{{ isset($row) ? $row->assunto : old('assunto') }}">
                        @if ($errors->has('assunto'))
                            <span class="help-block invalid-feedback"><strong>{{ $errors->first('assunto') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="mensagem">Mensagem</label>
                        <textarea name="mensagem" id="mensagem" cols="30" rows="5" class="form-control {{ $errors->has('mensagem') ? ' is-invalid' : '' }}">{{ isset($row) ? $row->mensagem : old('mensagem')}}</textarea>
                        @if ($errors->has('mensagem'))
                            <span class="help-block invalid-feedback"><strong>{{ $errors->first('mensagem') }}</strong></span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>

    </div>
@endsection

