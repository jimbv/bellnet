@push('codigos')
<script>
    $(document).ready(function() {
        //Initialize Select2 Elements 
        $('#producto').select2({
            placeholder: 'Selecciona una opción'
        , });
    });

</script>
@endpush
<div class="row">

    <div class="col-md-8">
        <div class="form-group" wire:ignore>
            <label>Producto</label>
            <select id="producto" name="producto" wire:model.defer="producto" class="form-control">
                <option value="">SELECCIONAR PRODUCTO/SERVICIO</option>
                @foreach($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
            @error('producto')
            <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
            @enderror

        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Precio Particular</label>
            <input class="form-control" type="number" id="precio_particular" name="precio_particular" disabled>
            @error('precio_particular')
            <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Fecha próxima</label>
            <input class="form-control" wire:model.defer="proxima" type="date" id="proxima" name="proxima">
            @error('proxima')
            <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Fecha hasta</label>
            <input class="form-control" wire:model.defer="hasta" type="date" id="hasta" name="hasta">
            @error('hasta')
            <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <input type='hidden' wire:model="user_id" value='{{$user->id}}' />

    <div class="col-md-4">
        <div class="form-group">
            <label>&nbsp;</label>
            <br>
            <a wire:click="store()" class="btn btn-primary" style='width:100%;color:white;cursor:pointer;'>
                <i class="fas fa-plus-circle"></i>&nbsp;&nbsp; Agregar producto
            </a>
        </div>
    </div>
    <div class="col-md-12">
    </div>
</div>
