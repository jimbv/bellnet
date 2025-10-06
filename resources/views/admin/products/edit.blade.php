@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1 class="mt-4">Editar Producto</h1>
@stop

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/admin/products/" class="text-secondary">Productos</a></li>
    <li class="breadcrumb-item active">Editar Producto</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('products.update') }}">
            @csrf
            @method('PUT')
                <input id="product_id" name="product_id" type="hidden" value="{{ $product->id }}" />
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>
                    <div class="col-md-6">
                        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')??$product->name }}" required autocomplete="name" autofocus />
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
                        <div class="form-group">
                            <div class="input-group">
                                <input id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') ?? $product->slug }}" required autocomplete="slug" autofocus />
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
                    <label for="category_id" class="col-md-4 col-form-label text-md-end">Categoría</label>
                    <div class="col-md-6">
                        <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" autocomplete="category_id" autofocus>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if( old('category_id')==$category->id || $category->id ==$product->category_id )
                                selected
                                @endif
                                >{{$category->name}}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end">Descripción</label>

                    <div class="col-md-6">
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ old('description') ?? $product->description }}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="technical_notes" class="col-md-4 col-form-label text-md-end">Detalles técnicos</label>

                    <div class="col-md-6">
                        <textarea id="technical_notes" class="form-control @error('technical_notes') is-invalid @enderror" name="technical_notes" autocomplete="technical_notes" autofocus>{{ old('technical_notes') ?? $product->technical_notes }}</textarea>

                        @error('technical_notes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="price" class="col-md-4 col-form-label text-md-end">Precio</label>

                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $product->price }}" required autocomplete="price" autofocus>

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div> 
            <div class="row mb-3">
                <label for="images" class="col-md-4 col-form-label text-md-end">Imágenes</label>
                <div class="col-md-6">
                    @livewire('admin.product-image-uploader', ['product_id' => $product->id])
                </div>
            </div>

            <div class="row mb-3 d-none">
                <label for="images" class="col-md-4 col-form-label text-md-end">Opciones</label>

                <div class="col-md-6">
                    @livewire('admin.product-additionals', ['product_id' => $product->id])
                </div>
            </div>
            <br>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Guardar producto
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
    function slugRegenerate() {
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
        $('#technical_notes').summernote({
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