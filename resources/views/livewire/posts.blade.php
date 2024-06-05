<div>
    <div class="container" class="paused" style="z-index:20;">
        <div class="row">
            <div class="col-12 text-center" style='z-index:4;'>
                <h2 style="color:white;text-shadow:0px 2px 7px #111;">NOTICIAS</h2> <br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" style="z-index:2;text-shadow:0px 0px 5px white;">
                <div class="anim-pause-1 anim-up" style="text-align:center;background-color: rgba(255, 255, 255, 0.5); border-radius:3px;box-shadow:0px 0px 2px #444; padding: 10px 30px;font-size:18px;min-height:500px;margin-bottom:40px;">
                    @foreach($posts as $post)
                    @if(isset($post->images[0])) 
                    <div class="container p-5">
                        <div class="row p-1 " style="background-color: #DDD;">
                            <div class="col-3 p-0">
                                <img class="card-img-top" src="/{{$post->images[0]->image_path}}" alt="{{$post->title}}" style='max-width:300px;max-height:300px;'>
                            </div>
                            <div class="col-9 text-start p-3" style="position: relative;">
                                <h3 class="card-title"><strong>{{$post->title}}</strong></h3> 
                                <div style="font-size: 13px;text-shadow:none;">{{date_format($post->created_at,'d/m/Y')}} <br></div>
                                {!! $post->short_text !!}</p> <br>
                                <a href="/noticias/{{$post->slug}}/" class="btn btn-secondary">
                                    Leer noticia completa
                                </a> 
                            </div>
                        </div>
                    </div>
                            
                    @endif
                    @endforeach
                    <br>
                    <div style="text-align:center;width: 100%;">
                        <div style="display:inline-block;width:auto;">
                            @if ($posts->hasPages())
                            <ul class="pagination">
                                {{-- Anterior --}}
                                @if ($posts->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">Anterior</span></li>
                                @else
                                <li class="page-item"><a class="page-link" wire:click="previousPage" href="#" style="color: black;">Anterior</a></li>
                                @endif

                                {{-- Páginas --}}
                                @foreach ($posts->links() as $page => $url)
                                @if ($page == $posts->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                <li class="page-item"><a class="page-link" wire:click="gotoPage({{ $page }})" href="#">{{ $page }}</a></li>
                                @endif
                                @endforeach

                                {{-- Siguiente --}}
                                @if ($posts->hasMorePages())
                                <li class="page-item"><a class="page-link" wire:click="nextPage" href="#" style="color: black;">Siguiente</a></li>
                                @else
                                <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
                                @endif
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>