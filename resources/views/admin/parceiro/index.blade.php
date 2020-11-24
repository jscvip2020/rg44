<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:09
 */ ?>
@section('nome', ' - Parceiros')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Parceiros') }}
            <a href="{{ route('parceiros.create') }}" class="btn float-right text-lg"> <i class="fa fa-plus">
                    Novo parceiro</i></a>
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
                        <th class="text-left">Nome</th>
                        <th class="text-left">Área</th>
                        <th class="text-left">Contatos</th>
                        <th class="text-left">Medias</th>
                        <th class="text-center">Ativo?</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td><img src="{{ asset('images/parceiros/'.$row->imagem) }}" alt="{{ $row->nome }}"
                                     width="150"></td>
                            <td>{{ $row->nome }}</td>
                            <td>{{ $row->area }}</td>
                            <td>
                                @if($row->fones)
                                    <i class="fa fa-phone"></i>
                                @endif
                                @if($row->whatsapp)
                                    <i class="fab fa-whatsapp"></i>
                                @endif
                                @if($row->email)
                                    <i class="fa fa-envelope"></i>
                                @endif
                            </td>
                            <td>
                                @if($row->link)
                                    <i class="fab fa-link"></i>
                                @endif
                                @if($row->facebook)
                                        <i class="fab fa-facebook"></i>
                                @endif
                                @if($row->youtube)
                                        <i class="fab fa-youtube"></i>
                                @endif
                                @if($row->instagram)
                                        <i class="fab fa-instagram"></i>
                                @endif
                                @if($row->twitter)
                                        <i class="fab fa-twitter"></i>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                @if($row->status)
                                    <a href="{{ route('parceiros.status',[$row->id,$row->status]) }}"
                                       class="text-success"><i class="fa fa-check-circle fa-2x"></i></a>
                                @else
                                    <a href="{{ route('parceiros.status',[$row->id,$row->status]) }}"
                                       title="Ativar {{ $row->nome }}" class="text-danger"><i
                                                class="fa fa-times-circle fa-2x"></i></a>
                                @endif
                            </td>
                            <td class="align-middle" style="min-width: 125px;">
                                <a href="{{ route('parceiros.edit',[$row->id]) }}" title="Editar {{ $row->nome }}"
                                   class="btn btn-info btn-sm float-left"><i class="fa fa-edit"></i></a>
                                <form id="form-delete{{$row->id}}" action="{{ route('parceiros.destroy', $row->id) }}"
                                      method="POST" class="float-left">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button"
                                            onclick="event.preventDefault();if(confirm('Deseja excluir este parceiro \n {{$row->nome}}?')){document.getElementById('form-delete{{$row->id}}').submit();}"
                                            class="btn btn-sm btn-danger" title="Remover {{ $row->nome }}"><i
                                                class="fa fa-trash"></i></button>
                                </form>
                                <a href="{{ route('parceiros.show',[$row->id]) }}" title="Mostrar {{ $row->nome }}"
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

