<div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center">
                @foreach($images as $image)
                <div class="contenedor_min">
                    <img src="/{{$image->image_path}}" wire:click="seleccionar('{{$image->image_path}}')" height="100px;" style="box-shadow: 5px 5px 10px;margin-bottom:4px;">
                </div>
                @endforeach
            </div>
            <div class="col-md-7 text-center"> 
                <div class="contenedor" style="width:100!important;">
                    <img src="/{{$selected_image}}" style="width:100!important;" draggable="false" />
                </div>
            </div>
        </div>
    </div>
</div>