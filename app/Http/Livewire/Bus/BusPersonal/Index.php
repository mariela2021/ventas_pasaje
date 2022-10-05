<?php

namespace App\Http\Livewire\Bus\BusPersonal;

use App\Models\Bus_Personal;
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
        $personal = Bus_Personal::where('nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')->orWhere('apellido', 'ILIKE', '%' . strtolower($this->attribute) . '%')
        ->orWhere('licencia', 'ILIKE', '%' . strtolower($this->attribute) . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->pagination);
        return view('livewire.bus.bus-personal.index',compact('personal'));
    }
}
