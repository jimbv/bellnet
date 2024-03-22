<div>
    <input type="hidden" wire:model="product_id_temporal">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <select wire:model="additional_type" name="additional_type" id="additional_type" class="form-control" style="   -webkit-appearance: none;
                    -moz-appearance: none;
                    appearance: none; background-image:none;">
                    @foreach($types as $key=>$type)
                    <option value="{{$key}}">{{$type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <input type="text" placeholder="Nombre" name="additional_name" id="additional_name" class="form-control" wire:model="additional_name">
            </div>
            <div class="col-3">
                <input type="number" placeholder="Precio" name="additional_price" id="additional_price" class="form-control" wire:model="additional_price">
            </div>
            <div class="col-3">
                <div style="cursor: pointer;" class="btn btn-secondary" wire:click="save">Agregar</div>
            </div>
        </div>
    </div>
    <br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Tipo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product_additionals as $add)
            <tr>
                <th scope="row">{{$add->type}}</th>
                <td>{{$add->name}}</td>
                <td>{{$add->price}}</td>
                <td>
                    <button class="btn" wire:click="delete({{$add->id}})">Eliminar</button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>