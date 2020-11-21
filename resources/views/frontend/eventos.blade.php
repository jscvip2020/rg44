<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 14:53
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - Eventos')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>teste</h1>
            @if($eventos)
                <h1 class="titulo col-md-12 mt-8" style="margin-top: 30px;"><i class="fa fa-calendar-alt"></i> Eventos
                    <div class="float-right col-md-6" style="font-size: initial;">
                        {{ $eventos->links() }}
                    </div>
                </h1>
                @foreach($eventos as $row)
                    <div class="card m-3 p-1 col-md-6"
                         style="background-color: #212121;max-width: 600px;max-height: 185px">
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
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

