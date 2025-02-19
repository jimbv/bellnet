@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1 class="mt-4">Configuración</h1>
@stop

@section('content')
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/admin/posts/" class="text-secondary">Configuración</a></li>
    <li class="breadcrumb-item active">Editar parámetros</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('admin.configuration.update') }}">
            @csrf
            @method('PUT')
            <input id="id" name="id" type="hidden" value="{{ $configuration->id }}" />
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">URL Catálogo</label>
                <div class="col-md-6">
                    <input id="url_catalogo" name="url_catalogo" type="text" class="form-control @error('url_catalogo') is-invalid @enderror" value="{{ old('url_catalogo')??$configuration->url_catalogo }}" required autocomplete="url_catalogo" autofocus />
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">URL Devolución ML</label>
                <div class="col-md-6">
                    <input id="url_devolucion" name="url_devolucion" type="text" class="form-control @error('url_devolucion') is-invalid @enderror" value="{{ old('url_devolucion')??$configuration->url_devolucion }}" required autocomplete="url_devolucion" autofocus />
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <br>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Actualizar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop