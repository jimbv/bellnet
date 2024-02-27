@extends('plantilla.admin')
@section('titulo', 'Editar Producto')
@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Productos</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection
@section('estilos')
  <!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="/adminlte/plugins/ekko-lightbox/ekko-lightbox.css">
@endsection
@section('scripts')
  <script src="/adminlte/ckeditor/ckeditor.js"></script>
  <!-- Select2 -->
  <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
  <!-- Ekko Lightbox -->
  <script src="/adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <script> 

    window.data = {
        editar : 'Si',
        datos: {
            "nombre": "{{$producto->nombre}}", 
            "precioanterior":"{{$producto->precio_anterior}}",
            "precioactual":"{{$producto->precio_actual}}",
            "porcentajededescuento": "{{$producto->porcentaje_descuento}}"
        }

    } 

    $(function () {
      //Initialize Select2 Elements
      $('#category_id').select2()
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
      // Uso de lightbox
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      }); 
  }); 
  </script>
@endsection 

@section('contenido')
<div id="apiproduct">
<form action="{{ route('admin.product.update',$producto->id) }}" method="POST" enctype="multipart/form-data" >

  @csrf

  @method('PUT')

    <section class="content">
      <div class="container-fluid">

          

        <div class="card card-info">

          <div class="card-header">

            <h3 class="card-title">Datos del producto</h3>

          </div>

          <!-- /.card-header -->

          <div class="card-body">

            <div class="row">

              <div class="col-md-6">

                <div class="form-group">
                  <label>Nombre</label>
                  <input
                    v-model='nombre' 
                    @blur='getProduct' 
                    @focus='div_aparecer=false'  
                    class="form-control" type="text" id="nombre" name="nombre">
                    
                  <label>Slug</label>
                  <input 
                    readonly 
                    v-model='generarSlug' 
                    class="form-control" type="text" id="slug" name="slug" >

                  <div v-if="div_aparecer" v-bind:class="div_clase_slug">
                      @{{div_mensajeslug}}
                  </div>

                  <br v-if="div_aparecer">

                </div>              

              </div>


              <div class="col-md-6">

                <div class="form-group">

                  <label>Categoria</label>

                  <select name="category_id" id="category_id" class="form-control" style="width: 100%;">

                    @foreach($categorias as $categoria)

                    

                     @if ($categoria->id==$producto->category_id)

                        <option value="{{ $categoria->id }}" selected="selected">{{ $categoria->nombre }}</option>

                     @else

                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>

                     @endif

                    @endforeach





                  </select>

                  <label>Cantidad</label>

                  <input class="form-control" type="number" id="cantidad" name="cantidad"

                   value='{{$producto->cantidad}}' >

                </div>

                <!-- /.form-group -->

    

              </div>

              <!-- /.col -->

            </div>

            <!-- /.row -->





          </div>

          <!-- /.card-body -->

          <div class="card-footer">

           

        </div>

      </div>
 

        <div class="card card-success">

            <div class="card-header">

              <h3 class="card-title">Precios y periodos</h3>

  

              

            </div>

            <!-- /.card-header -->

            <div class="card-body">

              <div class="row">

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Precio Actual</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    <input v-model='precioactual'  
                    class="form-control" type="number" id="precioactual" 
                    name="precioactual" min="0" value="0" step=".01">                 
                    </div>
                    <br>
                    <span id="descuento">
                      @{{generardescuento}}
                    </span> 
                  </div> 
                </div> 
  

                <div class="col-md-3"> 
                  <div class="form-group"> 
                    <label>Precio anterior</label> 
                    <div class="input-group"> 
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span> 
                    </div> 
                    <input v-model='precioanterior' 
                    class="form-control" type="number" id="precioanterior" 
                    name="precioanterior" min="0" value="0" step=".01">                 
                    </div> 
                  </div>  
                </div>   


  

  

  

                <div class="col-md-3">

                  <div class="form-group"> 

                    <label>Porcentaje de descuento</label>

                     <div class="input-group">                  

                    <input v-model='porcentajededescuento' 

                    class="form-control" type="number" id="porcentajededescuento" name="porcentajededescuento" step="any" min="0" max="100" value="0" >    <div class="input-group-prepend">

                      <span class="input-group-text">%</span>

                    </div>  

  

                  </div> 
                  <br>

                  <div class="progress">

                      <div id="barraprogreso" class="progress-bar" role="progressbar" style="width: 0%;" 

                      v-bind:style="{width:porcentajededescuento+'%'}"

                      aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">@{{ porcentajededescuento}}%</div>

                  </div>

                  </div> 

                </div>

                <div class="col-md-3">
                  <div class="form-group" >
                    <label>Periodo de generación
                    </label>
                    <select  class="form-control"   id="periodo" name="periodo"  style="width: 100%;" > 
                      <option value="0"
                          @if ($producto->periodo==0)
                            selected
                          @endif 
                        >NINGUNO</option>
                      <option value="1" 
                          @if ($producto->periodo==1)
                          selected
                          @endif 
                        >MENSUAL</option>
                      <option value="2" 
                          @if ($producto->periodo==2)
                          selected
                          @endif 
                        >BIMESTRAL</option>
                      <option value="3" 
                          @if ($producto->periodo==3)
                          selected
                          @endif 
                        >TRIMESTRAL</option>
                      <option value="6" 
                          @if ($producto->periodo==6)
                          selected
                          @endif 
                        >SEMESTRAL</option>
                      <option value="12" 
                          @if ($producto->periodo==12)
                          selected
                          @endif 
                        >ANUAL</option> 
                    </select>
                  </div>
                </div> 
 
  

              </div>
 

            </div>
 

            <div class="card-footer">

              

            </div>

          </div>
 


   <div class="row">

          <div class="col-md-6">



            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Descripciones del producto</h3>

              </div>

              <div class="card-body">

                <!-- Date dd/mm/yyyy -->

                <div class="form-group">

                  <label>Descripción corta:</label>



                  <textarea class="form-control ckeditor" name="descripcion_corta" id="descripcion_corta" rows="3">

                  {!! $producto->descripcion_corta !!}

                  </textarea>

                

                </div>

                <!-- /.form group -->



               <div class="form-group">

                  <label>Descripción larga:</label>



                  <textarea class="form-control ckeditor" name="descripcion_larga" id="descripcion_larga" rows="5">

                  {!! $producto->descripcion_larga !!}

                  </textarea>

                

                </div>                



              </div>

              <!-- /.card-body -->

            </div>

            <!-- /.card -->



       </div>

        <!-- /.col-md-6 -->









          <div class="col-md-6">



            <div class="card card-info">

              <div class="card-header">

                <h3 class="card-title">Especificaciones y otros datos</h3>

              </div>

              <div class="card-body">

                <!-- Date dd/mm/yyyy -->

                <div class="form-group">

                  <label>Especificaciones:</label>



                  <textarea class="form-control ckeditor" name="especificaciones ckeditor" id="especificaciones" rows="3">

                  {!! $producto->especificaciones !!}

                  </textarea>

                

                </div>

                <!-- /.form group -->



               <div class="form-group">

                  <label>Datos de interes:</label>



                  <textarea class="form-control ckeditor" name="datos_de_interes " id="datos_de_interes" rows="5">

                  {!! $producto->datos_de_interes !!}

                  </textarea>

                

                </div>                



              </div>

              <!-- /.card-body -->

            </div>

            <!-- /.card -->



       </div>

        <!-- /.col-md-6 -->







      </div>

      <!-- /.row -->









         <div class="card card-warning">

          <div class="card-header">

            <h3 class="card-title">Imágenes</h3>



           

          </div>

          <!-- /.card-header -->

          <div class="card-body">



            <div class="form-group">

                

               <label for="imagenes">Agregar imágenes</label> 

                              

               <input type="file" class="form-control-file" id="imagenes[]" name="imagenes[]" multiple 

               accept="image/*" >



              <div class='description'>

                Un número limitado de archivos pueden ser cargados en este campo

                <br>

                Límite 2048 MB por imágen

                <br>

                Tipos permitidos: jpg, jpeg, png, gif, svg.

                <br>

                <br>

              </div>



            </div>





          </div>





          <!-- /.card-body -->

          <div class="card-footer">

            

          </div>

        </div>

        <!-- /.card -->





        <div class="card card-primary">

              <div class="card-header">

                <div class="card-title">

                  Imágenes cargadas

                </div>

              </div>

              <div class="card-body">

                <div class="row">







                @foreach($producto->images as $image)

                <div id="idimagen-{{$image->id}}" class="col-sm-2">

                  <a href="{{$image->url}}" data-title="Id:{{$image->id}}" data-toggle="lightbox" data-gallery="gallery">

                    <img src="{{$image->url}}" class="img-fluid mb-2" atyle='width:150px;height:150px;' />

                  </a>

                  <a href="{{$image->id}}" 

                  v-on:click.prevent="eliminarimagen({{$image}})"  

                  > 

                    <i class="far fa-trash-alt" style='color:red;'></i>  Id:{{$image->id}}

                  </a>

                  

                </div>

                @endforeach





                   

                </div>

              </div>

            </div>

















      <div class="card card-danger">

          <div class="card-header">

            <h3 class="card-title">Administración</h3>

          </div>

          <!-- /.card-header -->

      <div class="card-body">



       <div class="row">

              <div class="col-md-6">

                <div class="form-group">

                  

                  <label>Estado</label> 

                  <select name="estado" id="estado" class="form-control" style="width: 100%;">

                    @foreach($estados_productos as $estado)

                    

                     @if ($estado ==$producto->estado)

                        <option value="{{ $estado }}" selected="selected">{{ $estado }}</option>

                     @else

                        <option value="{{ $estado }}">{{ $estado }}</option>

                     @endif

                    @endforeach





                  </select>

                 

                </div>

                <!-- /.form-group -->

                

              </div>

              <!-- /.col -->

              <div class="col-sm-6">

                    <!-- checkbox -->

                    <div class="form-group clearfix">

                      <div class="custom-control custom-checkbox">

                        <input type="checkbox" class="custom-control-input" id="activo" name="activo"

                        

                        @if($producto->activo=='Si')

                        checked

                        @endif

                        >

                        <label class="custom-control-label" for="activo">Activo</label>

                     </div>



                    </div>



                    <div class="form-group">

                    <div class="custom-control custom-switch">

                      <input type="checkbox"  class="custom-control-input" id="sliderprincipal" name="sliderprincipal"

                      @if($producto->slider_principal=='Si')

                        checked

                      @endif

                      >

                      <label class="custom-control-label" for="sliderprincipal">Aparece en el Slider principal</label>

                    </div>

                  </div>



                  </div>



                



       </div>

            <!-- /.row -->









       <div class="row">

              <div class="col-md-12">

                <div class="form-group">



                   <a class="btn btn-danger" href="{{ route('cancelar','admin.product.index') }}">Cancelar</a>

                   <input   

                   :disabled="deshabilitar_boton==1"                 

                  type="submit" value="Guardar" class="btn btn-primary">

                 

                </div>

                <!-- /.form-group -->

                

              </div>

              <!-- /.col -->





           

                



       </div>

            <!-- /.row -->









          </div>





   

          <!-- /.card-body -->

          <div class="card-footer">

            

          </div>

        </div>

        <!-- /.card -->















      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->







    </form>

    </div>

 @endsection     



