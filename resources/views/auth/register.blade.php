<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preload" href="{{asset('css/login.css')}}" as="style">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <div class="form-body">
        <img src="img/add-user.png" alt="user-login">
        <p class="text">registro</p>
        <form action="{{ route('register') }}" method="POST" class="login-form">
            @csrf
            <input name="username" type="text" placeholder="Usuario">
            <input name="password" type="password" placeholder="Contraseña">
            <button type="submit">Registrarse</button>
        </form>
        @if(session('mensaje'))
            <p>
                Usuario Creado Correctamente
            </p>
        @endif
    </div>
</body>
</html>