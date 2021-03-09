<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/11/2020
 * Time: 13:09
 */ ?>
@section('nome', ' - Ensaios')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ensaios') }}
            <a href="{{ route('ensaios.create') }}" class="btn float-right text-lg"> <i class="fa fa-plus">
                    Novo Ensaio</i></a>
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
                        <th class="text-left">Cidade-UF</th>
                        <th class="text-left">Atividade</th>
                        <th class="text-center">Ativo?</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $n=1;?>
                    @foreach($rows as $row)
                        <tr>
                            <td>
                                <?php
                                $photoset_id = $row->ensaio_id;
                                $apiUrl = file_get_contents("https://www.flickr.com/services/rest/?method=flickr.photosets.getInfo&api_key={$data['api_key']}&photoset_id={$photoset_id}&user_id={$data['user_id']}&format=json&nojsoncallback=1");
                                $album = json_decode($apiUrl);
                                ?>
                                @if($album->stat!='fail')
                                    <img src="https://farm{{$album->photoset->farm}}.staticflickr.com/{{$album->photoset->server . "/" . $album->photoset->primary . "_" . $album->photoset->secret}}_n.jpg">
                                @endif
                            </td>
                            <td>{{ $row->nome.' '.$row->sobrenome }}</td>
                            <td>{{ $row->cidadeuf }}</td>
                            <td>{{ $row->atividade }}</td>
                            <td class="text-center align-middle">
                                @if($row->status)
                                    <a href="{{ route('ensaios.status',[$row->id,$row->status]) }}"
                                       class="text-success"><i class="fa fa-check-circle fa-2x"></i></a>
                                @else
                                    <a href="{{ route('ensaios.status',[$row->id,$row->status]) }}"
                                       title="Ativar {{ $row->nome }}" class="text-danger"><i
                                                class="fa fa-times-circle fa-2x"></i></a>
                                @endif
                            </td>
                            <td class="align-middle" style="min-width: 125px;">
                                <a href="{{ route('ensaios.edit',[$row->id]) }}" title="Editar {{ $row->nome }}"
                                   class="btn btn-info btn-sm float-left"><i class="fa fa-edit"></i></a>
                                <form id="form-delete{{$row->id}}" action="{{ route('ensaios.destroy', $row->id) }}"
                                      method="POST" class="float-left">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="button"
                                            onclick="event.preventDefault();if(confirm('Deseja excluir este ensaio \n {{$row->nome}}?')){document.getElementById('form-delete{{$row->id}}').submit();}"
                                            class="btn btn-sm btn-danger" title="Remover {{ $row->nome }}"><i
                                                class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php $n++; ?>
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

