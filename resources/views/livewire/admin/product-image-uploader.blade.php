<div>
    <input type="hidden" wire:model="product_id_temporal">
    <input type="file" id="images" class="form-control" wire:model="images" multiple>
    <br>
    <div wire:sortable="updateOrder">
        @foreach ($product_images as $img)
        <div wire:key="product-image-{{ $img->id }}" class="draggable-item" style="display:inline-block;position:relative;">
            <img src="/{{ $img->image_path }}" height="150px;" width="150px;">
            <div style="position: absolute;bottom:10px;right:10px;" wire:click="delete({{ $img->id }})" class="btn btn-secondary"><i class="fa fa-trash" aria-hidden="true"></i>
</div>
        </div>

        @endforeach
        <div wire:sortable.handle></div>
    </div>
 





</div>