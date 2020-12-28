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
                <th scope="col">Desde</th>
                <th scope="col">Hasta</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data as $item)
                <tr>
                    <th scope="row"> 
                        {{ $item->desde}}
                    </th>
                    <td> 
                        {{ $item->desde}}
                    </td>
                    <td>
                        {{ $item->hasta}}
                    </td>
                    <td> 
                    <a wire:click="edit({{ $item->id }})" class="px-2 py-1 bg-blue-200 text-blue-500 hover:bg-blue-500 hover:text-white rounded">
                        <i class="far fa-edit"></i>
                    </a>
                    <a wire:click="destroy({{ $item->id }})" class="px-2 py-1 bg-red-200 text-red-500 hover:bg-red-500 hover:text-white rounded">
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