@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Nuevo Servicio</h1>
@stop

@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Servicios</li>
    <li class="breadcrumb-item active">Nuevo servicio</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('services') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>
                <div class="col-md-6">
                    <input id="name" oninput="slugGenerate();" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus />

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="slug" class="col-md-4 col-form-label text-md-end">Slug</label>
                <div class="col-md-6">
                    <input id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required autocomplete="slug" autofocus />

                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">Descripción</label>
                <div class="col-md-6">
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="images" class="col-md-4 col-form-label text-md-end">Imagen</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Guardar Servicio
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@stop

@section('js')
<script>
    function slugGenerate() {
        var nombreInput = document.getElementById('name');
        var slugInput = document.getElementById('slug');
        var name = nombreInput.value;
        var slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-');
        slugInput.value = slug;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#description').summernote({
            height: 100, // Altura del editor
            placeholder: 'Escribe aquí...', // Texto de marcador de posición
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['view', ['fullscreen', 'codeview']],
            ]
        });
    });
</script>
@stop