<?php
/**
* Created by JS'Cordeiro Programas.
* User: Sergio
* Date: 07/11/2020
* Time: 12:50
*/
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME', "JSCVIP") }} @yield('titulo')</title>

    @include('layouts._css')


</head>