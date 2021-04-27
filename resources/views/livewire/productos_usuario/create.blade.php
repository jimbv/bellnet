<div class="row">
    
    <div class="col-md-3">
      <div class="form-group" >
        <label>Producto</label>
        <select wire:model="product_id"  class="form-control"  style="width: 100%;" >
          @foreach($productos as $producto)
             
             
              <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
             
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Fecha desde</label>
        <input    class="form-control" wire:model="desde"  type="date" id="desde" name="desde">
        @error('matricula')
              <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
        @enderror
      </div> 
    </div> 
    <div class="col-md-3">
      <div class="form-group">
        <label>Fecha hasta</label>
        <input    class="form-control" wire:model="hasta"  type="date" id="hasta" name="hasta">
        @error('matricula')
              <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
        @enderror
      </div> 
    </div> 

     
        <input type='hidden' wire:model="user_id" value='1' />  
       
    <div class="col-md-3">
      <div class="form-group">
      
      <label>&nbsp;</label>
      <br> 
        <a wire:click="store()" class="btn btn-primary"  @click='agregarproducto' style='width:100%;color:white;cursor:pointer;' >
        <i class="fas fa-plus-circle"></i>&nbsp;&nbsp; Agregar producto
        </a>
      </div> 
    </div>
    <div class="col-md-12"> 
  </div> 
</div> 


 