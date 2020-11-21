<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:09
 */ ?>
@section('titulo', ' - Usuarios')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
            <a href="{{ route('register') }}" class="btn float-right text-lg"> <i class="fa fa-plus">
                    Novo Usuario</i></a>
        </h2>
    </x-slot>
    @include('layouts.messages')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-left">Nome</th>
                        <th class="text-left">Email</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form id="form-delete{{$user->id}}" action="{{ route('users.destroy', $user->id) }}" method="POST" class="float-left">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button" onclick="event.preventDefault();if(confirm('Deseja excluir {{ $user->name }} \n {{$user->nome}}?')){document.getElementById('form-delete{{$user->id}}').submit();}" class="btn btn-sm btn-danger" title="Remover {{ $user->name }}"><i class="fa fa-trash"></i></button>
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

