<div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center">
                @foreach($images as $key=>$image)
                <div class="contenedor_min">
                    <img src="/{{$image->image_path}}" id="imagen_{{$key}}" height="100px;" class="imagen" style="box-shadow: 5px 5px 10px;margin-bottom:4px;">
                </div>
                @endforeach
            </div>
            <div class="col-md-7 text-center" style="position: relative;height:450px;">

                @foreach($images as $key=>$image)
                <div  id="big_imagen_{{$key}}" class="imagen_grande" 
                @if($key==0)
                style="z-index: 20;"
                @endif
                >
                    <div class="wm-zoom-container my-zoom">
                        <div class="wm-zoom-box">
                            <img src="/mthumb.php?src={{$image->image_path}}&w=400&h=400" class="wm-zoom-default-img" alt="alternative text" data-hight-src="/{{$image->image_path}}" data-loader-src="/imgs/loader.gif">
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
 
    <style>
        .imagen_grande{
            position: absolute;
            top:0px;
            left:0px;
        }
        .oculto{
            height: 0px;
            width: 0px;
            overflow: hidden;
        }
        

    </style>
</div>