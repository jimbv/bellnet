<div>
    <input type="hidden" wire:model="product_id_temporal">
    <input type="file" id="images" class="form-control" wire:model="images" multiple>
    <br>
    <div wire:sortable="updateOrder">
        @foreach ($product_images as $img)
        <div wire:key="product-image-{{ $img->id }}" class="draggable-item" style="display:inline-block">
            <img src="/{{ $img->image_path }}" height="150px;" width="150px;">
            <button wire:click="delete({{ $img->id }})">Eliminar</button>
        </div>

        @endforeach
        <div wire:sortable.handle></div>
    </div>
 
</div>