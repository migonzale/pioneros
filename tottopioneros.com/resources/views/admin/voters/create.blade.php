@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">Crear Usuario</h1></div>
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
                        <form method="POST" action="{{ route('admin.voters.store') }}">
                            @csrf
                            <div class="form-group">
                                <input name="name" placeholder="Nombre" required type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="email" placeholder="Email" required type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="identity_id" placeholder="Cédula" required type="text" class="form-control">
                            </div>
                            <button class="btn btn-primary">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
