@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1 class="mt-4">Editar trabajo realizado: {{$work_image->name}}</h1>
@stop

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Trabajos</li>
    <li class="breadcrumb-item active">Editar Imágen de trabajo</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('work_images.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input id="work_image_id" name="work_image_id" type="hidden" value="{{ $work_image->id }}" />
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">Título</label>
                <div class="col-md-6">
                    <input id="title" name="title" type="text" value="{{ $work_image->title }}" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required autocomplete="title" autofocus />

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="text" class="col-md-4 col-form-label text-md-end">Texto</label>
                <div class="col-md-6">
                    <input id="text" name="text" type="text" value="{{ $work_image->text }}" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required autocomplete="title" autofocus />

                    @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="images" class="col-md-4 col-form-label text-md-end">Imágen</label>

                <div class="col-md-6">
                    @if($work_image->image!='')

                    <img src="/{{$work_image->image}}" alt="{{$work_image->title}}" width="200px;" id="imagen">
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
                        Guardar Imágen de trabajo realizado
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop