<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('/estilos/style.css')}}">
    @yield('css')
    <style>
        button {
            background-color: #af70c9;
            color: white;
            padding: 8px 15px; /* Reduce el tamaño del botón */
            font-size: 14px; /* Reduce el tamaño de la fuente */
            font-weight: bold;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: auto; /* El botón ya no ocupa todo el ancho */
            margin-top: 20px;
            margin-left: 10px; /* Añade margen izquierdo */
        }

        button:hover {
            background-color: #9b58c1;
        }

        button a {
            text-decoration: none;
            color: white;
        }

        /* Alineación a la izquierda */
        main {
            text-align: left;
        }

    </style>
</head>
<body>
    <div id="app">

        <main class="py-4">
            <!-- Este es el botón que te redirige a la página anterior -->
            <button><a href="{{ route('dashboard')}}">Regresar</a></button>
            @yield('content')
        </main>
    </div>

    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
