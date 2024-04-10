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
            filter: grayscale(100%);
            opacity: 0.2;
        }

        .degradado {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 20%;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0), #3e4a57);
        }

        @media (min-width: 768px) {
            #categories-select {
                display: none;
            }
        }

        @media (min-width: 768px) {
            #categories-buttons {
                display: block;
            }
        }

        @media (max-width: 767px) {
            #categories-buttons {
                display: none;
            }
        }

        @media (max-width: 767px) {
            #categories-select {
                display: block;
            }
        }
    </style>
    <div class="portada">
        <div class="fondo"></div>
        <div class="degradado"></div>
    </div>
    <div class="container" class="paused" style="z-index:20;">
        <div class="row">
            <div class="col-12 text-center" style='z-index:4;'>
                <br>
                <h2 style="color:white;text-shadow:0px 2px 7px #111;">GALERÍA DE PRODUCTOS</h2> <br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6  mb-3" style="z-index:4;">

                <div id="categories-select" style="z-index:2;">
                    <select wire:model="category" class="form-select" wire:change="filtrar($event.target.value)">
                        <option value="">Seleccionar categoría</option>
                        @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div id="categories-buttons" style="padding:0px 20px; font-size:22px; ">
                    @foreach($categories as $cat)
                    <div style="background: #d2c2a8;
                    border-radius:3px;
                        background: linear-gradient(
                            to right,
                            #d2d2d2,#D7DDE8
                        ); padding:10px 30px; margin:10px 5px; box-shadow: 2px 2px 20px #555;cursor:pointer;text-shadow:none;color:black;font-size:20px;" 
                        wire:click="filtrar({{$cat->id}})" class="anim-pause-1 anim-right">
                        {{$cat->name}}
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="col-lg-9 col-md-6 col-sm-6" style="z-index:2;text-shadow:0px 0px 5px white;">
                <div class="anim-pause-1 anim-left" style=" background-color: rgba(255, 255, 255, 0.5); border-radius:3px;box-shadow:0px 0px 2px #444; padding: 10px 30px;font-size:18px;">
                    @if(isset($category))
                    <h3 class="anim-pause-1 anim-left" style="display: inline-block;padding-left:15px;">Categoría </h3>
                    <h2 class="anim-pause-1 anim-left" style="display: inline-block;padding-left:0px;">{{ $category->name }}</h2>
                    <br>
                    @else

                    <p></p>
                    <br>
                    @endif

                    @foreach($products as $prod)
                    @if(isset($prod->images[0]))
                    <a href="/productos/{{$prod->slug}}/" style="text-decoration:none;" class="anim-pause-1 anim-left">

                        <div style="display:inline-block;margin-left:25px;margin-bottom:25px;line-height:30px;font-size:22px;background:#222;box-shadow: 0px 0px 5px #DDD;text-shadow:0 0 1px #111;">
                            <div style="overflow: hidden;height:260px;width:260px;display:flex;margin-bottom:0px;">
                            <img src="/{{$prod->images[0]->image_path}}" alt="{{$prod->name}}" width="260px;">
                            </div>
                            

                            <div style="padding: 10px;font-family:'Roboto_Slab';color:white;" class="text-center"> {{$prod->name}}</div>
                        </div>
                    </a>

                    @endif
                    @endforeach
                    <br>
                    <p></p>
                </div>

            </div>
        </div>

    </div>
</div>