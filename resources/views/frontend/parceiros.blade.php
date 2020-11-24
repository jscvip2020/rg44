<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 14:53
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - Parceiros')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if($parceiros)
                <h1 class="titulo col-md-12 mt-8" style="margin-top: 30px;"><i class="fab fa-galactic-senate"></i>
                    Parceiros
                    <div class="float-right col-md-6" style="font-size: initial;">
                        {{ $parceiros->links() }}
                    </div>
                </h1>
                @foreach($parceiros as $row)
                    <div class="card-person col-md-6">
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
                            @if($row->fones)
                                <p><i class="fa fa-phone text-white"></i> {{ $row->fones }}</p>
                            @endif
                            @if($row->whatsapp)
                                <p>
                                    <a href="https://api.whatsapp.com/send?phone=55{{ $row->whatsapp }}&text=Em%20que%20posso%20ajudar%3F">
                                    <i class="fab fa-whatsapp text-success"></i> {{ $row->whatsapp }}
                                    </a>
                                </p>
                            @endif
                            @if($row->email)
                                <p><i class="fa fa-envelope text-white"></i> {{ $row->email }}</p>
                            @endif
                            <p style="font-size: x-large;">
                                @if($row->link)
                                    <a href="{{ $row->link }}"><i class="fa fa-link"></i></a>
                                @endif
                                @if($row->facebook)
                                    <a href="{{ $row->facebook }}"><i class="fab fa-facebook text-primary"></i></a>
                                @endif
                                @if($row->instagram)
                                    <a href="{{ $row->instagram }}"><i class="fab fa-instagram text-warning"></i></a>
                                @endif
                                @if($row->youtube)
                                    <a href="{{ $row->youtube }}"><i class="fab fa-youtube text-danger"></i></a>
                                @endif
                                @if($row->twitter)
                                    <a href="{{ $row->twitter }}"><i class="fab fa-twitter text-info"></i></a>
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
