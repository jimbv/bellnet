<div>
    <div class="container" class="paused">
        <div class="row">
            <div class="col-12 text-center">
                <h1 style="color:white;text-shadow:none;">GALERÍA DE PRODUCTOS</h1> <br>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div style=" padding:0px 20px; font-size:22px; ">
                    @foreach($categories as $cat)
                    <div style="background: #757F9A;
                        background: linear-gradient(
                            to right,
                            #757F9A,#D7DDE8
                        ); padding:10px 20px; margin:4px; box-shadow: 5px 5px 40px black;cursor:pointer;text-shadow:none;color:white; " wire:click="filtrar({{$cat->id}})" class="anim-pause-{{$loop->index}} anim-left">
                        {{$cat->name}}

                    </div>
                    @endforeach
                </div>

            </div>
            <div class="col-8">
            @if(isset($category))
                <h2>Categoría: {{ $category->name }}</h2> <br>
                @endif

                @foreach($products as $prod)
                @if(isset($prod->images[0]))
                <a href="/productos/{{$prod->slug}}/" style="text-decoration:none;">
                
                <div style="display:inline-block;margin-left:10px;margin-bottom:10px; padding-left:10px; color: black;line-height:30px;font-size:22px;background:gray;box-shadow: 5px 5px 10px; ">
                    <img src="/{{$prod->images[0]->image_path}}" alt="{{$prod->name}}" height="250px;"  > <br>
                    {{$prod->name}} 
                </div>
                </a>

                @endif
                @endforeach


            </div>
        </div>

    </div>
</div>