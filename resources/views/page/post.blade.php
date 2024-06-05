@extends('layouts.template')
@section('header')

@endsection
@section('scripts')
<script src="/js/animations.js"></script>

<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
<script type="text/javascript" src="/imgs/wmzoom/jquery-1.11.1.js"></script>
<script type="text/javascript" src="/imgs/wmzoom/jquery.wm-zoom-1.0.min.js"></script>

@endsection
@section('styles')
<link rel="stylesheet" href="/imgs/wmzoom/jquery.wm-zoom-1.0.min.css">
<link href="/css/animations.css?v=2" rel="stylesheet">

@endsection
@section('content')
<section>
    <div class="posts">
        &nbsp;
        <p></p>&nbsp;
        <p></p>&nbsp;
        <p></p>&nbsp;
        <div class="container" class="paused" style="z-index:20;">
            <div class="row">
                <div class="col-md-12" style="color:white;text-shadow:none;">
                    <h1 class="anim-pause-1 anim-up">{{$post->title}}</h1> 
                </div>
                <div class="col-md-12">
                    @if(isset($post->images[0])) 

                    @endif
                    <div class="container p-5">
                        <div class="row p-1 " style="background-color: #DDD;">
                        @if(isset($post->images[0])) 
                        <div class="col-4 p-0">
                            <img class="card-img-top" src="/{{$post->images[0]->image_path}}" alt="{{$post->title}}" style='max-width:400px;max-height:400px;'>
                        </div>
                        <div class="col-8 text-start p-3"> 
                        @else
                        <div class="col-12 text-start p-3"> 
                        @endif
                                <div style="font-size: 13px;text-shadow:none;">{{date_format($post->created_at,'d/m/Y')}} <br></div>
                                {!! $post->short_text !!}</p> <br>
                                {!! $post->text !!}</p> <br>
                                </div>
                                @if($post->images->count()>1)
                                <p></p>
                                <div class="p-3" style="width:100%;text-align:center;">
                                    <h3>Imágenes</h3>
                                    @foreach($post->images as $image)
                                        <img  src="/{{$post->images[0]->image_path}}" alt="{{$post->title}}" style='max-width:300px;max-height:200px;margin:5px;'>
                                    @endforeach
                                </div>
                                @endif

                        </div>

                        

                    </div>

                    <a href="/noticias/" style="color: white;text-decoration:none;">&laquo; Volver a noticias</a>               

            </div>
        </div>
        <br>
    </div>
</section>
@endsection