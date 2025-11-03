<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="preload" href="{{ asset('css/login.css') }}">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
    <body>
        <div class="form-body">
            <img src="{{ asset('img/login.png') }}" alt="user-login">
        <!-- <p class="text">LOGIN</p> -->
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif
                <input type="text" name="username" placeholder="Usuario" required>
                <input type="password"name="password"  placeholder="Contraseña" required>
                <button>Iniciar Sesión</button>
            </form>
        </div>
    </body>
</html>