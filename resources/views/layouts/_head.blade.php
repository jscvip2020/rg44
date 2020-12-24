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
    <meta property="og:url" content="{{Request::url()}}">

    <meta property="og:title" content="{{($row)?$row->titulo:'RG44 fotos e eventos'}}">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <meta property="og:description" content="{{($row)?substr(strip_tags($row->texto),0,300):'Fotos e noticias de eventos de Pérola e região'}}">

    <meta property="og:image" content="{{ ($row)?($row->capa =='default.jpg')?asset('images/'.$row->capa):asset('images/noticias/capas/'.$row->capa):asset('images/'.env('LOGO_PRETO')) }}">


    <meta property="og:type" content="website">

    <meta name="keywords" content="fotos, notícias, eventos"/>

    <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{ asset('/favicon.ico')}}" type="image/x-icon">

    <title>{{ env('APP_NAME', "JSCVIP") }} @yield('titulo')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    @include('layouts._css')


</head>