<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="/css/registro.css">
    <link rel="stylesheet" href="/css/welcome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
    <header class='cabecalho'>
        <div class='logo'>
            <a href="/"><img src="/img/Logo - fav.png" alt="Imagen não encontrada" height='80px'></a>
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
    @yield('content')
    <footer class='rodape'>

    </footer>
</body>
</html>