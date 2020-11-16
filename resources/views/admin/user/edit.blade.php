@extends ('plantilla.admin')

@section('titulo','Editar Usuario')

@section('breadcrumb')

  <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Usuarios</a></li>

  <li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')



      <div class="card">

        

      <form action="{{ route('admin.user.update',$user->id) }}" method='POST'>
        @csrf
        @method('PUT')

      <div id="apiuser">

        <div class="card-header">

          <h3 class="card-title">Administración de Usuarios</h3>



          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

              <i class="fas fa-minus"></i></button>

            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">

              <i class="fas fa-times"></i></button>

          </div>

        </div>

        <div class="card-body">
  

                    <div class="form-group">

                      <label for="nombre">Apellido y Nombre</label>

                      <input  
                      class="form-control" type="text" name="name" id="name"
                      value="{{old('name',$user->name)}}" />

                    </div>
                    <div class="form-group">

                      <label for="slug">CUIT</label>

                      <input 
                      v class="form-control" type="text" name="cuit" id="cuit"
                      value="{{old('cuit',$user->cuit)}}" />

                    </div>
                    <div class="form-group">

                      <label for="nombre">Email</label>

                      <input  
                      class="form-control" type="text" name="email" id="email"
                      value="{{old('email',$user->email)}}" />

                    </div>
                    <div class="form-group">

                      <label for="nombre">Teléfono</label>

                      <input  
                      class="form-control" type="number" name="telefono" id="telefono"
                      value="{{old('telefono',$user->telefono)}}" />
                    
                    </div>
                    <div class="form-group">

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
                    <div class="form-group">
                            <label for="localidades" >Localidad </label>
 
                                <SELECT v-model='selected_localidad' style='width: 100%;
                                            height: 44px;
                                            border: 2px solid gray;
                                            border-radius:5px;
                                            padding-left: 12px;
                                            padding-right: 12px;
                                            position: relative;
                                            font-size: 16px;   color: #6c6c6c;' id='localidad' name='localidad' data-old="{{old('localidad',$user->localidad_id)}}">
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
                          <div class="form-group">
                            <label for="direccion" >Dirección</label>
 
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion',$user->direccion) }}" required autocomplete="direccion" autofocus>

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             

 
                        <hr>
                        
                        <h3>Lista de Roles</h3> <br>

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





               

 



        </div> 

        <!-- /.card-body -->

        <div class="card-footer">

        <a href="{{ route('cancelar','admin.user.index')}}" class='btn btn-danger'>Cancelar</a>



        <input type="submit" value="Actualizar" class='btn btn-primary float-right'>

               

        </div>

        

        </div>

        </form> 
        <!-- /.card-footer-->

      </div>

      <!-- /.card -->

  

@endsection