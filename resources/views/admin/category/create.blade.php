@extends ('plantilla.admin')
@section('titulo','Crear categoría')
@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Categorías</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection
@section('contenido')
<div class="card">
    <form action="{{ route('admin.category.store') }}" method='POST'>
        @csrf

        <div id="apicategory">
            <div class="card-header">
                <h3 class="card-title">Administración de Categorías</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input v-model='nombre' @blur='getCategory' @focus='div_aparecer=false' class="form-control" type="text" name="nombre" id="nombre">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input readonly v-model='generarSlug' class="form-control" type="text" name="slug" id="slug">
                    <div v-if="div_aparecer" v-bind:class="div_clase_slug">
                        @{{div_mensajeslug}}
                    </div>
                    <br v-if="div_aparecer">
                </div>
                <div class="form-group">
                    <label for="nombre">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" cols='30' rows='5'></textarea>
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ route('cancelar','admin.category.index')}}" class='btn btn-danger'>Cancelar</a>
                <input :disabled="deshabilitar_boton==1" type="submit" value="Guardar" class='btn btn-primary float-right'>
            </div>
        </div>
    </form>

</div>

@endsection
