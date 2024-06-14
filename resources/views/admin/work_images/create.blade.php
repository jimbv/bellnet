@extends('layouts.admin')

@section('scripts') 
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Nueva Imágen de trabajos realizados</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Trabajos</li>
            <li class="breadcrumb-item active">Nueva imágen de trabajo</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('work_images') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">Título</label>
                        <div class="col-md-6">
                            <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required autocomplete="title" autofocus />

                            @error('title')
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
                                Guardar Imágen de trabajo realizado
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection