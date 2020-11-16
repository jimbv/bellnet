@extends ('plantilla.admin')

@section('titulo','Crear Rol')

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.role.index')}}">Roles</a></li>

  <li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')



      <div class="card">

        

      <form action="{{ route('admin.role.store') }}" method='POST'>

        @csrf

      <div id="apirole">

        <div class="card-header">

          <h3 class="card-title">Administración de Roles</h3>



          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

              <i class="fas fa-minus"></i></button>

            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">

              <i class="fas fa-times"></i></button>

          </div>

        </div>

        <div class="card-body">
  

                    <div class="form-group">

                      <label for="nombre">Nombre</label>

                      <input v-model='nombre'
                      @blur='getRole' 
                      @focus='div_aparecer=false' 
                      class="form-control" type="text" name="nombre" id="nombre"
                      value="{{old('nombre')}}"
                      >
    	              </div>
                    <div class="form-group">



                      <label for="slug">Slug</label>

                      <input 
                      v-model='generarSlug' 
                      class="form-control" type="text" name="slug" id="slug" 
                      value="{{old('slug')}}"
                      >
                    </div>
                    <div class="form-group">

                      <label for="nombre">Descripción</label>

                      <textarea class="form-control" name="descripcion" id="descripcion" cols='30' rows='5'>{{old('descripcion')}}</textarea>
                        <hr>
                        <h3>Acceso total</h3> <br>
                        <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="acceso-total-si" name="acceso-total" class="custom-control-input"  value='si'
                        @if(old('acceso-total')=="si")
                          checked
                        @endif
                        >
                        <label class="custom-control-label" for="acceso-total-si">Si</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="acceso-total-no" name="acceso-total" class="custom-control-input" value='no' 
                        
                        @if(old('acceso-total')=="no")
                          checked
                        @endif
                        @if(old('acceso-total')===null)
                          checked
                        @endif

                        >
                        <label class="custom-control-label" for="acceso-total-no" > No</label>
                        </div>

                        <hr>
                        
                        <h3>Lista de Permisos</h3> <br>

                        @foreach($permisos as $permiso)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" 
                                    id="permiso_{{$permiso->id}}"
                                    value="{{$permiso->id}}"
                                    name="permisos[]" 
                                    @if(is_array(old('permisos'))&&in_array("$permiso->id",old('permisos')))
                                      checked
                                    @endif
                                    >
                                <label class="custom-control-label" for="permiso_{{$permiso->id}}">
                                    {{$permiso->id}} 
                                    - 
                                    {{$permiso->nombre}}
                                    <em>{{$permiso->descripcion}}</em>
                                </label>
                            </div>
                        @endforeach

                    </div>





               

 



        </div> 

        <!-- /.card-body -->

        <div class="card-footer">

        <a href="{{ route('cancelar','admin.role.index')}}" class='btn btn-danger'>Cancelar</a>



        <input :disabled="deshabilitar_boton==1"  type="submit" value="Guardar" class='btn btn-primary float-right'>

               

        </div>

        

        </div>

        </form> 
        <!-- /.card-footer-->

      </div>

      <!-- /.card -->

  

@endsection