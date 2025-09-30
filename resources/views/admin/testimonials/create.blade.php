@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header') 
    <h1>Nuevo Testimonio</h1> 
@stop

@section('content')

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Testimonios</li>
    <li class="breadcrumb-item active">Nuevo Testimonio</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('testimonials') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <label for="client" class="col-md-4 col-form-label text-md-end">Cliente</label>
                <div class="col-md-6">
                    <input id="client" name="client"  type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('client') }}" required autocomplete="client" autofocus />

                    @error('client')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="review" class="col-md-4 col-form-label text-md-end">Mensaje</label>
                <div class="col-md-6">
                    <textarea id="review" name="review" class="form-control @error('review') is-invalid @enderror">
                    {{ old('review') }}"
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
                        Guardar Testimonio
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