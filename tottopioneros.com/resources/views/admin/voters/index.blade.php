@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="header">
            <div><h1 class="header-title">Usuarios registrados</h1></div>
            <a class="mr-1 mb-1 btn btn-primary" href="{{ route('admin.voters.create') }}">Crear usuario</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"></div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Cédula</th>
                                <th>Fecha creación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($voters as $voter)
                                <tr>
                                    <td>{{ $voter->name }}</td>
                                    <td>{{ $voter->email }}</td>
                                    <td>{{ $voter->identity_id }}</td>
                                    <td class="d-none d-md-table-cell">{{ $voter->created_at }}</td>
                                    <td class="table-action">
                                        <a href="{{ route('admin.voters.show', $voter->uuid) }}">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" class="svg-inline--fa fa-pen fa-w-16 fa-fw align-middle mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.projects.delete', $voter->uuid) }}">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14 fa-fw align-middle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
