<?php

namespace App\Http\Livewire\Pasaje\VentaPasaje;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $pagination = 20;
    public $attribute = '';
    public $sort = 'id';
    public $direction = 'asc';
    protected $paginationTheme = 'bootstrap';
    
    public function updatingAttribute()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $venta_pasaje = DB::table('venta_pasaje')->join('pasajero','pasajero.id','=','venta_pasaje.id_pasajero')->join('itinerario','itinerario.id','=','venta_pasaje.id_itinerario')->select('pasajero.*','itinerario.*','venta_pasaje.id as id','venta_pasaje.fecha as fecha')->where('pasajero.nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')->orWhere('pasajero.apellido', 'ILIKE', '%' . strtolower($this->attribute) . '%')
        ->orWhere('pasajero.ci', 'ILIKE', '%' . strtolower($this->attribute) . '%')
        ->orderBy('venta_pasaje.id', $this->direction)
        ->paginate($this->pagination);
        return view('livewire.pasaje.venta-pasaje.index',compact('venta_pasaje'));
    }
}
