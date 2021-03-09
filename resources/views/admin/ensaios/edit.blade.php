<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:19
 */ ?>
@section('titulo', ' - Editando Ensaio')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editando Ensaio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('ensaios.update',[$row->id]) }}">
                                @method('put')
                                {{ csrf_field() }}
                                <div class="flex">
                                    @php $input = 'nome'; @endphp
                                    <div class="col-md-6">
                                        <label for="{{$input}}" class="col-md-12 control-label">Nome</label>
                                        <div class="col-md-12">
                                            <input id="{{$input}}" type="text"
                                                   class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                   name="{{$input}}"
                                                   placeholder="Nome"
                                                   value="{{ ($row) ? $row->$input : old($input) }}">
                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif

                                        </div>

                                    </div>

                                    @php $input = 'sobrenome'; @endphp
                                    <div class="col-md-6">
                                        <label for="{{$input}}" class="col-md-12 control-label">Sobrenome</label>
                                        <div class="col-md-12">
                                            <input id="{{$input}}" type="text"
                                                   class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                   name="{{$input}}"
                                                   placeholder="Sobrenome"
                                                   value="{{ ($row) ? $row->$input : old($input) }}">

                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @php $input = 'cidadeuf'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Cidade-UF</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Cidade-UF"
                                               value="{{ ($row) ? $row->$input : old($input)}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'atividade'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Atividade</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Atividade"
                                               value="{{ ($row) ? $row->$input : old($input)}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                @php $input = 'torcida'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Torcida</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Torcida"
                                               value="{{ ($row) ? $row->$input : old($input)}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'sonho'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Grande Sonho</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Grande sonho"
                                               value="{{ ($row) ? $row->$input : old($input)}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'hobby'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Hobby</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Hobby"
                                               value="{{ ($row) ? $row->$input : old($input)}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'frase'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Uma frase que te
                                        marcou</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Frase marcante"
                                               value="{{ ($row) ? $row->$input : old($input)}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'musica'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Musica preferida</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Musica preferida"
                                               value="{{ ($row) ? $row->$input : old($input)}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'personalidade'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Personalidade que
                                        admira</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Personalidadeque admira"
                                               value="{{ ($row) ? $row->$input : old($input)}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'mensagem'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Mensagem</label>

                                    <div class="col-md-12">
                                        <textarea id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                  name="{{$input}}">{{ ($row) ? $row->$input : old($input)}}</textarea>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'ensaio_id'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Album no Flickr</label>

                                    <div class="col-md-12">
                                        <select id="{{$input}}" type="text"
                                                class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                name="{{$input}}">
                                            <option value="{{ $row->$input }}">Escolha a modelo</option>

                                            @foreach($albuns as $album)
                                                <option value="{{ $album->id }}" {{ ($row) ? ($row->$input == $album->id) ? 'selected' : '' : ''}}>{{ $album->title->_content }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>

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
                                                <div class="input-group-text"><i
                                                            class="fab fa-facebook text-primary"></i></div>
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
                                                <div class="input-group-text"><i
                                                            class="fab fa-instagram text-warning"></i></div>
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
                                                <div class="input-group-text"><i class="fab fa-youtube text-danger"></i>
                                                </div>
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
                                                <div class="input-group-text"><i class="fab fa-twitter text-info"></i>
                                                </div>
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
                                    @php $input = 'linkedin'; @endphp
                                    <div class="form-group">
                                        <label for="{{$input}}" class="col-md-12 control-label">LinkedIn</label>

                                        <div class="col-md-12 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fab fa-linkedin text-info"></i>
                                                </div>
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
                                    @php $input = 'tiktok'; @endphp
                                    <div class="form-group">
                                        <label for="{{$input}}" class="col-md-12 control-label">TikTok</label>

                                        <div class="col-md-12 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fab fa-tiktok text-dark"></i>
                                                </div>
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
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Modificar Ensaio
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

