<?php

namespace App\Http\Livewire\Encomienda\Encomienda;

use App\Models\Encomienda;
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
        $encomiendas = Encomienda::where('nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')->orWhere('apellido', 'ILIKE', '%' . strtolower($this->attribute) . '%')
        ->orWhere('ci', 'ILIKE', '%' . strtolower($this->attribute) . '%')->orWhere('destinatario', 'ILIKE', '%' . strtolower($this->attribute) . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->pagination);
        return view('livewire.encomienda.encomienda.index',compact('encomiendas'));
    }
}
