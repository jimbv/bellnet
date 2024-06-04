@extends('layouts.admin')

@section('scripts')
<script>
    function slugRegenerate() {
        var titleInput = document.getElementById('title');
        var slugInput = document.getElementById('slug');
        var title = titleInput.value;
        var slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-');
        slugInput.value = slug;
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#short_text').summernote({
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
        $('#text').summernote({
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
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar Noticia</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/admin/posts/" class="text-secondary">Noticias</a></li>
        <li class="breadcrumb-item active">Editar Noticia</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif


            <form method="POST" action="{{ route('posts.update') }}">
                @csrf
                @method('PUT')
                <input id="post_id" name="post_id" type="hidden" value="{{ $post->id }}" />
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label text-md-end">Título</label>
                    <div class="col-md-6">
                        <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title')??$post->title }}" required autocomplete="title" autofocus />
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="slug" class="col-md-4 col-form-label text-md-end">Slug</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') ?? $post->slug }}" required autocomplete="slug" autofocus />
                                <div class="input-group-append">
                                    <div class="btn btn-secondary" onclick="slugRegenerate();"> Regenerar </div>
                                </div>
                            </div>
                        </div>
                        @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="short_text" class="col-md-4 col-form-label text-md-end">Texto Corto</label>

                    <div class="col-md-6">
                        <textarea id="short_text" class="form-control @error('short_text') is-invalid @enderror" name="short_text" required autocomplete="short_text" autofocus>{{ old('short_text') ?? $post->short_text }}</textarea>

                        @error('short_text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="text" class="col-md-4 col-form-label text-md-end">Texto de la noticia</label>

                    <div class="col-md-6">
                        <textarea id="text" class="form-control @error('text') is-invalid @enderror" name="text" autocomplete="text" autofocus>{{ old('text') ?? $post->text }}</textarea>

                        @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="images" class="col-md-4 col-form-label text-md-end">Imágenes</label>

                    <div class="col-md-6">

                        @livewire('admin.post-image-uploader', ['post_id' => $post->id])

                    </div>
                </div>

                <br>
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Guardar noticia
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection