<?php

namespace App\Http\Livewire\Itinerario\Itinerario;

use App\Models\Itinerario;
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
        $itinerario = Itinerario::where('nombre_itinerario', 'ILIKE', '%' . strtolower($this->attribute) . '%')->orWhere('destino', 'ILIKE', '%' . strtolower($this->attribute) . '%')
        ->orWhere('dia', 'ILIKE', '%' . strtolower($this->attribute) . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->pagination);
        return view('livewire.itinerario.itinerario.index',compact('itinerario'));
    }
}
