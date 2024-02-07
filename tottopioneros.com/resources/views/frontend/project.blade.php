@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <div class="flex">
            <div class="w-full">
                @if(session('vote_success'))
                    <div class="w-full bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">El voto ha sido validado</div>
                @endif
                <div class="alert"></div>
                <div class="relative pt-16 flex content-center items-center justify-center">
                    @if($project->cover != NULL)
                        <img class="w-full" src="{{ ('/public/photos/'.$project->cover) }}">
                    @else
                        <img class="w-full" src="http://via.placeholder.com/900x360">
                    @endif
                </div>
                <div class="container mx-auto">
                    <div class="pr-12">
                        <h1 class="text-black font-semibold text-5xl">{{ $project->name }}</h1>
                        <p class="mt-4 text-lg text-black-300">Grupo: {{ $project->group }}</p>
                        <p class="mt-4 text-lg text-black-300">Referencia: {{ $project->reference }}</p>
                    </div>
                    <div class="flex flex-wrap">
                        @if( \DB::table('project_voter')->where('voter_id', auth()->user()->id)->where('project_id', $project->id)->where('validate', 0)->get()->count())
                            <div class="w-full bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                <p class="text-sm">Pendiente validar voto en el correo</p>
                            </div>
                        @elseif(\DB::table('project_voter')->where('voter_id', auth()->user()->id)->where('project_id', $project->id)->where('validate', 1)->get()->count())
                            <div class="w-full bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                <p class="text-sm">Ya has votado por este proyecto</p>
                            </div>
                        @elseif( $total_votes == 3 )
                            <div class="w-100 bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                <p class="text-sm">No puedes votar por más proyectos</p>
                            </div>
                        @else
                            <button id="vote-btn" data-voter="{{ auth()->user()->id }}" data-project="{{ $project->uuid }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                Votar
                            </button>
                        @endif
                        <article class="px-6 py-6">
                            {!! $project->description !!}
                        </article>
                    </div>
                </div>
            </div>
            <!-- <div class="w-1/4">
                text
            </div> -->
        </div>
    </div>
@endsection
