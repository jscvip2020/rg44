<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:09
 */ ?>
@section('titulo', ' - Items das Paginas')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items da Página') }}
            <a href="{{ route('itempaginas.create') }}" class="btn float-right text-lg"> <i class="fa fa-plus">
                    Novo item da Pagina</i></a>
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
                        <th class="text-center">Menu</th>
                        <th class="text-left">Titulo</th>
                        <th class="text-left">Texto</th>
                        <th class="text-center">Ativo?</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                <img src="{{ ($item->capa=='default.jpg') ? asset('images/default.jpg') : asset('images/pags/capas/'.$item->capa) }}" alt="{{ $item->titulo }}"
                                     width="150">
                            </td>
                            <td class="text-center align-middle">{{ $item->pagina->nome }}</td>
                            <td>{{ $item->titulo }}</td>
                            <td width="30%">{{ substr($item->texto,0, 240) }}</td>
                            <td class="text-center align-middle">
                                @if($item->status)
                                    <a href="{{ route('itempaginas.status',[$item->id,$item->status]) }}"
                                       class="text-success"><i class="fa fa-check-circle fa-2x"></i></a>
                                @else
                                    <a href="{{ route('itempaginas.status',[$item->id,$item->status]) }}"
                                       title="Fixar {{ $item->titulo }}" class="text-danger"><i
                                                class="fa fa-times-circle fa-2x"></i></a>
                                @endif
                            </td>
                            <td class="align-middle" style="min-width: 125px;">
                                <a href="{{ route('itempaginas.edit',[$item->id]) }}" title="Editar {{ $item->titulo }}"
                                   class="btn btn-info btn-sm float-left"><i class="fa fa-edit"></i></a>
                                <form id="form-delete{{$item->id}}" action="{{ route('itempaginas.destroy', $item->id) }}"
                                      method="POST" class="float-left">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button"
                                            onclick="event.preventDefault();if(confirm('Deseja excluir este Item \n {{$item->titulo}}?')){document.getElementById('form-delete{{$item->id}}').submit();}"
                                            class="btn btn-sm btn-danger" title="Remover {{ $item->titulo }}"><i
                                                class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfooter>
                        <tr>
                            <td colspan="5">{{ $items->links() }}</td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

