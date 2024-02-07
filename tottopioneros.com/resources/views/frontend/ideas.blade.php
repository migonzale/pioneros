@extends('layouts.app')
@section('content')

<div class="grid grid-cols-6 gap-4">
	<div class="col-span-3"><img src="{{ asset('img/01_banner_productos_01.jpg') }}" alt=""></div>
	<div class="col-span-3"><img src="{{ asset('img/02_banner_productos_02.jpg') }}" alt=""></div>
	<div class="col-span-3"><img src="{{ asset('img/03_banner_productos_03.jpg') }}" alt=""></div>
	<div class="col-span-3"><img src="{{ asset('img/04_banner_productos_04.jpg') }}" alt=""></div>
</div>

<div class="grid grid-cols-8 gap-4">
	<div class="col-start-2 col-span-6"><h1>Ganadores</h1></div>
	<div class="col-span-2"><img src="{{ asset('img/05_ganadores_prisma.png') }}" alt=""></div>
	<div class="col-span-2">
		<h2>PRISMA</h2>
		<h3><strong>Anderson Sabio</strong></h3>
		<p>Especialista Soluciones IT</p>
		<h3><strong>Jennifer Gallego</strong></h3>
		<p>Jefe Comercial</p>
	</div>
	<div class="col-span-2"><img src="{{ asset('img/06_ganadores_geometrik.png') }}" alt=""></div>
	<div class="col-span-2">
		<h2>GEOMETRIK</h2>
		<h3><strong>Liliana Romero</strong></h3>
		<p>Jefe Medios Digitales</p>
		<h3><strong>David Mamanche</strong></h3>
		<p>Senior Merchant</p>
		<h3><strong>Mario Pérez</strong></h3>
		<p>Senior Planner</p>
	</div>
</div>

@endsection