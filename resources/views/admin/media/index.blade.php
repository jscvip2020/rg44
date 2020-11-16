<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:09
 */ ?>
@section('titulo', ' - Medias Sociais')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medias Sociais') }}
            <a href="{{ route('medias.create') }}" class="btn float-right text-lg"> <i class="fa fa-plus">
                    Nova Media</i></a>
        </h2>
    </x-slot>
    @include('layouts.messages')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">url</th>
                        <th class="text-center">fa icon</th>
                        <th class="text-center">Ativo?</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($medias as $media)
                        <tr>
                            <td><i class="fab {{ $media->faicon }} fa-2x"></i></td>
                            <td>{{ $media->nome }}</td>
                            <td>{{ $media->url }}</td>
                            <td>{{ $media->faicon }}</td>
                            <td class="text-center">
                                @if($media->status)
                                    <a href="{{ route('medias.status',[$media->id,$media->status]) }}" class="text-success"><i class="fa fa-check-circle fa-2x"></i></a>
                                @else
                                    <a href="{{ route('medias.status',[$media->id,$media->status]) }}" title="Ativar essa galeria" class="text-danger"><i class="fa fa-times-circle fa-2x"></i></a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('medias.edit',[$media->id]) }}" title="Editar essa Galeria" class="btn btn-info btn-sm float-left"><i class="fa fa-edit"></i></a>
                                <form id="form-delete{{$media->id}}" action="{{ route('medias.destroy', $media->id) }}" method="POST" class="float-left">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button" onclick="event.preventDefault();if(confirm('Deseja excluir esta Media \n {{$media->nome}}?')){document.getElementById('form-delete{{$media->id}}').submit();}" class="btn btn-sm btn-danger" title="Remover essa Media"><i class="fa fa-trash"></i></button>
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

