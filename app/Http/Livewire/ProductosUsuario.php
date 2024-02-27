<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product as Productos; 
use App\ProductUser as ProductUser;

class ProductosUsuario extends Component
{  
    public $data, $producto, $user_id, $proxima, $hasta, $precio_particular, $selected_id;
    public $updateMode = false; 

    public $user; 
 
    public function mount()
    {
        $this->user_id = $this->user->id; 
    }

    public function render()
    {   
       $user_id= $this->user_id;
       //Traigo todos los productos que pueden ser facturados periodicamente
       $productos = Productos::all()->where('periodo','>',0);
        
       //$this->data = ProductUser::with('producto');
       $datos = ProductUser::with('producto')->where('user_id',$user_id)->get();
        
        return view('livewire.productos_usuario.productos-usuario',compact('productos','datos'));
    }
 
    private function resetInput()
    {
        $this->proxima = null;
        $this->hasta = null;
        $this->producto = null;
    }
    
    public function store()
    {
        $this->validate([
            'producto' => 'required',
            'proxima' => 'required', 
        ]);
        ProductUser::create([
            'product_id' => $this->producto,
            'proxima' => $this->proxima,
            'hasta' => $this->hasta,  
            'user_id' => $this->user_id
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = ProductUser::findOrFail($id);
        $this->selected_id = $id;
        $this->producto = $record->product_id;
        $this->proxima = $record->proxima;
        $this->hasta = $record->hasta;
        $this->updateMode = true;
        
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'product_id' => 'required',
            'proxima' => 'required'
        ]);
        if ($this->selected_id) {
            $record = ProductUser::find($this->selected_id);
            $record->update([
                'product_id' => $this->producto,
                'proxima' => $this->proxima,
                'hasta' => $this->hasta
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

        
    public function destroy($id)
    {
        if ($id) {
            $record = ProductUser::where('id', $id);
            $record->delete();

            $this->updateMode = false;
            if(ProductUser::count()==0){
                $this->render();
            }
            
            $this->resetInput();
        }
    }
}
