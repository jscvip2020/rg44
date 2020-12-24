<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:09
 */ ?>
@section('titulo', ' - Paginas Extras')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Páginas Extras') }}
            <a href="{{ route('paginas.create') }}" class="btn float-right text-lg"> <i class="fa fa-plus">
                    Nova página</i></a>
        </h2>
    </x-slot>
    @include('layouts.messages')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Slug</th>
                        <th class="text-center">Descrição</th>
                        <th class="text-center">Ativo?</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paginas as $pagina)
                        <tr>
                            <td>{{ $pagina->nome }}</td>
                            <td>{{ $pagina->slug }}</td>
                            <td>{{ $pagina->description }}</td>
                            <td class="text-center">
                                @if($pagina->status)
                                    <a href="{{ route('paginas.status',[$pagina->id,$pagina->status]) }}" class="text-success"><i class="fa fa-check-circle fa-2x"></i></a>
                                @else
                                    <a href="{{ route('paginas.status',[$pagina->id,$pagina->status]) }}" title="Ativar essa pagina" class="text-danger"><i class="fa fa-times-circle fa-2x"></i></a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('paginas.edit',[$pagina->id]) }}" title="Editar essa pagina" class="btn btn-info btn-sm float-left"><i class="fa fa-edit"></i></a>
                                <form id="form-delete{{$pagina->id}}" action="{{ route('paginas.destroy', $pagina->id) }}" method="POST" class="float-left">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button" onclick="event.preventDefault();if(confirm('Deseja excluir esta Pagina \n {{$pagina->nome}}?')){document.getElementById('form-delete{{$pagina->id}}').submit();}" class="btn btn-sm btn-danger" title="Remover essa Página"><i class="fa fa-trash"></i></button>
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

