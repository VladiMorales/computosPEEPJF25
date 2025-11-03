<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SR</title>
    <link rel="preload" href="{{asset('css/style.css')}}" as="style">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @livewireStyles
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
</head>
    <body class="sr">
        <header>
            <h1 class="titulo">MAGRISTRADAS Y MAGISTRADOS DE LA SALA REGIONAL DEL TRIBUNAL ELECTORAL DEL PODER JUDICIAL DE LA FEDERACIÓN</h1>
        </header>
        <main class="contenedor sombra"> 
            <livewire:sr :casilla=$casilla />
            <div>
                <a class="boton volver" href="{{ route('elecciones') }}">Volver al inicio</a>
            </div>            
        </main>    
        <footer class="footer">
            <p>@VCyEC JDE12 CHIAPAS 2025</p>
        </footer>
        @livewireScripts
        <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('js/alertas.js') }}"></script>
        <script src="{{ asset('js/RNU.js') }}"></script>
    </body>
</html>