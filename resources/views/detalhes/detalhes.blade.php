@extends('layouts.main')

@section('title', 'Marvel')

@section('content')

@if(Auth::check())
@php
    $timestamp = '1';
    $publicKey = '8371bb45698096d61563a19f63d5ba77';
    $private = '02cab7eba6dfdf55bf03b1cf1a494dd571990250';
    $hash = "6f1d1a4bf7aad9d30f45279f7caf11c2";
    $link = "https://gateway.marvel.com/v1/public/comics?ts=$timestamp&apikey=$publicKey&hash=$hash&limit=6&id=$id";
    $info = json_decode(file_get_contents($link));
    function gerarImagens($info){
    }
    gerarImagens($info);
@endphp
<div class='hqContainer'>
    @php
    $corpoApi = $info->data->results;
    foreach ($corpoApi as $chave => $retorno) {
    $img = $retorno->thumbnail->path.".".$retorno->thumbnail->extension;
    echo "<img src=$img alt='img não encontrada' class='hqImagem'>";
    }
    @endphp
    <div class="informações">
        <div class="nomeHQ">
            {{$corpoApi[0]->title}}
        </div>
        <div class="descrição">
            @if($corpoApi[0]->description == "")
                <p>
                    A HQ não possui descrição
                </p>
            @else
                <p>
                    {{$corpoApi[0]->description}}
                </p>
            @endif
        </div>
    </div>
    <div class="button-container">
        <a href="/"><button>voltar</button></a>
    </div>
</div>

@else

<script>window.location = "/";</script>

@endif

@endsection