<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 13:01
 */ ?>
<footer class="footer fixed-bottom bg-dark">
    <div class="copyright">© {{ date("Y") }} Copyright: {{ env('APP_NAME', "JSCVIP") }} </div>
    <div class="midias">
        <ul class="midias-bar">
            @foreach($medias as $media)
                <li class="midias-link"><a href="{{ $media->url }}" target="_blank" title="{{ $media->nome }}"><i
                                class="fab {{ $media->faicon }}"></i></a></li>
            @endforeach
        </ul>
    </div>
    <div class="desenvolvedor"><span>WebMaster: </span><a href="http://jscvip.mat.br" target="_blank">Jose Sergio
            Cordeiro</a></div>
</footer>
