<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:09
 */ ?>
@section('titulo', ' - Eventos')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eventos') }}
            <a href="{{ route('eventos.create') }}" class="btn float-right text-lg"> <i class="fa fa-plus">
                    Nova Evento</i></a>
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
                        <th class="text-left">Data</th>
                        <th class="text-left">Local</th>
                        <th class="text-left">Link</th>
                        <th class="text-center">Ativo?</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($eventos as $evento)
                        <tr>
                            <td><img src="{{ asset('images/eventos/'.$evento->imagem) }}" alt="{{ $evento->titulo }}" width="150"></td>
                            <td >{{ $evento->titulo }}</td>
                            <td >{{ $evento->data }}</td>
                            <td >{{ $evento->local }}</td>
                            <td >{{ $evento->link }}</td>
                            <td class="text-center align-middle">
                                @if($evento->status)
                                    <a href="{{ route('eventos.status',[$evento->id,$evento->status]) }}" class="text-success"><i class="fa fa-check-circle fa-2x"></i></a>
                                @else
                                    <a href="{{ route('eventos.status',[$evento->id,$evento->status]) }}" title="Ativar {{ $evento->titulo }}" class="text-danger"><i class="fa fa-times-circle fa-2x"></i></a>
                                @endif
                            </td>
                            <td class="align-middle" style="min-width: 125px;">
                                <a href="{{ route('eventos.edit',[$evento->id]) }}" title="Editar {{ $evento->titulo }}" class="btn btn-info btn-sm float-left"><i class="fa fa-edit"></i></a>
                                <form id="form-delete{{$evento->id}}" action="{{ route('eventos.destroy', $evento->id) }}" method="POST" class="float-left">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button" onclick="event.preventDefault();if(confirm('Deseja excluir este Evento \n {{$evento->titulo}}?')){document.getElementById('form-delete{{$evento->id}}').submit();}" class="btn btn-sm btn-danger" title="Remover {{ $evento->titulo }}"><i class="fa fa-trash"></i></button>
                                </form>
                                <a href="{{ route('eventos.show',[$evento->id]) }}" title="Mostrar {{ $evento->titulo }}" class="btn btn-warning btn-sm float-left"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfooter>
                        <tr>
                            <td colspan="5">{{ $eventos->links() }}</td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

