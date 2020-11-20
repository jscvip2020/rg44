<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:19
 */ ?>
@section('titulo', ' - Configurações do Site')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configurações do Site') }}
        </h2>
    </x-slot>
    @include('layouts.messages')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card m-auto" style="max-width: 600px;">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('configs.env') }}">
                                {{ csrf_field() }}
                                @php $input = 'APP_NAME'; @endphp
                                <div class="form-group">
                                    <label for="{{$input}}" class="col-md-12 control-label">Nome do APP</label>

                                    <div class="col-md-12">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h2>Configurações do Email</h2>
                                    <hr>
                                </div>
                                @php $input = 'MAIL_HOST'; @endphp
                                <div class="form-group row">
                                    <label for="{{$input}}" class="col-md-4 control-label">{{ $input }}</label>

                                    <div class="col-md-8">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'MAIL_PORT'; @endphp
                                <div class="form-group row">
                                    <label for="{{$input}}" class="col-md-4 control-label">{{ $input }}</label>

                                    <div class="col-md-8">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'MAIL_USERNAME'; @endphp
                                <div class="form-group row">
                                    <label for="{{$input}}" class="col-md-4 control-label">{{ $input }}</label>

                                    <div class="col-md-8">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'MAIL_PASSWORD'; @endphp
                                <div class="form-group row">
                                    <label for="{{$input}}" class="col-md-4 control-label">{{ $input }}</label>

                                    <div class="col-md-8">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'MAIL_ENCRYPTION'; @endphp
                                <div class="form-group row">
                                    <label for="{{$input}}" class="col-md-4 control-label">{{ $input }}</label>

                                    <div class="col-md-8">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'MAIL_FROM_ADDRESS'; @endphp
                                <div class="form-group row">
                                    <label for="{{$input}}" class="col-md-4 control-label">{{ $input }}</label>

                                    <div class="col-md-8">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'MAIL_FROM_NAME'; @endphp
                                <div class="form-group row">
                                    <label for="{{$input}}" class="col-md-4 control-label">{{ $input }}</label>

                                    <div class="col-md-8">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">

                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h2>Configurações Endereço</h2>
                                    <hr>
                                </div>
                                @php $input = 'CEP'; @endphp
                                <div class="form-group row">
                                    <label for="{{$input}}" class="col-md-4 control-label">{{ $input }}</label>

                                    <div class="col-md-8">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'CIDADE_UF'; @endphp
                                <div class="form-group row">
                                    <label for="{{$input}}" class="col-md-4 control-label">{{ $input }}</label>

                                    <div class="col-md-8">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'EMAIL'; @endphp
                                <div class="form-group row">
                                    <label for="{{$input}}" class="col-md-4 control-label">{{ $input }}</label>

                                    <div class="col-md-8">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                @php $input = 'TELEFONES'; @endphp
                                <div class="form-group row">
                                    <label for="{{$input}}" class="col-md-4 control-label">{{ $input }}</label>

                                    <div class="col-md-8">
                                        <input id="{{$input}}" type="text"
                                               class="form-control {{ $errors->has($input) ? ' is-invalid' : '' }}"
                                               name="{{$input}}"
                                               value="{{ isset($row) ? $row->$input : env($input) }}">
                                        @if ($errors->has($input))
                                            <span class="help-block invalid-feedback"><strong>{{ $errors->first($input) }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="form-inline" action="{{ route('configs.logobranco') }}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        <input type="hidden" name="key" value="LOGO_BRANCO">
                        <div class="row">
                            <div class="col-md-4" style="display: contents;">
                                <img src="{{ asset('images/'.env('LOGO_BRANCO')) }}" width="150" class="text-center"
                                     alt="{{env('LOGO_BRANCO')}}">
                            </div>
                            <div class="col-md-4 button-input">
                                <div class="form-group">
                                    <input type="file" name="logobranco" class="filestyle" data-text="Escolha Logo Branco"
                                           data-input="false"
                                           data-btnclass="btn-primary" id="filestyle-5"
                                           tabindex="-1">
                                </div>
                            </div>

                            <div class="col-md-4  button-input">
                                <button type="submit" class="btn btn-success">
                                    Trocar Imagem
                                </button>
                            </div>
                            <div class="float-right">
                                @if ($errors->has('logobranco'))
                                    <span class="help-block text-danger"><strong>{{ $errors->first('logobranco') }}</strong></span>
                                @endif
                            </div>

                        </div>
                    </form>

                    <form name="logopreto" class="form-inline" action="{{ route('configs.logopreto') }}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        <input type="hidden" name="key" value="LOGO_PRETO">
                        <div class="row">
                            <div class="col-md-4" style="display: contents;">
                                <img src="{{ asset('images/'.env('LOGO_PRETO')) }}" width="150" class="text-center"
                                     alt="{{env('LOGO_PRETO')}}">
                            </div>
                            <div class="col-md-4 button-input">
                                <div class="form-group">
                                    <input type="file" name="logopreto" class="filestyle" data-text="Escolha Logo Preto"
                                           data-input="false"
                                           data-btnclass="btn-primary" id="filestyle-6"
                                           tabindex="-1">
                                </div>
                            </div>

                            <div class="col-md-4  button-input">
                                <button type="submit" class="btn btn-success">
                                    Trocar Imagem
                                </button>
                            </div>
                            <div class="float-right">
                                @if ($errors->has('logopreto'))
                                    <span class="help-block text-danger"><strong>{{ $errors->first('logopreto') }}</strong></span>
                                @endif
                            </div>

                        </div>
                    </form>

                    <form class="form-inline py-8" action="{{ route('configs.fotoperfil') }}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        <input type="hidden" name="key" value="FOTO_PERFIL">
                        <div class="row">
                            <div class="col-md-4" style="display: contents;">
                                <img src="{{ asset('images/'.env('FOTO_PERFIL')) }}" width="150" class="text-center"
                                     alt="{{env('FOTO_PERFIL')}}">
                            </div>
                            <div class="col-md-4 button-input">
                                <div class="form-group">
                                    <input type="file" name="fotoperfil" class="filestyle" data-text="Escolha Foto perfil"
                                           data-input="false"
                                           data-btnclass="btn-primary" id="filestyle-7"
                                           tabindex="-1">
                                </div>
                            </div>

                            <div class="col-md-4  button-input">
                                <button type="submit" class="btn btn-success">
                                    Trocar Imagem
                                </button>
                            </div>
                            <div class="float-right">
                                @if ($errors->has('fotoperfil'))
                                    <span class="help-block text-danger"><strong>{{ $errors->first('fotoperfil') }}</strong></span>
                                @endif
                            </div>

                        </div>
                    </form>

                    <form name="fotoperfil" class="form-inline" action="{{ route('configs.textoperfil') }}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        <input type="hidden" name="key" value="TEXTO_PERFIL">
                        <div class="row">
                            <div class="col-md-4" style="display: contents;">
                                <img src="{{ asset('images/'.env('TEXTO_PERFIL')) }}" width="150" class="text-center"
                                     alt="{{env('TEXTO_PERFIL')}}">
                            </div>
                            <div class="col-md-4 button-input">
                                <div class="form-group">
                                    <input type="file" name="textoperfil" class="filestyle" data-text="Escolha Texto Perfil"
                                           data-input="false"
                                           data-btnclass="btn-primary" id="filestyle-8"
                                           tabindex="-1">
                                </div>
                            </div>

                            <div class="col-md-4  button-input">
                                <button type="submit" class="btn btn-success">
                                    Trocar Imagem
                                </button>
                            </div>
                            <div class="float-right">
                                @if ($errors->has('textoperfil'))
                                    <span class="help-block text-danger"><strong>{{ $errors->first('textoperfil') }}</strong></span>
                                @endif
                            </div>

                        </div>
                    </form>

                    <form name="video" class="form-inline" action="{{ route('configs.video') }}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        <input type="hidden" name="key" value="VIDEO">
                        <div class="row">
                            <video>
                                <source src="{{ asset("videos/".env('VIDEO')) }}" type="video/mp4">
                            </video>
                            </div>
                            <div class="col-md-4 button-input">
                                <div class="form-group">
                                    <input type="file" name="video" class="filestyle" data-text="Escolha o Video"
                                           data-input="false"
                                           data-btnclass="btn-primary" id="filestyle-9"
                                           tabindex="-1">
                                </div>
                            </div>

                            <div class="col-md-4  button-input">
                                <button type="submit" class="btn btn-success">
                                    Trocar o Video
                                </button>
                            </div>
                            <div class="float-right">
                                @if ($errors->has('video'))
                                    <span class="help-block text-danger"><strong>{{ $errors->first('video') }}</strong></span>
                                @endif
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script type="text/javascript" src="{{ asset('js/bootstrap-filestyle.min.js')}}"></script>
    @endsection

</x-app-layout>

