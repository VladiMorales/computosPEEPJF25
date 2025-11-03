<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/elecciones.css') }}">
    <title>Resultados</title>
    </head>
<body>
    <div class="containerEle">
        <CENTER>
            <h2>Consultar Resultados Por Elección</h2>            
            <div class="form-group">
                <br>
                <div class="scjn">
                    <a href="{{ route('res-SCJN') }}"><input  type="submit" value="SCJN"></input></a>
                </div>
                <br>
                <div class="tdj">
                    <a href="{{ route('res-TDJ') }}"><input type="submit" value="TDJ"></input></a>
                </div>
                <br>
                <div class="ss">
                    <a href="{{ route('res-SS') }}"><input type="submit" value="SS"></input></a>
                </div>
                <br>
                <div class="sr">
                    <a href="{{ route('res-SR') }}"><input type="submit" value="SR"></input></a>
                </div>
                <br>
                <div class="mc">
                    <a href="{{ route('res-MC') }}"><input type="submit" value="MC"></input></a>                    
                </div>
                <br>
                <div class="jd">
                    <a href="{{ route('res-JD') }}"><input type="submit" value="JD"></input></a>
                </div>

                <br>
                <div>                   
                    <a href="{{ route('errores') }}"><input type="submit" value="ERRORES"></input></a>                    
                </div>

            </div>        
    </CENTER> 
    </div>
</body>
</html>