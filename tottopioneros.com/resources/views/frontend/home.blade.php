@extends('layouts.app')
@section('content')


<div class="container mx-auto lg:max-w-full">
	<img src="{{ asset('img/banner-principal.jpg') }}" alt="Pioneros">
</div>

<div class="flex flex-wrap">
	<div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4"><img src="{{ asset('img/Bullet1.jpg') }}" alt=""></div>
	<div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4"><img src="{{ asset('img/Bullet2.jpg') }}" alt=""></div>
	<div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4"><img src="{{ asset('img/Bullet3.jpg') }}" alt=""></div>
	<div class="btn-margin w-full sm:w-1/2 md:w-1/3 lg:w-1/4 sm:justify-center">
		<a href="/politicas"><img src="{{ asset('img/btn-politicas.jpg') }}" alt=""></a>
	</div>
</div>

@endsection
