@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <div class="col-6 py-2"> 
                                <label for="apellido">Apellido</label>
                                <input  
                                class="form-control @error('apellido') is-invalid @enderror" type="text" name="apellido" id="apellido" required autofocus
                                value="{{old('apellido')}}" /> 
                                @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-6 py-2"> 
                                <label for="nombres">Nombres</label> 
                                <input  
                                class="form-control @error('nombres') is-invalid @enderror" type="text" name="nombres" id="nombres"
                                value="{{old('nombres')}}" /> 
                                @error('nombres')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                           


                            <div class="col-6 py-2">
                                <label for="cuit">CUIT</label>
                                <input 
                                v class="form-control @error('cuit') is-invalid @enderror" type="text" name="cuit" id="cuit"
                                value="{{old('cuit')}}" />
                                
                                @error('cuit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-6 py-2">
                                <label for="nacimiento">Fecha de Nacimiento</label>
                                <input 
                                v class="form-control" type="date" name="nacimiento" id="nacimiento"
                                value="{{old('nacimiento')}}" />
                            </div> 
                            <div class="col-6 py-2">
                                <label for="email">Email</label>
                                <input  
                                class="form-control" type="email" name="email" id="email"
                                value="{{old('email')}}" />
                            </div>
                                
                            <div class="col-6 py-2">
                                <label for="telefono">Teléfono</label>
                                <input  
                                class="form-control" type="number" name="telefono" id="telefono"
                                value="{{old('telefono')}}" />
                            </div>
                             
                            
                            <div class="col-6 py-2">

                            <label for="provincias" >Provincia </label>
                            
                            <SELECT v-model='selected_provincia'  @change='loadLocalidades' style='width: 100%;
                                height: 44px;
                                border: 2px solid gray;
                                padding-left: 12px;
                                padding-right: 12px;
                                border-radius:5px;
                                position: relative;
                                font-size: 16px;   color: #6c6c6c;' id='provincia' name='provincia' data-old="{{old('provincia')}}"> 
                                @foreach($provincias as $prov)
                                    <option value="{{$prov->id}}" >
                                    {{$prov->nombre}}
                                    </option>
                                @endforeach
                                </SELECT>
                            <i class="lni lni-card"></i>
                                                


                                @error('provincia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 

                            </div>
                            <div class="col-6 py-2">
                            <label for="localidades" >Localidad </label>

                                <SELECT v-model='selected_localidad' style='width: 100%;
                                            height: 44px;
                                            border: 2px solid gray;
                                            border-radius:5px;
                                            padding-left: 12px;
                                            padding-right: 12px;
                                            position: relative;
                                            font-size: 16px;   color: #6c6c6c;' class="@error('localidad_id') is-invalid @enderror" id='localidad_id' name='localidad_id' data-old="{{old('localidad_id')}}">
                                                <option v-for='localidad in localidades' v-bind:value='localidad.id'>   
                                                @{{localidad.nombre}}
                                                </option>  
                                            </SELECT>
                                 @error('localidad_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 py-2">
                            <label for="calle" >Calle</label>

                                <input id="calle" type="text" class="form-control @error('calle') is-invalid @enderror" name="calle" value="{{ old('calle') }}" required autocomplete="calle">

                                @error('calle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-3 py-2">
                            <label for="numero" >Número</label>

                                <input id="numero" type="number" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero">

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-3 py-2">
                            <label for="depto" >Piso y Depto.</label>

                                <input id="depto" type="text" class="form-control @error('depto') is-invalid @enderror" name="depto" value="{{ old('depto') }}" >

                                @error('depto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 



                            <div class="col-6  py-2">
                            <label for="password" >{{ __('Password') }}</label> 
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div> 
                            <div class="col-6 py-2">
                            <label for="password-confirm" >{{ __('Confirm Password') }}</label> 
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> 
                            </div>
                        </div>

                        <div class="col-12 py-2" style='padding-bottom:30px;'>
                        <label for="captcha" >Confirma para saber que eres una persona</label> 
                        <!-- ReCaptcha --> 
                          {!! htmlFormSnippet() !!}  
                          
                       <br>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection




 <!--
                        <div class="form-group row">
                            <label for="provincias" class="col-md-4 col-form-label text-md-right">Provincia</label>
                             
  
  
                            <div class="col-md-6">

 
                                            <SELECT v-model='selected_provincia'  @change='loadLocalidades' style='width: 100%;
                                            height: 44px;
                                            border: 2px solid gray;
                                            padding-left: 12px;
                                            padding-right: 12px;
                                            border-radius:5px;
                                            position: relative;
                                            font-size: 16px;   color: #6c6c6c;' id='provincia' name='provincia' data-old="{{old('provincia')}}"> 
                                            @foreach($provincias as $prov)
                                                <option value="{{$prov->id}}" >
                                                {{$prov->nombre}}
                                                </option>
                                            @endforeach
                                            </SELECT>
                                            <i class="lni lni-card"></i>
                                        


                                

                                @error('provincia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="localidades" class="col-md-4 col-form-label text-md-right">Localidad</label>

                            <div class="col-md-6">
                                <SELECT v-model='selected_localidad' style='width: 100%;
                                            height: 44px;
                                            border: 2px solid gray;
                                            border-radius:5px;
                                            padding-left: 12px;
                                            padding-right: 12px;
                                            position: relative;
                                            font-size: 16px;   color: #6c6c6c;' id='localidad' name='localidad' data-old="{{old('localidad')}}">
                                                <option v-for='localidad in localidades' v-bind:value='localidad.id'>   
                                                @{{localidad.nombre}}
                                                </option>  
                                            </SELECT>
                                @error('localidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
-->