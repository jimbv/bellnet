@extends ('plantilla.admin')

@section('titulo','Administración de Productos')

@section('breadcrumb')

<li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')

 

<div class="row" id='confirmareliminar'>

<span style='display:none;' id='URLbase'>{{route('admin.product.index')}}</span>

@include('custom.modal_eliminar')

          <div class="col-12">

            <div class="card">

            

              <div class="card-header">

                <h3 class="card-title">Sección de productos</h3>



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

              <div class="card-body table-responsive p-0" style="height: 550px;">

               

              <a class='m-2 float-right btn btn-primary' href="{{ route('admin.product.create')}}">Nuevo Producto</a>

              

              <table class="table table-head-fixed text-nowrap  table-hover" >

                  <thead>

                    <tr>

                      <th>ID</th>

                      <th>Imágen</th>

                      <th>Nombre</th>

                      <th>Estado</th>

                      <th>Activo</th>

                      <th>Slider</th>

                      <th colspan="3"></th>

                    </tr>

                  </thead>

                  <tbody>

                  @foreach ($productos as $producto)

                   

                    <tr>

                      <td> {{$producto->id}}</td>

                      <td>  

                      @if ($producto->images->count()>0)

                        <img style='height:50px;width:50px;' src="{{$producto->images->random()->url}}" class="rounded-circle" />



                      

                      @endif





                      </td>

                      <td> {{$producto->nombre}}</td>

                      <td> {{$producto->estado}}</td>

                      <td> {{$producto->activo}}</td>

                      <td> {{$producto->sliderprincipal}}</td>

                      <td> <a class='btn btn-default' href="{{ route('admin.product.show',$producto->slug)}}">

                          <i class="fas fa-eye"></i>

                          </a></td>

                      <td> <a class='btn btn-info' href="{{ route('admin.product.edit',$producto->slug)}}">

                          <i class="fas fa-edit"></i>

                          </a></td>

                      <td> <a class='btn btn-danger' href="{{ route('admin.product.index')}}" 

                          v-on:click.prevent='deseas_eliminar({{ $producto->id }})'

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


        <ul class="pagination">
          <li class="paginate_button page-item previous disabled" id="example2_previous">
            <a href="{{$productos->previousPageUrl()}}" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">
              Anterior
            </a>
          </li>
          <li class="paginate_button page-item active">
              <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">
              {{$productos->currentPage()}}
              </a>
          </li>
          <li class="paginate_button page-item next" id="example2_next">
              <a href="{{$productos->nextPageUrl()}}" aria-controls="example2" data-dt-idx="7" 
                tabindex="0" class="page-link">Siguiente
              </a>
          </li>
        </ul>




<br/>



@endsection