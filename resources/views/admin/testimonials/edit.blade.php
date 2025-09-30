@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Editar testimonio {{ $testimony->name }}</h1>
@stop

@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Testimonios</li>
    <li class="breadcrumb-item active">Editar testimonio</li>
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

            <input id="testimony_id" name="testimony_id" type="hidden" value="{{ $testimony->id }}" />
            <div class="row mb-3">
                <label for="client" class="col-md-4 col-form-label text-md-end">Cliente</label>
                <div class="col-md-6">
                    <input id="client" name="client"  type="text" value="{{ $testimony->client }}" class="form-control @error('client') is-invalid @enderror" value="{{ old('client') }}" required autocomplete="client" autofocus />

                    @error('client')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="review" class="col-md-4 col-form-label text-md-end">Cliente</label>
                <div class="col-md-6">
                    <textarea id="review" name="review" class="form-control @error('review') is-invalid @enderror" >
                    {{ $testimony->review }}
                    </textarea>

                    @error('review')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="images" class="col-md-4 col-form-label text-md-end">Imagen</label>

                <div class="col-md-6">
                    @if($testimony->image!='')

                    <img src="/{{$testimony->image}}" alt="{{$testimony->name}}" width="200px;" id="imagen">
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
                </div>
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
                Guardar testimonio
            </button>

            <br>
            <p> <br></p>
        </div>
    </div>
    </form>
</div>
</div>

@stop

@section('css')
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

    function slugRegenerate() {
        var nombreInput = document.getElementById('name');
        var slugInput = document.getElementById('slug');
        var name = nombreInput.value;
        var slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-');
        slugInput.value = slug;
    }
</script>
@stop