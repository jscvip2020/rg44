<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:19
 */ ?>
@section('titulo', ' - Editando media')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editando media') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('medias.update',[$row->id]) }}">
                                @method('put')
                                {{ csrf_field() }}
                                @php $input = 'nome'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Nome da média social</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Youtube"
                                               value="{{ isset($row) ? $row->$input : old($input) }}">
                                        <small id="apikeyHelper" class="form-text text-muted">
                                            Ex: Youtube
                                        </small>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'url'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Url da média social</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="https://youtube.com/jscvip"
                                               value="{{ isset($row) ? $row->$input : old($input) }}">
                                        <small id="apikeyHelper" class="form-text text-muted">
                                            Ex: https://youtube.com/jscvip
                                        </small>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'faicon'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Icone da média
                                        social</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="col-md-10 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="fa-youtube"
                                               value="{{ isset($row) ? $row->$input : old($input) }}">
                                        <i id="icon" class="fab text-primary {{ isset($row) ? $row->$input : old($input) }} fa-2x float-right"></i>
                                        <small id="apikeyHelper" class="form-text text-muted">
                                            Um icone do <a href="https://fontawesome.com/v4.7.0/icons/">Font Awesome</a>
                                            Ex: fa-youtube
                                        </small>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Modificar Média Social
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

