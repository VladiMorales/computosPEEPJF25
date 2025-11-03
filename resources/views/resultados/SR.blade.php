<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SR</title>
    <link rel="stylesheet" href="{{asset('css/bSR.css')}}">
    <link rel="stylesheet" href="{{asset('css/tablas.css')}}">
</head>
<body>
    <h1>MAGISTRADAS Y MAGISTRADOS DE LA SALA REGIONAL DEL TRIBUNAL ELECTORAL DEL PODER JUDICIAL DE LA FEDERACIÓN</h1>

    <div class="container">
        <div>
            <h2>Elección Mujeres</h2>
            <table>
                <thead>
                    <tr>
                    <div class="wom">
                        <th>Número</th>
                        <th>Nombre</th>
                        <th>Elección</th>
                        <th>Votos</th>
                    </div> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mujeres as $mujer)
                        <tr>
                        
                        <td>{{ $mujer->voto }}</td>
                        <td>Sin Nombre</td>
                        <td>SR</td>
                        <td>{{ $mujer->total }}</td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <h2>Elección Hombres</h2>
            <table>
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Nombre</th>
                        <th>Elección</th>
                        <th>Votos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hombres as $hombre)
                        <tr>
                            <td>{{ $hombre->voto }}</td>
                            <td>Sin Nombre</td>
                            <td>SR</td>
                            <td>{{ $hombre->total }}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <p>Boletas Capturadas: {{ $boletas }}</p>
            <p>Boletas RNU: {{ $bolRNU }}</p>
            <p>Recuadros No Utilizados: {{ $blanco }}</p>
            <p>Registros Ilegibles: {{ $ilegibles }}</p>
            <p>Registros Nulos: {{ $nulos }}</p>
        </div>
    </div>

</body>
</html>
