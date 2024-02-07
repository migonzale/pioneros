@extends('layouts.app')
@section('content')
    <div class="container mx-auto mb-20">
        @if($projects_voted->count() > 0)
            <div class="flex flex-wrap mb-7">
                <h3 class="text-2xl pt-5 pb-5 font-weight-black uppercase">{{ ('Proyectos por lo que he votado') }}</h3>
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md w-full mb-5" role="alert">
                    <div class="flex">
                        <div class="py-1">
                            <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                            </svg>
                        </div>
                        <div>
                            @foreach($projects_voted as $project)
                                <p class="font-bold">- {{ $project->name }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="flex flex-wrap">
            @foreach($projects as $project)
                <div class="w-full w-1/3 sm:w-1/2 md:w-1/3 lg:w-1/4 flex-none">
                    <div class="m-5 rounded overflow-hidden shadow-lg bg-white">
                        @if($project->cover != NULL)
                            <img class="w-full shadow-lg" src="{{ ('public/photos/'.$project->cover) }}">
                        @else
                            <img class="w-full shadow-lg" src="http://via.placeholder.com/640x360">
                        @endif
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">
                                <a href="/projects/{{ $project->slug }}">
                                    {{ $project->name }}
                                </a>
                            </div>
                            @if($project->voters()->find(auth()->user()->id))
                                <i class="far fa-thumbs-up"></i>
                                <br>
                            @endif
                            {!! strip_tags(htmlspecialchars_decode(\Str::limit($project->description, 100))) !!}
                        </div>
                        <div class="px-6 py-4">
                            <a href="/projects/{{ $project->slug }}" class="bg-blue-500 inline-block hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                Ver más
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="bg-indigo-900 text-center py-4 lg:px-4 fixed bottom-0 w-full">
        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            @if($intents === 0)
                <span class="font-semibold mr-2 text-left flex-auto">Ya no tienes más intentos para votar</span>
            @else
                <span class="font-semibold mr-2 text-left flex-auto">Te quedan</span>
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">{{ $intents }}</span>
                @if($intents == 1)
                    <span class="font-semibold mr-2 text-left flex-auto">Proyecto por votar</span>
                @else
                    <span class="font-semibold mr-2 text-left flex-auto">Proyectos por votar</span>
                @endif
            @endif
        </div>
    </div>
@endsection
