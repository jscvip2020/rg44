<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 07/11/2020
 * Time: 12:57
 */ ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{ asset("js/bootstrap.min.js") }}">

<script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("js/jquery.fancybox.min.js") }}"></script>

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

{{-- API FACEBOOK --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v9.0&appId=375971005831615&autoLogAppEvents=1" nonce="RQtbP1cO"></script>
{{-- END API FACEBOOK --}}

@yield('script')
