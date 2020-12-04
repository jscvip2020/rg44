<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:09
 */ ?>
@section('titulo', ' - Noticias')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Noticias') }}
            <a href="{{ route('noticias.create') }}" class="btn float-right text-lg"> <i class="fa fa-plus">
                    Nova noticia</i></a>
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
                        <th class="text-left">Titulo</th>
                        <th class="text-left">Texto</th>
                        <th class="text-center">Ativo?</th>
                        <th class="text-center">Fixo</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td>
                                <img src="{{ ($row->capa=='default.jpg') ? asset('images/'.$row->capa) : asset('images/noticias/capas/'.$row->capa) }}" alt="{{ $row->titulo }}"
                                     width="150">
                            </td>
                            <td>{{ $row->titulo }}</td>
                            <td width="30%">{{ substr($row->texto,0, 240) }}</td>
                            <td class="text-center align-middle">
                                @if($row->status)
                                    <a href="{{ route('noticias.status',[$row->id,$row->status]) }}"
                                       class="text-success"><i class="fa fa-check-circle fa-2x"></i></a>
                                @else
                                    <a href="{{ route('noticias.status',[$row->id,$row->status]) }}"
                                       title="Fixar {{ $row->titulo }}" class="text-danger"><i
                                                class="fa fa-times-circle fa-2x"></i></a>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                @if($row->fixo)
                                    <a href="{{ route('noticia.fixo',[$row->id,$row->fixo]) }}"
                                       class="text-success"><i class="fa fa-check-circle fa-2x"></i></a>
                                @else
                                    <a href="{{ route('noticia.fixo',[$row->id,$row->fixo]) }}"
                                       title="Fixar {{ $row->titulo }}" class="text-danger"><i
                                                class="fa fa-times-circle fa-2x"></i></a>
                                @endif
                            </td>
                            <td class="align-middle" style="min-width: 125px;">
                                <a href="{{ route('noticias.edit',[$row->id]) }}" title="Editar {{ $row->titulo }}"
                                   class="btn btn-info btn-sm float-left"><i class="fa fa-edit"></i></a>
                                <form id="form-delete{{$row->id}}" action="{{ route('noticias.destroy', $row->id) }}"
                                      method="POST" class="float-left">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button"
                                            onclick="event.preventDefault();if(confirm('Deseja excluir esta noticia \n {{$row->titulo}}?')){document.getElementById('form-delete{{$row->id}}').submit();}"
                                            class="btn btn-sm btn-danger" title="Remover {{ $row->titulo }}"><i
                                                class="fa fa-trash"></i></button>
                                </form>
                                <a href="{{ route('noticias.show',[$row->id]) }}" title="Mostrar {{ $row->titulo }}"
                                   class="btn btn-warning btn-sm float-left"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfooter>
                        <tr>
                            <td colspan="5">{{ $rows->links() }}</td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

