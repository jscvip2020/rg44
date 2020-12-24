<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:19
 */ ?>
@section('titulo', ' - Nova Pagina')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Pagina') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('paginas.store') }}">
                                {{ csrf_field() }}
                                @php $input = 'nome'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Nome para
                                        Pagina</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text" class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}" name="{{$input}}"
                                               placeholder="Insira um nome para a Pagina"
                                               value="{{ isset($row) ? $row->$input : old($input) }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'description'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Descrição</label>

                                    <div class="col-md-12">
                                        <textarea id="{{$input}}" type="textarea"
                                                  class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                  name="{{$input}}">{{ isset($row) ? $row->$input : old($input) }}</textarea>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Adicionar Pagina
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

