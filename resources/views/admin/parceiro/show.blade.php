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
            <div class="card-person">
                <div class="card-person-head">
                    <div class="card-person-image">
                        <img src="{{ asset('images/parceiros/'.$row->imagem) }}" alt="{{ $row->nome }}">
                    </div>
                    <div class="card-person-label">
                        <h4>
                            <span>{{ $row->area }}</span>
                            {{ $row->nome }}
                        </h4>
                    </div>
                </div><!-- .ashade-service-card__head -->
                <div class="card-person-content">
                    <p class="text-justify">{{ $row->descricao }}</p>
                    <hr style="border: 1px solid;" class="text-white m-4">
                    <p>{{ $row->endereco }}</p>
                    <p><i class="fa fa-phone text-white"></i> {{ $row->fones }}</p>
                    <p><i class="fab fa-whatsapp text-success"></i> {{ $row->whatsapp }}</p>
                    <p><i class="fa fa-envelope text-white"></i> {{ $row->email }}</p>
                    <p style="font-size: x-large;">
                        <a href="{{ $row->link }}"><i class="fa fa-link"></i></a>
                        <a href="{{ $row->facebook }}"><i class="fab fa-facebook text-primary"></i></a>
                        <a href="{{ $row->instagram }}"><i class="fab fa-instagram text-warning"></i></a>
                        <a href="{{ $row->youtube }}"><i class="fab fa-youtube text-danger"></i></a>
                        <a href="{{ $row->twitter }}"><i class="fab fa-twitter text-info"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>