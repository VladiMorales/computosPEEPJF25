<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCJN</title>
    <link rel="stylesheet" href="{{ asset('css/bSCJN.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tablas.css') }}">
</head>
<body>    
    <h1>ERRORES POR USUARIOS</h1>

    <div class="container">
        <div>
            <h2>Errores</h2>
            <table>
                <thead>
                    <tr>
                    <div class="wom">
                        <th>Nombre</th>
                        <th>Total</th>
                    </div> 
                    </tr>
                </thead>
                <tbody>
                    {{-- {{dd($mujeres);}} --}}
                    @foreach ($errores as $error)
                        <tr>                        
                            <td>{{ $error->username }}</td>
                            <td>{{ $error->Total }}</td>
                        </tr> 
                    @endforeach
                                                            
                </tbody>
            </table>
        </div>

        <div>
        </div>
    </div>
</body>
</html>
