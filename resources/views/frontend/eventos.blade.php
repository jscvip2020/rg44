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
                                <a data-fancybox="gallery"
                                   href="{{ asset('images/eventos/'.$row->imagem) }}"
                                   title="{{$row->titulo}}">
                                    <img src="{{ asset('images/eventos/'.$row->imagem) }}" class="card-img m-auto"
                                         alt="{{ $row->titulo }}" style="max-height: 175px; width: auto">
                                </a>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 1.5rem;">{{ $row->titulo }}</h5>
                                    <p class="card-subtitle font-semibold">{{ $row->data }}</p>
                                    <p class="card-text">{{ $row->local }}</p>
                                    @if($row->link != '#')
                                        <a href="{{ $row->link }}" class="btn btn-light btn-sm" target="_blank">Veja mais</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Create template for the button
        $.fancybox.defaults.btnTpl.fb = '<button data-fancybox-fb class="fancybox-button fancybox-button--fb" title="Facebook">' +
            '<svg viewBox="0 0 24 24">' +
            '<path d="M22.676 0H1.324C.594 0 0 .593 0 1.324v21.352C0 23.408.593 24 1.324 24h11.494v-9.294h-3.13v-3.62h3.13V8.41c0-3.1 1.894-4.785 4.66-4.785 1.324 0 2.463.097 2.795.14v3.24h-1.92c-1.5 0-1.793.722-1.793 1.772v2.31h3.584l-.465 3.63h-3.12V24h6.115c.733 0 1.325-.592 1.325-1.324V1.324C24 .594 23.408 0 22.676 0"/>' +
            '</svg>' +
            '</button>';

        // Make button clickable using event delegation
        $('body').on('click', '[data-fancybox-fb]', function() {
            window.open("https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(window.location.href)+"&t="+encodeURIComponent(document.title), '','left=0,top=0,width=600,height=300,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');
        });

        $('[data-fancybox="gallery"]').fancybox({
            buttons: [
                'download',
                'fb',
                'slideShow',
                'thumbs',
                'close'
            ],
        });
    </script>
@endsection