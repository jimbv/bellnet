@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cambiar clave</div>

                <div class="card-body">
                @guest
                <div class="col-12">
                <h1><br>
                Vuelva a iniciar sesión
                <br></h1>
                </div>
                @else


                @if(session('datos'))

                

                <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{session('datos')}}

                <button type="button" class="close" data-dismiss='alert' aria-label='close'>

                    <span aria-hidden='true'>&times;</span>

                </button>

                </div>



                @endif



                    <form method="POST" action="{{route('cambiarclave')}}">
                    @csrf
                             
                            <input type="hidden" value="{{ Auth::user()->id }}" name="idusuario" />
                              
                            <div class="col-12 py-2">
                            <label for="oldpassword" >{{ __('Password') }} actual</label> 
                                <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required autocomplete="oldpassword">

                                @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div> 

                       
                            <div class="col-12 py-2">
                            <label for="password" >{{ __('Password') }}</label> 
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div> 
                            <div class="col-12 py-2">
                            <label for="password-confirm" >{{ __('Confirm Password') }}</label> 
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> 
                            </div> 
                            <br>
                        <div class="col-md-6 offset-md-4 ">
                            <button type="submit" class="btn btn-primary  " >
                                Guardar cambios
                            </button>
                        </div> 
                        <br>
                    </form>
                @endguest
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

 