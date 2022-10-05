<?php

namespace App\Http\Livewire\Bus\TipoBus;

use App\Models\Tipo_Bus;
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
        $buses = Tipo_Bus::where('nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')->orderBy($this->sort, $this->direction)->paginate($this->pagination);
        return view('livewire.bus.tipo-bus.index',compact('buses'));
    }
}
