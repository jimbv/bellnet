@extends('layouts.plantilla')
@section('contenido')

 <section class="position-relative w-100" style="height: 50vh; border-bottom: 10px solid #f74e04; overflow:hidden;">

            <!-- Video de fondo -->
            <video autoplay muted loop playsinline preload="none"
                class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
                poster="/static/images/anfi.bafe026b9054.png"
                style="z-index:0;">
                <source src="/videos/video.mp4" type="video/mp4">
                <source src="/videos/video.webm" type="video/webm">
            </video>

            <!-- Overlay negro -->
            <div class="position-absolute top-0 start-0 w-100 h-100"
                style="background: rgba(0,0,0,0.6); z-index:1;">
            </div>

            <div class="container contacto">
         
        <div class="row" style="position: relative; z-index:2;margin-top:20px; ">
            <div class="col-lg-8 col-md-6 col-sm-12 offset-lg-2 offset-md-3">
                <div class="anim-up" style="background: white;margin-left:10px;margin-right:10px;color:black;padding:20px;height:100%;">
                    <h3>Dejanos tu consulta</h3>
                    <hr>
                    @if(session('success'))
                    <br>
                    <div class="alert alert-success anim-up">
                        {{ session('success') }}
                    </div>
                    @else
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="form-group anim-pause-1 anim-up">
                            <label for="name">Nombre y Apellido:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group  anim-pause-2 anim-up">
                            <label for="email">Correo electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" required>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group  anim-pause-3 anim-up">
                            <label for="email">Teléfono / Celular:</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}" required>
                            @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="form-group anim-pause-4 anim-up">
                            <label for="message">Mensaje:</label>
                            <textarea name="message" id="message" rows="5" class="form-control" required>{{old('message')}}</textarea>
                            @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                        <div class="form-group anim-up">
                            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                            @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                        </div>
                        <br>
                        <button type="submit" class="btn btn-dark regencie anim-pause-5 anim-up">Enviar mensaje</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

        </section> 
@endsection

@extends('layouts.whatsapp')