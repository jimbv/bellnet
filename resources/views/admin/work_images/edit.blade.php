@extends('layouts.admin')

@section('scripts')
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar trabajo realizado: {{$work_image->name}}</h1>
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

            <form method="POST" action="{{ route('categories') }}" enctype="multipart/form-data">
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
                            Guardar Imágen de trabajo realizado
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection