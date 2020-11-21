<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:19
 */ ?>
@section('titulo', ' - Novo Evento')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Evento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('eventos.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @php $input = 'titulo'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Título do Evento</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text" class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}"
                                               placeholder="Titulo"
                                               value="{{ isset($row) ? $row->$input : old($input) }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'data'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Data do Evento</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text" class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}"
                                               placeholder="Data por extenso"
                                               value="{{ isset($row) ? $row->$input : old($input) }}">
                                        <small id="apikeyHelper" class="form-text text-muted">
                                            Ex: 25 de outubro de 2020 ou 25 e 26 de outubro de 2020.
                                        </small>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'local'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Local do Evento</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text" class="col-md-12 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}"
                                               placeholder="Local"
                                               value="{{ isset($row) ? $row->$input : old($input) }}">

                                        <small id="apikeyHelper" class="form-text text-muted">
                                            Ex: Pérola-Pr.
                                        </small>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'imagem'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Imagem para o Evento</label>
                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="file"
                                               class="col-md-10 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Adicionar Evento
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

    @section('script')
        <script>
            $('#faicon').on('change keyup paste click', function () {
                const valor = $('#faicon').val();
                document.getElementById("icon").className = "fab text-primary fa-2x float-right " + valor;
            });
        </script>
    @endsection
</x-app-layout>

