<div>  

@if(count($adicionalesAgrupados)>0)
<strong>OPCIONALES</strong> <br> <P></P>
@endif
@foreach($adicionalesAgrupados as $tipo => $opciones)

    @if(count($opciones)>1)
    {{$tipo}}
       <br>
    
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
   
  @foreach($opciones as $opcion)
                
  <label class="btn btn-secondary btn-sm">
    <input type="radio" name="options" id="option2" autocomplete="off"> {{$opcion->name}}
  </label> 
            @endforeach
</div> 
        <br>
    @else
        {{$tipo}}:  {{$opciones[0]->name}}

    @endif
    <br>

    <p></p>
@endforeach
{{--
<h2>Precio: $ {{ $price }}</h2>
--}}
</div>