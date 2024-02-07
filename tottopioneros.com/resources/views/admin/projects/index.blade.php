@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">Proyectos</h1>
            <a class="mr-1 mb-1 btn btn-primary" href="{{ route('admin.projects.create') }}">Crear proyecto</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        @if(session('project_created'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="alert-icon">
                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="bell" class="svg-inline--fa fa-bell fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M439.39 362.29c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71zM67.53 368c21.22-27.97 44.42-74.33 44.53-159.42 0-.2-.06-.38-.06-.58 0-61.86 50.14-112 112-112s112 50.14 112 112c0 .2-.06.38-.06.58.11 85.1 23.31 131.46 44.53 159.42H67.53zM224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64z"></path>
                                    </svg>
                                </div>
                                <div class="alert-message">
                                    El proyecto <strong>{{ session('project_created')->name }}</strong> ha sido creado.
                                </div>
                            </div>
                        @endif
                        @if(session('project_updated'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <div class="alert-icon">
                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="bell" class="svg-inline--fa fa-bell fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M439.39 362.29c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71zM67.53 368c21.22-27.97 44.42-74.33 44.53-159.42 0-.2-.06-.38-.06-.58 0-61.86 50.14-112 112-112s112 50.14 112 112c0 .2-.06.38-.06.58.11 85.1 23.31 131.46 44.53 159.42H67.53zM224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64z"></path>
                                    </svg>
                                </div>
                                <div class="alert-message">
                                    El proyecto <strong>{{ session('project_updated')->name }}</strong> ha sido actualizado.
                                </div>
                            </div>
                        @endif
                        @if(session('project_deleted'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <div class="alert-icon">
                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="bell" class="svg-inline--fa fa-bell fa-w-14 fa-fw " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M439.39 362.29c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71zM67.53 368c21.22-27.97 44.42-74.33 44.53-159.42 0-.2-.06-.38-.06-.58 0-61.86 50.14-112 112-112s112 50.14 112 112c0 .2-.06.38-.06.58.11 85.1 23.31 131.46 44.53 159.42H67.53zM224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64z"></path>
                                    </svg>
                                </div>
                                <div class="alert-message">
                                    {{ session('project_deleted') }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Grupo</th>
                                <th>Referencia</th>
                                <th>Fecha creación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->group }}</td>
                                    <td>{{ $project->reference }}</td>
                                    <td class="d-none d-md-table-cell">{{ $project->created_at }}</td>
                                    <td class="table-action">
                                        <a href="{{ route('admin.projects.show', $project->uuid) }}">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" class="svg-inline--fa fa-pen fa-w-16 fa-fw align-middle mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14 fa-fw align-middle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
