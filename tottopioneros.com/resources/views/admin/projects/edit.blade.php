@extends('admin.layout')

@section('content')
    <script src="https://cdn.tiny.cloud/1/fnn5qxi4nxij6xwxqq1058jw9j8kvj7y02yweia882hfxdrz/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <script>
        tinymce.init({selector:'textarea'});
    </script>
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">Editar Proyecto: {{ $project->name }}</h1></div>
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
                        <form method="POST" action="{{ route('admin.projects.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input name="name" placeholder="Nombre" value="{{ $project->name }}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="group" placeholder="Grupo" value="{{ $project->group }}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="reference" placeholder="Referencia" value="{{ $project->reference }}" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="">Descripción</label>
                                <textarea name="description">{{ $project->description }}</textarea>
                            </div>
                            <div class="form-group">
                                Cover
                            </div>
                            <div class="form-group">
                                <label class="">Cover</label>
                                <input id="cover" type="file" name="cover">
                            </div>
                            <div class="form-group">
                                <div id="wrapper-cover" class="row">
                                    @if($project->cover)
                                        <img src="{{ asset('photos/'.$project->cover) }}" alt="" class="col-4">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">Fotos</label>
                                <input id="photos" type="file" name="photos[]" multiple>
                            </div>
                            <div class="form-group">
                                <div id="wrapper-photos" class="row">
                                    @if($project->photos->count())
                                        @foreach($project->photos as $photo)
                                            <img src="{{ asset('photos/'.$photo->name) }}" alt="" class="col-4">
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="uuid" value="{{ $project->uuid }}">
                            <button class="btn btn-primary">Actualizar proyecto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const photosContainer = document.getElementById('wrapper-photos');
        const coverContainer = document.getElementById('wrapper-cover');
        const coverUploader = document.getElementById('cover');
        const photosUploader = document.getElementById('photos');

        photosUploader.addEventListener('change', showImagesPreviews);
        coverUploader.addEventListener('change', showImagesPreviews);

        function showImagesPreviews() {
            let self = this;
            let photos = self.files;

            photosContainer.innerHTML = '';

            for(let i = 0; i < photos.length; i++) {
                let image = document.createElement('img');
                image.className = 'col-4';
                image.src = URL.createObjectURL(photos[i]);

                if(self.id == 'cover') {
                    coverContainer.appendChild(image);
                } else {
                    photosContainer.appendChild(image);
                }
            }
        }
    </script>
@endsection
