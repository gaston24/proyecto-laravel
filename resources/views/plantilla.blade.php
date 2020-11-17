<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantilla</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        h1{
            color: red;
        } 
            
    </style>
</head>
<body>

    <div class="container">
        <div class="jumbotron">
            {{-- HEADER --}}
            <header>
                <h1><i>Bienvenidos a laravel 8</i></h1>
            </header>
            <hr>
            {{-- NAV --}}
            <nav>
                {{-- <a href="/foto" class="btn btn-primary my-3">FOTO</a>
                <a href="/blog" class="btn btn-primary my-3">BLOG</a> --}}
                <a href="{{route('home', 'jose')}}" class="btn btn-primary mt-3 mb-4">HOME</a>
                <a href="{{route('foto')}}" class="btn btn-primary mt-3 mb-4">FOTO</a>
                <a href="{{route('blog')}}" class="btn btn-primary mt-3 mb-4">BLOG</a>
                <a href="{{route('productos')}}" class="btn btn-primary mt-3 mb-4">PRODUCTOS</a>
                <a href="{{route('patrones')}}" class="btn btn-primary mt-3 mb-4">PATRONES</a>
                <a href="{{route('notas.menu')}}" class="btn btn-primary mt-3 mb-4">VER NOTAS</a>
                <a href="/post/create" class="btn btn-primary mt-3 mb-4">FORMULARIOS</a>
                <a href="/vuelos/info" class="btn btn-primary mt-3 mb-4">VUELOS</a>
                <a href="/request" class="btn btn-primary mt-3 mb-4">REQUEST</a>
            </nav>
            {{-- MAIN --}}
            <main>
                @yield('seccion')
            </main>
            {{-- FOOTER --}}
            <footer>
                
            </footer>
        </div>
    </div>

    
</body>
</html>