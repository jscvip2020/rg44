<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:09
 */ ?>
@section('titulo', ' - Galeria de fotos')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galerias de Fotos') }}
            <a href="{{ route('galerias.create') }}" class="btn float-right text-lg"> <i class="fa fa-plus">
                    Novo</i></a>
        </h2>
    </x-slot>
    @include('layouts.messages')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">Título</th>
                        <th class="text-center">ApiKey</th>
                        <th class="text-center">User ID</th>
                        <th class="text-center">Album<br>por pag.</th>
                        <th class="text-center">Foto<br>por pag.</th>
                        <th class="text-center">Lista<br>por pag.</th>
                        <th class="text-center">Ativo?</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($galleries as $gallery)
                        <tr>
                            <td>{{ $gallery->titulo }}</td>
                            <td>{{ $gallery->apikey }}</td>
                            <td>{{ $gallery->userid }}</td>
                            <td class="text-center">{{ $gallery->perpagealbum }}</td>
                            <td class="text-center">{{ $gallery->perpagephoto }}</td>
                            <td class="text-center">{{ $gallery->perpagelist }}</td>
                            <td class="text-center">
                                @if($gallery->status)
                                    <a href="{{ route('galerias.status',[$gallery->id,$gallery->status]) }}" class="text-success"><i class="fa fa-check-circle fa-2x"></i></a>
                                @else
                                    <a href="{{ route('galerias.status',[$gallery->id,$gallery->status]) }}" title="Ativar essa galeria" class="text-danger"><i class="fa fa-times-circle fa-2x"></i></a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('galerias.edit',[$gallery->id]) }}" title="Editar essa Galeria" class="btn btn-info btn-sm float-left"><i class="fa fa-edit"></i></a>
                                <form id="form-delete{{$gallery->id}}" action="{{ route('galerias.destroy', $gallery->id) }}" method="POST" class="float-left">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button" onclick="event.preventDefault();if(confirm('Deseja excluir esta Galeria \n {{$gallery->titulo}}?')){document.getElementById('form-delete{{$gallery->id}}').submit();}" class="btn btn-sm btn-danger" title="Remover essa Galeria"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

