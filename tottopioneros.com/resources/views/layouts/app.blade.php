<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Totto</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.2.0/tailwind.min.css" rel="stylesheet">
   <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->
   <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        body {
            font-family: Nunito;
        }
    </style>
</head>
<body class="h-screen">
    <nav class="flex items-center justify-between flex-wrap bg-black p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <img width="265" height="51" src="http://tottopioneros.com/img/logo_totto.svg" alt="TOTTO">
        </div>
        <div class="w-full text-right block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                <a class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4" href="{{ url('/') }}">Home</a>
                <a class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4" href="{{ url('ideas-que-inspiran') }}">Ideas que inspiran</a>
                <a class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4" href="">¿Cómo lo viviremos?</a>
                <a class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4" href="{{ url('login') }}"><strong>Vota Aquí</strong></a>
                @if(auth()->check())
                    <a class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4" href="{{ url('projects') }}">Proyectos</a>
                @endif
                @if(auth()->check())
                    <span class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
                       <strong> {{ auth()->user()->name }} </strong> <a href="{{ route('logout') }}">{{ ('Cerrar sesión') }}</a>
                    </span>
                @endif
            </div>
        </div>
    </nav>

 

    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script>

</body>
</html>
