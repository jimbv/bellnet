@extends('layouts.admin')

@section('scripts')
<script>
    function slugGenerate() {
        var nombreInput = document.getElementById('name');
        var slugInput = document.getElementById('slug');
        var name = nombreInput.value;
        var slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-');
        slugInput.value = slug;
    }
</script>
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar Categoría: {{$category->name}}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Categorías</li>
        <li class="breadcrumb-item active">Editar Categoría</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('categories') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input id="category_id" name="category_id" type="hidden" value="{{ $category->id }}" />
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>
                    <div class="col-md-6">
                        <input id="name" name="name" oninput="slugGenerate();" type="text" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus />

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
                        <input id="slug" name="slug" type="text" value="{{ $category->slug }}" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required autocomplete="slug" autofocus />

                        @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="images" class="col-md-4 col-form-label text-md-end">Imagen</label>

                    <div class="col-md-6">



                        @if($category->image!='')

                        <img src="/{{$category->image}}" alt="{{$category->name}}" width="200px;" id="imagen">
                        <input type="hidden" name="deleteImg" id="deleteImg" value="0">
                        <input type="button" onclick="document.getElementById('deleteImg').value='1'; 
                            document.getElementById('imagen').setAttribute('style','display:none;');
                            document.getElementById('btnDeleteImg').setAttribute('style','display:none;');
                            document.getElementById('image').setAttribute('style','display:normal;');
                            " id="btnDeleteImg" value="Eliminar Imagen">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus style="display: none;">
                        @else
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                        @endif


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
                            Guardar categoría
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection