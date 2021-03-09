<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 14:53
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - ensaio')
@section('content')
    @if($ensaio)
        <div class="content">
            <div class="ensaio">
                <div class="ensaio__info__top">
                    <div class="img__info col-md-3">
                        <img src="{{($row) ? $row->capa : ""}}" alt="">
                    </div>
                    <div class="ensaio__desc flex-column col-md-9 pl-4">
                        <div class="ensaio__desc__top">
                            <div class="desc__nome">
                                {{$ensaio->nome.' '.$ensaio->sobrenome}}
                            </div>
                            <div class="desc__cidade">
                                {{ $ensaio->cidadeuf }}
                            </div>
                            <div class="desc__escola">
                                @if($ensaio->atividade)
                                    {{ $ensaio->atividade }}
                                @endif
                            </div>
                        </div>
                        <div class="mt-2 grupo">
                            <div class="grupo__detalhe col-md-6">
                                @if($ensaio->sonho != '')
                                    <div class="ensaio__detalhes" style="width: 100%;">
                                        <span>Sonho: </span>{{ $ensaio->sonho }}
                                    </div>
                                @endif
                                    @if($ensaio->hobby != '')
                                    <div class="ensaio__detalhes">
                                        <span>Hobby:</span>{{ $ensaio->hobby}}
                                    </div>
                                @endif

                                    @if($ensaio->torcida != '')
                                    <div class="ensaio__detalhes">
                                        <span>Torcida:</span>{{ $ensaio->torcida}}
                                    </div>
                                @endif
                                    @if($ensaio->musica != '')
                                        <div class="ensaio__detalhes">
                                            <span>Música:</span>{{ $ensaio->musica}}
                                        </div>
                                    @endif
                                @if($ensaio->personalidade != '')
                                    <div class="ensaio__detalhes">
                                        <span>Personalidade:</span>{{ $ensaio->personalidade}}
                                    </div>
                                @endif
                                @if($ensaio->frase != '')
                                    <div class="ensaio__detalhes">
                                        <span>Frase:</span>"{{ $ensaio->frase}}"
                                    </div>
                                @endif
                                   @if($ensaio->mensagem != '')
                                        <div class="ensaio__detalhes" style="width: 100%;">
                                            <span>Mensagem: </span>{{ $ensaio->mensagem }}
                                        </div>
                                    @endif


                            </div>
                            <div class="grupo__medias col-md-6">
                                @if($ensaio->link != '')
                                    <div class="medias__item">
                                        <p class="fa fa-globe"> {{ $ensaio->link}}</p>
                                    </div>
                                @endif
                                @if($ensaio->facebook != '')
                                    <div class="medias__item">
                                        <p class="fab fa-facebook-square"> {{ $ensaio->facebook}}</p>
                                    </div>
                                @endif
                                @if($ensaio->instagram != '')
                                    <div class="medias__item">
                                        <p class="fab fa-instagram-square"> {{ $ensaio->instagram}}</p>
                                    </div>
                                @endif
                                @if($ensaio->youtube != '')
                                    <div class="medias__item">
                                        <p class="fab fa-youtube-square"> {{ $ensaio->youtube}}</p>
                                    </div>
                                @endif
                                @if($ensaio->twitter != '')
                                    <div class="medias__item">
                                        <p class="fab fa-twitter-square"> {{ $ensaio->twitter}}</p>
                                    </div>
                                @endif
                                @if($ensaio->linkedin != '')
                                    <div class="medias__item">
                                        <p class="fab fa-linkedin"> {{ $ensaio->linkedin }}</p>
                                    </div>
                                @endif
                                @if($ensaio->tiktok != '')
                                    <div class="medias__item">
                                        <p class="fab fa-tiktok"> {{ $ensaio->tiktok }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="ensaio__fotos">
                    @foreach($fotos->photo as $foto)
                        <div class="foto__ensaio">
                            <a data-fancybox="gallery"
                               href="https://farm{{$foto->farm}}.staticflickr.com/{{$foto->server . "/" . $foto->id . "_" . $foto->secret}}_c.jpg"
                               title="{{$ensaio->nome.' '.$ensaio->sobrenome}}">
                                <img src="https://farm{{$foto->farm}}.staticflickr.com/{{$foto->server . "/" . $foto->id . "_" . $foto->secret}}.jpg"
                                     alt="{{$ensaio->nome.' '.$ensaio->sobrenome}}">
                            </a>
                        </div>
                    @endforeach
                </div>


            </div>

        </div>
    @endif
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
        $('body').on('click', '[data-fancybox-fb]', function () {
            window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.href) + "&t=" + encodeURIComponent(document.title), '', 'left=0,top=0,width=600,height=300,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');
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