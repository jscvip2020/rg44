<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 20/11/2020
 * Time: 15:47
 */ ?>

@section('titulo', ' - Eventos')
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="card mb-3 p-1 col-md-6" style="max-width: 600px;max-height: 185px">
                    <div class="row no-gutters">
                        <div class="col-md-6 ">
                            <img src="{{ asset('images/eventos/'.$row->imagem) }}" class="card-img m-auto"
                                 alt="{{ $row->titulo }}" style="max-height: 175px; width: auto">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 1.5rem;">{{ $row->titulo }}</h5>
                                <p class="card-subtitle font-semibold">{{ $row->data }}</p>
                                <p class="card-text">{{ $row->local }}</p>
                                @if($row->link != '#')
                                    <a href="{{ $row->link }}" class="btn btn-light" target="_blank">Veja mais</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>