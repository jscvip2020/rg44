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
    <div class="content">
        @yield('content')
    </div>
    @include('layouts._nav')

    @include('layouts._footer')
</div>

@include('layouts._script')

</body>
</html>
