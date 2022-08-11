@extends('layouts.main')

@section('title', 'Marvel')

@section('content')

<form action="/registrar" method="post">
    @csrf
    <div class='registro-container'>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>
        <label for="senha">Senha</label>
        <input type="text" name="senha" id="senha" required>
        <div class="button-container">
            <button type="submit">Registrar</button>
        </div>
        <div class='link'>
            <a href="http://localhost:8000/login">Já possui uma conta?</a>
        </div>
    </div>
</form>

@endsection