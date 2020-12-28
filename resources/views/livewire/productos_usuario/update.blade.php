<div class="row">
  <div class="col-md-3">
      <div class="form-group">
        <label>Matricula</label>
        <input    class="form-control" wire:model="matricula"  type="text" id="matricula" name="matricula">
        @error('matricula')
              <span class="text-red-500 text-xs italic py-1">{{ $message }}</span>
        @enderror
      </div> 
    </div> 
    <div class="col-md-3">
      <div class="form-group">
        <label>Especialidad</label>
        <select name="especialidad_id" id="especialidad_id" class="form-control" style="width: 100%;" v-model='especialidad_id'>
          @foreach($especialidades as $especialidad)
            @if ($loop->first)
              <option value="{{ $especialidad->id }}" selected="selected">{{ $especialidad->nombre }}</option>
            @else
              <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <label>Tipo Prestador</label>
        <select name="tipoprestador" id="tipoprestador"  class="form-control" style="width: 100%;">
        @foreach($tiposprestadores as $tipoprestador)
            @if ($loop->first)
              <option value="{{ $tipoprestador->id }}" selected="selected">{{ $tipoprestador->nombre }}</option>
            @else
              <option value="{{ $tipoprestador->id }}">{{ $tipoprestador->nombre }}</option>
            @endif
        @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      
      <label>&nbsp;</label>
      <br> 
        <a wire:click="update()" class="btn btn-primary"  @click='agregarespecialidad' style='width:100%;color:white;' >
        <i class="far fa-save"></i>&nbsp;&nbsp; Guardar cambios
        </a>
      </div> 
    </div>
    <div class="col-md-12"> 
  </div> 
</div> 


 