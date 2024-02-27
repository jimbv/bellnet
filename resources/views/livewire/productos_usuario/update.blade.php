<div class="row">
    
  <div class="col-md-8">
    <div class="form-group" >
      <label>Producto</label>
      <select wire:model.defer="product_id" id="product_id" name="product_id"  class="form-control"  style="width: 100%;" >
        <option value="">SELECCIONAR PRODUCTO/SERVICIO</option> 
        @foreach($productos as $producto) 
            <option value="{{ $producto->id }}" >{{ $producto->nombre }}</option> 
        @endforeach
      </select>
      
      @error('product_id')
            <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
      @enderror

    </div>
  </div>
  
  <div class="col-md-4">
    <div class="form-group">
      <label>Precio Particular</label>
      <input class="form-control"   type="number" id="precio_particular" name="precio_particular" disabled>
      @error('precio_particular')
            <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
      @enderror
    </div> 
  </div> 

  <div class="col-md-4">
    <div class="form-group">
      <label>Fecha próxima</label>
      <input  class="form-control" wire:model.defer="proxima"  type="date" id="proxima" name="proxima">
      @error('proxima')
            <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
      @enderror
    </div> 
  </div> 
  <div class="col-md-4">
    <div class="form-group">
      <label>Fecha hasta</label>
      <input    class="form-control" wire:model.defer="hasta"  type="date" id="hasta" name="hasta">
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
      <a  wire:click="update()" class="btn btn-primary"  style='width:100%;color:white;cursor:pointer;' >
        <i class="far fa-save"></i>&nbsp;&nbsp; Guardar cambios
      </a>
    </div> 
  </div>

  <div class="col-md-12"> 
  </div> 
</div> 

