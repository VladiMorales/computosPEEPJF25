<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elecciones</title>    
    <link rel="preload" href="{{ asset('css/elecciones.css') }}">
    <link rel="stylesheet" href="{{ asset('css/elecciones.css') }}">
</head>
<body>
    <p class="username">{{auth()->user()->username}}</p>
    <div class="containerEle">
            <h2>Elección a Capturar</h2>            
            <div class="form-group">
                <br>
                <div class="scjn">
                    <a href="{{ route('casilla','SCJN') }}"><input  type="submit" value="SCJN"></input></a>
                </div>
                <br>
                <div class="tdj">
                    <a href="{{ route('casilla', 'TDJ') }}"><input type="submit" value="TDJ"></input></a>
                </div>
                <br>
                <div class="ss">
                    <a href="{{ route('casilla', 'SS') }}"><input type="submit" value="SS"></input></a>
                </div>
                <br>
                <div class="sr">
                    <a href="{{ route('casilla','SR') }}"><input type="submit" value="SR"></input></a>
                </div>
                <br>
                <div class="mc">
                    <a href="{{ route('casilla', 'MC') }}"><input type="submit" value="MC"></input></a>                    
                </div>
                <br>
                <div class="jd">
                    <a href="{{ route('casilla', 'JD') }}"><input type="submit" value="JD"></input></a>
                </div>

                <br>
                <div>
                    <form action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <input type="submit" value="CERRAR SESIÓN"></input>
                    </form>
                </div>
            </div>       
    </div>
    <footer>
        <footer class="footer">
            <p>@VCyEC JDE12 CHIAPAS 2025</p>
        </footer>
    </footer>
</body>
</html>