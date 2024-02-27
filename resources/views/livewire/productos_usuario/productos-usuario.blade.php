<div>
    @if($updateMode)
        @include('livewire.productos_usuario.update')
    @else
        @include('livewire.productos_usuario.create')
    @endif

    <table class="table">
            <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Próxima</th>
                <th scope="col">Hasta</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody> 
            <br> 
            @forelse ($datos as $item)
                <tr>
                    <th scope="row">
                        {{$item->producto->nombre}} 
                    </th>
                    <td> 
                        {{ date('d/m/Y',strtotime($item->proxima))}}
                    </td>
                    <td>
                        @isset($item->hasta)
                            {{ date('d/m/Y',strtotime($item->hasta))}}    
                        @endisset
                        
                    </td>
                    <td> 
                    <a wire:click="edit({{ $item->id }})" class="px-2 py-1 bg-blue-200 text-blue-500 hover:bg-blue-500 hover:text-white rounded">
                        <i class="far fa-edit"></i>
                    </a>
                    <a wire:click="destroy({{ $item->id }})" 
                    onclick="return confirm('Confirma la eliminación')|| event.stopImmediatePropagation();" class="px-2 py-1 bg-red-200 text-red-500 hover:bg-red-500 hover:text-white rounded">
                        <i class="far fa-trash-alt"></i>
                    </a>
                        
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="4" class="py-3 italic">No hay información</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="alert alert-secondary" role="alert">
Servicios y/o productos activos,  se generará un comprobante de venta mientras no haya llegado a la <strong>Fecha Hasta</strong> y una vez que llegue a la <strong>Fecha Desde</strong>. <br>
Al llegar, de ser un producto mensual, se actualizará la <strong>Fecha Desde</strong>  para el siguiente mes, de la misma forma anualmente. 
</div>
