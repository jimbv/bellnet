@extends ('plantilla.admin')

@section('titulo','Administración de Roles')

@section('breadcrumb')

<li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')

 

<div class="row" id='confirmareliminar'>

<span style='display:none;' id='URLbase'>{{route('admin.role.index')}}</span>

@include('custom.modal_eliminar')

          <div class="col-12">

            <div class="card">

            

            

              <div class="card-header">

                <h3 class="card-title">Sección de Roles</h3>



                <div class="card-tools">

                 

                 <form>

                    <div class="input-group input-group-sm" style="width: 150px;">

                      <input type="text" name="nombre" class="form-control float-right" 

                      placeholder="Buscar"

                      value="{{request()->get('nombre')}}"

                      >                     



                      <div class="input-group-append">

                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>

                      </div>

                    </div>

                  </form>

                </div>

              </div>

              <!-- /.card-header -->

              <div class="card-body table-responsive p-0" style="height: 500px;">

               

              <a class='m-2 float-right btn btn-primary' href="{{ route('admin.role.create')}}">Nuevo Rol</a>

              
              
              @include('custom.mensaje')

              <table class="table table-head-fixed text-nowrap table-hover">

                  <thead>

                    <tr>

                      <th>#</th>

                      <th>Nombre</th>

                      <th>Slug</th>

                      <th>Descripción</th>

                      <th>Fecha creación</th>

                      <th>Fecha modificación</th>


                      <th colspan="3"></th>

                    </tr>

                  </thead>

                  <tbody>

                  @foreach ($roles as $role)

                   

                    <tr>

                      <td> {{$role->id}}</td>

                      <td> {{$role->nombre}}</td>

                      <td> {{$role->slug}}</td>

                      <td style ="max-width:300px;overflow:hidden;"> {{$role->descripcion}}</td>

                      <td> {{$role->created_at}}</td>

                      <td> {{$role->updated_at}}</td>

                      <td> <a class='btn btn-default' href="{{ route('admin.role.show',$role->slug)}}">

                          <i class="fas fa-eye"></i>

                          </a></td>

                      <td> <a class='btn btn-info' href="{{ route('admin.role.edit',$role->slug)}}">

                          <i class="fas fa-edit"></i>

                          </a></td>

                      <td> <a class='btn btn-danger' href="{{ route('admin.role.index')}}" 

                          v-on:click.prevent='deseas_eliminar({{ $role->id }})'

                          >

                          <i class="fas fa-trash-alt"></i>

                          </a></td>

                    </tr>

                    @endforeach

                  </tbody>

                </table>

              </div>

              <!-- /.card-body -->

            </div>

            <!-- /.card -->

          </div>

        </div> 


  

        {{ $roles->appends($_GET)->links()}} 

@endsection