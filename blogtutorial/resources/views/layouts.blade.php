<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Tutorial</title>
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

        <!-- Includem fisierul Custom style -->
        <link href="/style/style.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        <!-- Alocam un element html pentru a afisa un mesaj, daca inregistrarea datelor in BD este cu succes. -->
        @if (session()->has('success'))
            <div class="success-message">{{session()->get('success')}}</div>
        @endif

        <div class="nav-wrapper">
            <nav>
                <a href="{{route('home.index')}}">
                    <!--
                        Avem link dinamic; folosim numele definit in 'routes';
                        cand se apasa pe 'Home' in pagina, este cautat in routes numele 'home.index'.
                    -->
                    <div>Home</div>
                </a>
                <a href="{{route('blog.index')}}">
                    <!--
                        Avem link dinamic; folosim numele definit in 'routes';
                        cand se apasa pe 'Blogs' in pagina, este cautat in routes numele 'blog.index'.
                    -->
                    <div>Blogs</div>
                </a>
                <a href="{{route('blog.create')}}">
                    <div>Create Blogs</div>
                </a>
            </nav>
        </div>
        @yield('content') <!-- Creeaza o sectiune dinamica in interiorul blocului 'body'. Este populata functie de uri. -->
    </body>
</html>
