@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-6 gap-4">
        <div class="col-start-2 col-span-4 text-center">
            <h1>¡LLEGO EL MOMENTO DE VOTAR!</h1>
            <p>CON TU VOTO, APOYAS A TRES (3) PROYECTOS PIONEROS Y SU IDEA DE INNOVACIÓN. RECUERDA QUE SOLO PUEDE VOTAR COLABORADORES DE NALSANI S.A.S Y TAN SOLO PUEDES VOTAR TRES (3) VECES UNA VEZ.</p><br>
            <h3>PARA INGRESAR DIGITA TU NUMERO DE CÉDULA</h3><br>
        </div>
    </div>
    <div class="container full-h mx-auto flex justify-center items-center">
        <div class=" max-w-xs">
            @if(session('login_failed'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <span class="block sm:inline">La cédula que ingresaste no existe o está incorrecta</span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>
            @endif            
            <form method="POST" action="{{ route('doLogin') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="identity_id" name="identity_id" type="text" placeholder="Cédula">
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Ingresar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
