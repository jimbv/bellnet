<div>
@if(count($adicionalesAgrupados)>0)
<strong>Opciones</strong> <br>
@endif
@foreach($adicionalesAgrupados as $tipo => $opciones)

    @if(count($opciones)>1)
        <select>
            <option value="">{{$tipo}}</option>
            @foreach($opciones as $opcion)
                <option value="{{$opcion->name}}" price="{{$opcion->price}}">{{$opcion->name}}</option>
            @endforeach
        </select>
        <br>
    @else
        {{$tipo}}:  {{$opciones[0]->name}}

    @endif
    <br>

    <p></p>
@endforeach

<h2>Precio: $ {{ $price }}</h2>

</div>