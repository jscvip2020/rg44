<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 12/11/2020
 * Time: 13:15
 */ ?>

@extends('layouts._appRG44Geral')
@section('titulo', ' - Lista de Albúns')
@section('content')
    <nav class="navegacao" xmlns="http://www.w3.org/1999/html">
        <div class="float-left col-md-6">
            <div class="titulo2">Lista de Albúns</div>
        </div>
        <div class="text-right navPaginacao float-right col-md-6">
            <div class="navPags">
                <?php echo "Página " . $pg . " de " . $albunsEnd->pages; ?>
            </div>
            <ul class="ulPag pull-right">
                <?php
                for ($n = 1; $n <= $albunsEnd->pages; $n++) {
                if ($n == $pg) { ?>
                <li class="paginacao pagAtivo">
                    <?php echo $n; ?>
                </li>
                <?php } else {
                ?>
                <a href="{{ route('album.list', $n) }}">
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
        @foreach ($albunsEnd->photoset as $key => $albumsetT)
            <div class="lista col-md-6 mt-2">
                <a href="{{ route('album', [$albumsetT->id, 1]) }}">
                    <div class="imgLista col-md-4 float-left">
                        <img src="https://farm<?php echo $albumsetT->farm; ?>.staticflickr.com/<?php echo $albumsetT->server . "/" . $albumsetT->primary . "_" . $albumsetT->secret; ?>_n.jpg"
                             width="100%">
                    </div>
                    <div class="textLista col-md-8 float-left">
                        <p class="titleLista">
                            {{ $albumsetT->title->_content}}
                        </p>
                        <p class="descLista mb-2">
                            {{$albumsetT->description->_content}}
                        </p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

