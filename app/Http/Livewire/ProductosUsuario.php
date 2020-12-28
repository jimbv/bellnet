<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product as Productos;
use App\ProductUser as ProductUser;

class ProductosUsuario extends Component
{  
    public $data, $product_id, $user_id, $desde, $hasta, $tipo_facturacion, $selected_id;
    public $updateMode = false;
    
    public function render()
    {
        $productos = Productos::all();
        $this->data = ProductUser::all();
        return view('livewire.productos_usuario.productos-usuario',compact('productos'));
    }
 
    private function resetInput()
    {
        $this->desde = null;
        $this->hasta = null;
    }
    
    public function store()
    {
        $this->validate([
            'product_id' => 'required|min:5',
            'desde' => 'required', 
        ]);
        Contactos::create([
            'product_id' => $this->product_id,
            'desde' => $this->desde,
            'hasta' => $this->hasta, 
            'user_id' => $this->user_id
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Contactos::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->updateMode = true;

        
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns'
        ]);
        if ($this->selected_id) {
            $record = Contactos::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

        
    public function destroy($id)
    {
        if ($id) {
            $record = Prestadores::where('id', $id);
            $record->delete();

            $this->updateMode = false;
            if(Prestadores::count()==0){
                $this->render();
            }
        }
    }
}
