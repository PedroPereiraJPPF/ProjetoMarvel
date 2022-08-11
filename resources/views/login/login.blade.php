@extends('layouts.main')

@section('title', 'Marvel')

@section('content')

<div class='container'>
    @if(session('danger'))
        <div class='erro'>
            {{session('danger')}}
        </div>
    @endif
    <form action="/logar" method="post">
        @csrf
        <div class='registro-container'>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required>
            <label for="senha">Senha</label>
            <input type="text" name="senha" id="senha" required>
            <div class="button-container">
                <button type="submit">Logar</button>
            </div>
            <div class='link'>
                <a href="http://localhost:8000/registro">Não tenho uma conta</a>
            </div>
        </div>
    </form>
</div>
@endsection