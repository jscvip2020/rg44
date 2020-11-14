<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:19
 */ ?>
@section('titulo', ' - Nova Galeria')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Galeria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('galerias.store') }}">
                                {{ csrf_field() }}
                                @php $input = 'titulo'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Titulo para
                                        Galeria</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text" class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}"
                                               placeholder="Insira um título para a Galeria"
                                               value="{{ isset($row) ? $row->$input : old($input) }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'apikey'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">ApiKey da Galeria
                                        Flickr</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : old($input) }}"
                                               aria-describedby="apikeyHelper" placeholder="Insira sua APIKEY">
                                        <small id="apikeyHelper" class="form-text text-muted">
                                            Faça login em sua conta. Acesse esse <a
                                                    href="https://www.flickr.com/services/apps/create/noncommercial/?">Link</a>
                                            e crie sua APIKEY
                                            <br> Ex: 2a555f40e7345b0413bb81157ff1ea02
                                        </small>

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'userid'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Id do usuário
                                        Flicker</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}"
                                               placeholder="Insira sua Id de Usuário"
                                               value="{{ isset($row) ? $row->$input : old($input) }}">
                                        <small id="apikeyHelper" class="form-text text-muted">
                                            Faça login em sua conta. Acesse esse o link "Minhas coisas".
                                            Na barra de endereço aparecerá algo parecido com isso: https://www.flickr.com/photos/155330139@N06/
                                            <br>"155330139@N06" é sua id de usuário
                                        </small>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'perpagealbum'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Quatidade de Albuns que aparecerá por página</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="number" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : 6 }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'perpagephoto'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Quatidade de fotos que aparecerá por página quando selecionar um album</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="number" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : 10 }}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'perpagelist'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Quatidade de Albuns que aparecerá por página na listagem dos albuns</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="number" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : 10 }}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Adicionar Galeria
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

