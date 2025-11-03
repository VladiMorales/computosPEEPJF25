<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secciones</title>
    <link rel="preload" href="{{ asset('css/secciones.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('css/secciones.css') }}">
</head>
<body>    
    <div class="container sombras">
        <form action="{{ route('eleccion') }}" method="POST">
            @csrf
            <label for="opciones">Selecciona una Sección:</label>
            
            <select class="opciones" id="seccion" onchange="seccionS(this.value)" required>
                <option value="" disabled selected>Ej: 1272</option>
                    @foreach ($secciones as $seccion)
                        <option value="{{$seccion['seccion']}}">{{$seccion['seccion']}}</option>
                    @endforeach  
            </select>

            <input type="text" name="eleccion" style="display: none" value="{{$eleccion}}">
            <input type="text" name="casilla" id="casilla" style="display: none" value="">

            <br>
            <label for="opciones">Tipo de Casilla</label>
            <select id="tipo"  class="opciones" required>                
            </select>

            <br>
            <label for="opciones">Grupo</label>
            <select id="grupo" class="opciones" required>  
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>    
            </select>

            <br>
            <label >Punto de Escrutinio</label>
            <select class="opciones" required>
                <option value="" disabled selected>--Selecciona PEyC--</option>
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
                <option value="">5</option>
                <option value="">6</option>
                <option value="">7</option>
                <option value="">8</option>
                <option value="">9</option>
                <option value="">10</option>
            </select>
            <input type="submit" value="Continuar a captura" class="boton volver">
            {{-- <a class="boton volver" href="SCJN.html">Continuar a captura</a> --}}
        </form>
      </div>
      <script src="{{ asset('js/casillas.js') }}"></script>
</body>
</html>