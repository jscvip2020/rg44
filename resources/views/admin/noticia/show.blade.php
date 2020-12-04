<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 20/11/2020
 * Time: 15:47
 */ ?>

@section('titulo', ' - Eventos')
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12">
        <div class="container">
            <h1 style="font-size: revert">{{ $row->titulo }}</h1>
            {!! $row->texto !!}
        </div>
    </div>
</x-app-layout>