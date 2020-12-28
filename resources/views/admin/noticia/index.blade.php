@extends ('plantilla.admin')

@section('titulo','Administración de Noticias')

@section('breadcrumb')

<li class="breadcrumb-item active">@yield('titulo')</li>

@endsection

@section('contenido')

 

<div class="row" id='confirmareliminar'>

<span style='display:none;' id='URLbase'>{{route('admin.noticia.index')}}</span>

@include('custom.modal_eliminar')

          <div class="col-12">

            <div class="card">

            

              <div class="card-header">

                <h3 class="card-title">Sección de noticias</h3>



                <div class="card-tools">

                 

                 <form>

                    <div class="input-group input-group-sm" style="width: 150px;">

                      <input type="text" name="nombre" class="form-control float-right" 

                      placeholder="Buscar"

                      value="{{request()->get('titulo')}}"

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

               

              <a class='m-2 float-right btn btn-primary' href="{{ route('admin.noticia.create')}}">Nueva noticia</a>

              

              <table class="table table-head-fixed text-nowrap" >

                  <thead>

                    <tr>

                      <th>ID</th>

                      <th>Imágen</th>

                      <th>Título</th>

                      <th>Fecha</th>

                      <th>Slider</th>

                      <th colspan="3"></th>

                    </tr>

                  </thead>

                  <tbody>

                  @foreach ($noticias as $noticia)

                   

                    <tr>

                      <td> {{$noticia->id}}</td>

                      <td>  

                      @if ($noticia->images->count()>0)

                        <img style='height:50px;width:50px;' src="{{$noticia->images->random()->url}}" class="rounded-circle" />



                      

                      @endif





                      </td>

                      <td> {{$noticia->titulo}}</td>

                      <td> {{$noticia->fecha}}</td>

                      <td> {{$noticia->sliderprincipal}}</td>

                      <td> <a class='btn btn-default' href="{{ route('admin.noticia.show',$noticia->slug)}}">

                          <i class="fas fa-eye"></i>

                          </a></td>

                      <td> <a class='btn btn-info' href="{{ route('admin.noticia.edit',$noticia->slug)}}">

                          <i class="fas fa-edit"></i>

                          </a></td>

                      <td> <a class='btn btn-danger' href="{{ route('admin.noticia.index')}}" 

                          v-on:click.prevent='deseas_eliminar({{ $noticia->id }})'

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





  

        {{ $noticias->appends($_GET)->links()}} 

<br/>



@endsection