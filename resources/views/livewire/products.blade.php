<div>
    <style>
        .portada {
            position: absolute;
            width: 100%;
            height: 400px;
            top: 0px;
            left: 0px;
            overflow: hidden;
        }

        .fondo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/imgs/portada_products.jpg');
            background-size: cover;
            background-position: center;
        }

        /* Estilos para el degradado */
        .degradado {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 20%;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0), #3e4a57);
        }
    </style>
    <div class="portada">
        <div class="fondo"></div>
        <div class="degradado"></div>
    </div>
    <div class="container" class="paused" style="z-index:20;">
        <div class="row">
            <div class="col-12 text-center" style='z-index:10;'>
                <br>
                <h1 style="color:white;text-shadow:0px 2px 7px #111;">GALERÍA DE PRODUCTOS</h1> <br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6  mb-3">
                <div style=" padding:0px 20px; font-size:22px; ">
                    @foreach($categories as $cat)
                    <div style="background: #757F9A;
                        background: linear-gradient(
                            to right,
                            #757F9A,#D7DDE8
                        ); padding:10px 20px; margin:4px; box-shadow: 5px 5px 40px black;cursor:pointer;text-shadow:none;color:white; "
                         wire:click="filtrar({{$cat->id}})" class="anim-pause-1 anim-left">
                        {{$cat->name}}

                    </div>
                    @endforeach
                </div>

            </div>
            <div class="col-lg-9 col-md-6 col-sm-6" style="z-index:2;">
                @if(isset($category))
                <h2>Categoría: {{ $category->name }}</h2> <br>
                @endif

                @foreach($products as $prod)
                @if(isset($prod->images[0]))
                <a href="/productos/{{$prod->slug}}/" style="text-decoration:none;">

                    <div style="display:inline-block;margin-left:10px;margin-bottom:10px; color: black;line-height:30px;font-size:22px;background:white ;box-shadow: 5px 5px 10px; ">
                        <img src="/{{$prod->images[0]->image_path}}" alt="{{$prod->name}}" height="250px;"> <br>
                       
                       <div style="padding: 10px;" class="text-center"> {{$prod->name}}</div>
                    </div>
                </a>

                @endif
                @endforeach


            </div>
        </div>

    </div>
</div>