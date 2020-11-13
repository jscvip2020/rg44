<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 11/11/2020
 * Time: 11:41
 */ ?>
@extends('layouts._appRG44Geral')
@section('titulo', ' - Album de fotos')
@section('content')
    <div class="container">
        <nav class="navegacao">
            <div class="float-left col-md-6">
                <form action="{{ route('albums') }}" method="post" class="form-inline">
                    @csrf
                    <input type="hidden" name="oldAlbum" value="{{ $fotos->id }}">
                    <div class="form-group col-md-10">
                        <select name="album" class="form-control form-control-sm col-md-12 select">
                            <option value="0">Selecione um album diferente</option>
                            @foreach ($albunsEnd as $albumsetT)
                                <option value="{{$albumsetT->id}}">{{ $albumsetT->title->_content}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn bg-dark"><i style="color: #ffffff;"
                                                                 class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="text-right navPaginacao float-right col-md-6">
                <div class="navPags">
                    <?php echo "Página " . $pg . " de " . $fotos->pages; ?>
                </div>
                <ul class="ulPag pull-right">
                    <?php
                    for ($n = 1; $n <= $fotos->pages; $n++) {
                    if ($n == $pg) { ?>
                    <li class="paginacao pagAtivo">
                        <?php echo $n; ?>
                    </li>
                    <?php } else {
                    ?>
                    <a href="{{ route('album', [$id, $n]) }}">
                        <li class="paginacao pagInativo">
                            <?php echo $n; ?>
                        </li>
                    </a>
                    <?php
                    }
                    } ?>
                </ul>
            </div>
        </nav>
        <div class="row">
            <span class="titulo2">{{$fotos->title}}</span><br>
            <div class="text-justify pl-4">{{ $desc }}</div>
        </div>
        <div class="row mt-3">
            @foreach($fotos->photo as $foto)
                <div class="foto col-lg-3 col-md-3">
                    <a data-fancybox="gallery"
                       href="https://farm{{$foto->farm}}.staticflickr.com/{{$foto->server . "/" . $foto->id . "_" . $foto->secret}}_c.jpg"
                       title="{{$foto->title}}">
                        <img
                                src="https://farm{{$foto->farm}}.staticflickr.com/{{$foto->server . "/" . $foto->id . "_" . $foto->secret}}.jpg"
                                width="100%">
                    </a>
                </div>
            @endforeach
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
                'play',
                'thumbs',
                'close'
            ],
        });
    </script>
@endsection