<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:19
 */ ?>
@section('titulo', ' - Novo Ensaio')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Ensaio') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('ensaios.store') }}">
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
                                                   value="{{ old($input) }}">
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
                                                   value="{{ old($input) }}">

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
                                               value="{{old($input)}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex">
                                    @php $input = 'grau_escolaridade'; @endphp
                                    <div class="col-md-6">
                                        <label for="{{$input}}" class="col-md-12 control-label">Grau de
                                            Escolaridade</label>

                                        <div class="col-md-12">
                                            <select id="{{$input}}" type="text"
                                                    class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                    name="{{$input}}">
                                                <option value="cursando">Cursando</option>
                                                <option value="incompleto">Incompleto</option>
                                                <option value="completo">Completo</option>
                                            </select>
                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    @php $input = 'escolaridade'; @endphp
                                    <div class="col-md-6">
                                        <label for="{{$input}}" class="col-md-12 control-label">Escolaridade</label>

                                        <div class="col-md-12">
                                            <select id="{{$input}}" type="text"
                                                    class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                                    name="{{$input}}">
                                                <option value="fundamental">Fundamental</option>
                                                <option value="medio">Médio</option>
                                                <option value="superior">Superior</option>
                                                <option value="posGraduacao">Pós graduação</option>
                                                <option value="mestrado">Mestrado</option>
                                                <option value="doutorado">Doutorado</option>
                                            </select>
                                            @if ($errors->has($input))
                                                <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @php $input = 'graduadoem'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Área de estudo</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Area de estudo"
                                               value="{{old($input)}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                @php $input = 'esporte'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Esporte preferido</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Esporte preferido"
                                               value="{{old($input)}}">
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
                                               value="{{old($input)}}">
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
                                               value="{{old($input)}}">
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
                                               value="{{old($input)}}">
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
                                               value="{{old($input)}}">
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
                                               value="{{old($input)}}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'prato'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Prato Preferido</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               placeholder="Prato Preferido"
                                               value="{{old($input)}}">
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
                                            <option value="">Escolha a modelo</option>

                                            @foreach($albuns as $album)
                                                <option value="{{ $album->id }}">{{ $album->title->_content }}</option>
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
                                            Adicionar Ensaio
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

