@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">Proyectos más votados</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Grupo</th>
                            <th>Referencia</th>
                            <th>Fecha creación</th>
                            <th>votos</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->group }}</td>
                                <td>{{ $project->reference }}</td>
                                <td class="d-none d-md-table-cell">{{ $project->created_at }}</td>
                                <td class="d-none d-md-table-cell">{{ $project->voters->count() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
