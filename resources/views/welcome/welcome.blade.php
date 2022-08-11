@extends('layouts.main')

@section('title', 'Marvel')

@section('content')
<header class='cabecalho'>
    <div class='logo'>
        <img src="/img/Logo - fav.png" alt="Imagen não encontrada" height='80px'>
    </div>
    <nav class='menu'>
        <ul>
            @if (Auth::check())
            <li><a href="http://localhost:8000/logout">Logout</a></li>
            @else
            <li><a href="http://localhost:8000/registro">Registrar</a></li>
            <li><a href="http://localhost:8000/login">Logar</a></li>
            @endif
          </ul>
    </nav>
</header>
<section class='conteudo'>
    <?php
    // abertura if check
    if(Auth::check()){
        echo "<h1>clique nas hqs para ter mais detalhes</h1>";
        echo "<script src='/js/api.js'>
        </script>"
    ?>
    <div class='hqContainer'>

    </div>
    <?php
    // fechamento do if
    }else{
        echo "<h1>faça login para ver as hqs</h1>";
    }
    ?>
</section>
<footer class='rodape'>

</footer>
@endsection