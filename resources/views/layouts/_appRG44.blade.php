<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 12:53
 */ ?>
@include('layouts._head')
<body style="background-color: #000000;">
<div class="bloco">
    <video muted autoplay loop class="video">
        <source src="{{ asset("videos/".env('VIDEO')) }}" type="video/mp4">
    </video>
    <div class="tranparente">
    </div>
    <div class="content">
        @yield('content')
    </div>
    @include('layouts._nav')

    @include('layouts._footer')
</div>

@include('layouts._script')

</body>
</html>
