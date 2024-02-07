@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">Editar Usuario: {{ $voter->name }}</h1></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.voters.update') }}">
                            @csrf
                            <div class="form-group">
                                <input name="name" placeholder="Nombre" required value="{{ $voter->name }}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="email" placeholder="Email" required value="{{ $voter->email }}" type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="identity_id" placeholder="Cédula" value="{{ $voter->identity_id }}" type="text" class="form-control">
                            </div>
                            <input type="hidden" name="uuid" value="{{ $voter->uuid }}">
                            <button class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
