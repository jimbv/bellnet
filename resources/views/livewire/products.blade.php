<div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 style="color:white;text-shadow:none;">Galería de Productos</h1> <br>
                @if(isset($category))
                    <h2>Categoría: {{ $category->name }}</h2>
                @endif

            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div style="background: #757F9A;
                    background: linear-gradient(
                        to right,
                        #757F9A,#D7DDE8
                    ); padding:20px 30px; font-size:24px;box-shadow: 5px 5px 40px; ">
                    @foreach($categories as $cat)
                    <div wire:click="filtrar({{$cat->id}})"> {{$cat->name}} </div><br>
                    @endforeach
                </div>

            </div>
            <div class="col-8"> 
                    @foreach($products as $prod) 
                    <a href="/productos/{{$prod->slug}}/" style="color: black;" > 
                    <img src="/{{$prod->images[0]->image_path}}" alt="{{$prod->name}}" height="300px;" style="box-shadow: 5px 5px 10px;  "> <br>   
                    {{$prod->name}} </a><br>
                    @endforeach


            </div>
        </div>

    </div>
</div>