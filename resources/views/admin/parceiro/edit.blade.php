<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:19
 */ ?>
@section('titulo', ' - Editando evento')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editando evento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('parceiros.update',[$row->id]) }}" enctype="multipart/form-data">
                                @method('put')
                                {{ csrf_field() }}
                                @php $input = 'imagem'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Imagem para o
                                        Parceiro</label>
                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="file"
                                               class="col-md-10 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'nome'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Nome do Parceiro</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Nome do Parceiro"
                                               value="{{ isset($row) ? $row->$input : old($input) }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'area'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Área de Atuação</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="area de atuação"
                                               value="{{ isset($row) ? $row->$input : old($input) }}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'endereco'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Endereço</label>

                                    <div class="col-md-12">
                                        <textarea rows="3" id="{{$input}}" type="textarea"
                                                  class="col-md-12 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                  name="{{$input}}">{{ isset($row) ? $row->$input : old($input) }}</textarea>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <legend>Contatos</legend>
                                    @php $input = 'fones'; @endphp
                                    <div class="form-group">
                                        <label for="{{$input}}" class="col-md-12 control-label">Telefones</label>
                                        <div class="col-md-12 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                            </div>
                                            <input id="{{$input}}" type="text"
                                                   class="col-md-12 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                   name="{{$input}}"
                                                   value="{{ isset($row) ? $row->$input : old($input) }}">

                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    @php $input = 'whatsapp'; @endphp
                                    <div class="form-group">
                                        <label for="{{$input}}" class="col-md-12 control-label">Whatsapp</label>

                                        <div class="col-md-12 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fab fa-whatsapp text-success"></i></div>
                                            </div>
                                            <input id="{{$input}}" type="text"
                                                   class="col-md-12 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                   name="{{$input}}"
                                                   value="{{ isset($row) ? $row->$input : old($input) }}">
                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    @php $input = 'email'; @endphp
                                    <div class="form-group">
                                        <label for="{{$input}}" class="col-md-12 control-label">Email</label>

                                        <div class="col-md-12 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-envelope text-dark"></i></div>
                                            </div>
                                            <input id="{{$input}}" type="email"
                                                   class="col-md-12 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                   name="{{$input}}"
                                                   value="{{ isset($row) ? $row->$input : old($input) }}">
                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <legend>Medias sociais</legend>
                                    @php $input = 'link'; @endphp
                                    <div class="form-group">
                                        <label for="{{$input}}" class="col-md-12 control-label">Link</label>
                                        <div class="col-md-12 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-link"></i></div>
                                            </div>
                                            <input id="{{$input}}" type="text"
                                                   class="col-md-12 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                   name="{{$input}}"
                                                   value="{{ isset($row) ? $row->$input : old($input) }}">

                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    @php $input = 'facebook'; @endphp
                                    <div class="form-group">
                                        <label for="{{$input}}" class="col-md-12 control-label">Facebook</label>

                                        <div class="col-md-12 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fab fa-facebook text-primary"></i></div>
                                            </div>
                                            <input id="{{$input}}" type="text"
                                                   class="col-md-12 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                   name="{{$input}}"
                                                   value="{{ isset($row) ? $row->$input : old($input) }}">
                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    @php $input = 'instagram'; @endphp
                                    <div class="form-group">
                                        <label for="{{$input}}" class="col-md-12 control-label">Instagram</label>

                                        <div class="col-md-12 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fab fa-instagram text-warning"></i></div>
                                            </div>
                                            <input id="{{$input}}" type="text"
                                                   class="col-md-12 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                   name="{{$input}}"
                                                   value="{{ isset($row) ? $row->$input : old($input) }}">
                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    @php $input = 'youtube'; @endphp
                                    <div class="form-group">
                                        <label for="{{$input}}" class="col-md-12 control-label">Youtube</label>

                                        <div class="col-md-12 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fab fa-youtube text-danger"></i></div>
                                            </div>
                                            <input id="{{$input}}" type="text"
                                                   class="col-md-12 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                   name="{{$input}}"
                                                   value="{{ isset($row) ? $row->$input : old($input) }}">
                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    @php $input = 'twitter'; @endphp
                                    <div class="form-group">
                                        <label for="{{$input}}" class="col-md-12 control-label">Twitter</label>

                                        <div class="col-md-12 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fab fa-twitter text-info"></i></div>
                                            </div>
                                            <input id="{{$input}}" type="text"
                                                   class="col-md-12 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                   name="{{$input}}"
                                                   value="{{ isset($row) ? $row->$input : old($input) }}">
                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </fieldset>
                                @php $input = 'descricao'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Descrição</label>

                                    <div class="col-md-12">
                                        <textarea id="{{$input}}" type="textarea"
                                                  class="col-md-12 form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                  name="{{$input}}">{{ isset($row) ? $row->$input : old($input) }}</textarea>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Modificar Parceiro
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

