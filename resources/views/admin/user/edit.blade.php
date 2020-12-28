@extends ('plantilla.admin')

@section('titulo','Editar Usuario')

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Usuarios</a></li>

  <li class="breadcrumb-item active">@yield('titulo')</li>

@endsection


@section('estilos')
  @livewireStyles   
@endsection

@section('contenido')
  @livewireScripts

<style>
  .nav-tabs .nav-link {
    color:white;
    border:none!important;
  } 
</style>

<div class="card">      

    <form action="{{ route('admin.user.update',$user->id) }}" method='POST'>
      @csrf
      @method('PUT')
    <div id="apiuser"> 
    

    <div class="card-header p-0 pt-1" style='background: #007bff;'>
          <ul class="nav nav-tabs" id="tabs" role="tablist" style='border:0px;'>
            <li class="nav-item">
              <a class="nav-link active" id="datos_usuario-tab" data-toggle="pill" href="#datos_usuario" role="tab" aria-controls="datos_usuario" aria-selected="true">
                Datos principales
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="roles_usuario-tab" data-toggle="pill" href="#roles_usuario" role="tab" aria-controls="roles_usuario" aria-selected="false">
                Roles
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="productos_usuario-tab" data-toggle="pill" href="#productos_usuario" role="tab" aria-controls="productos_usuario" aria-selected="false">
                Productos y Servicios
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">
                Resúmen de cuenta
              </a>
            </li>
          </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="datos_usuario" role="tabpanel" aria-labelledby="datos_usuario">
          <div class="row">
            <div class="col-6 py-2"> 
                <label for="apellido">Apellido</label>
                <input  
                class="form-control" type="text" name="apellido" id="apellido"
                value="{{old('apellido',$user->apellido)}}" /> 
            </div>
            <div class="col-6 py-2"> 
                <label for="nombres">Nombres</label> 
                <input  
                class="form-control" type="text" name="nombres" id="nombres"
                value="{{old('nombres',$user->nombres)}}" /> 
            </div>
            <div class="col-6 py-2">
              <label for="cuit">CUIT</label>
              <input 
              v class="form-control" type="text" name="cuit" id="cuit"
              value="{{old('cuit',$user->cuit)}}" />
            </div> 
            <div class="col-6 py-2">
              <label for="nacimiento">Fecha de Nacimiento</label>
              <input 
              v class="form-control" type="date" name="nacimiento" id="nacimiento"
              value="{{old('nacimiento',$user->nacimiento)}}" />
            </div> 
            <div class="col-6 py-2">
              <label for="email">Email</label>
              <input  
              class="form-control" type="email" name="email" id="email"
              value="{{old('email',$user->email)}}" />
            </div>
            <div class="col-6 py-2">
              <label for="telefono">Teléfono</label>
              <input  
              class="form-control" type="number" name="telefono" id="telefono"
              value="{{old('telefono',$user->telefono)}}" />
            </div>
          
           
          <div class="col-6 py-2">

            <label for="provincias" >Provincia </label>
            
            <SELECT v-model='selected_provincia'  @change='loadLocalidades' style='width: 100%;
              height: 44px;
              border: 2px solid gray;
              padding-left: 12px;
              padding-right: 12px;
              border-radius:5px;
              position: relative;
              font-size: 16px;   color: #6c6c6c;' id='provincia' name='provincia' data-old="{{old('provincia',$localidad->provincia_id)}}"> 
              @foreach($provincias as $prov)
                  <option value="{{$prov->id}}" >
                  {{$prov->nombre}}
                  </option>
              @endforeach
            </SELECT>
            <i class="lni lni-card"></i>
                              


              @error('provincia')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 

          </div>
          <div class="col-6 py-2">
            <label for="localidades" >Localidad </label>

                <SELECT v-model='selected_localidad' style='width: 100%;
                            height: 44px;
                            border: 2px solid gray;
                            border-radius:5px;
                            padding-left: 12px;
                            padding-right: 12px;
                            position: relative;
                            font-size: 16px;   color: #6c6c6c;' id='localidad' name='localidad_id' data-old="{{old('localidad_id',$user->localidad_id)}}">
                                <option v-for='localidad in localidades' v-bind:value='localidad.id'>   
                                @{{localidad.nombre}}
                                </option>  
                            </SELECT>
                @error('localidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
          <div class="col-6 py-2">
            <label for="calle" >Calle</label>

                <input id="calle" type="text" class="form-control @error('calle') is-invalid @enderror" name="calle" value="{{ old('calle',$user->calle) }}" required autocomplete="calle">

                @error('calle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div> 
          <div class="col-3 py-2">
            <label for="numero" >Número</label>

                <input id="numero" type="number" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero',$user->numero) }}" required autocomplete="numero">

                @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div> 
          <div class="col-3 py-2">
            <label for="depto" >Piso y Depto.</label>

                <input id="depto" type="text" class="form-control @error('depto') is-invalid @enderror" name="depto" value="{{ old('depto',$user->depto) }}" >

                @error('depto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div> 
        
           




        </div>
          
          
          

            
        </div>  
        <div class="tab-pane fade" id="roles_usuario" role="tabpanel" aria-labelledby="roles_usuario">
            

          @foreach($roles as $rol)
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" 
                      id="rol_{{$rol->id}}"
                      value="{{$rol->id}}"
                      name="roles[]" 
                      @if(is_array(old('roles',$role_user))&&in_array("$rol->id",old('roles',$role_user)))
                        checked
                      @elseif(is_array($role_user)&&in_array("$rol->id",$role_user))
                        checked
                      @endif
                      >
                  <label class="custom-control-label" for="rol_{{$rol->id}}">
                      {{$rol->nombre}} - 
                      <em>{{$rol->descripcion}}</em>
                  </label>
              </div>
          @endforeach 

        </div>
        <div class="tab-pane fade" id="productos_usuario" role="tabpanel" aria-labelledby="productos_usuario">
        

        @livewire('productos-usuario')

        </div>
      </div> <!-- Final al contenido de los tabs --> 
    </div> <!-- Final del cuerpo de la tarjeta -->
    <div class="card-footer"> 
      <a href="{{ route('cancelar','admin.user.index')}}" class='btn btn-danger'>Cancelar</a> 
      <input type="submit" value="Actualizar" class='btn btn-primary float-right'> 
    </div> 
  

  </form> 
  </div>  
 
@endsection