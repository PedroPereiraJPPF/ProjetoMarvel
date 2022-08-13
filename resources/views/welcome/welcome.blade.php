@extends('layouts.main')

@section('title', 'Marvel')

@section('content')
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
@endsection