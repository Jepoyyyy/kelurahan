<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pemohon;
use Livewire\WithPagination;

class PemohonTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $sortField = 'nama';
    public $sortDirection = 'asc';
    public function sortBy($field)
{
    if ($this->sortField === $field) {
        // kalau klik field yang sama → toggle
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    } else {
        // kalau field baru → default asc
        $this->sortField = $field;
        $this->sortDirection = 'asc';
    }

    $this->resetPage(); // biar gak nyangkut di page lama
}
    public function updatingPerPage()
{

    $this->resetPage();
}
    public function render()
    {
        $data = Pemohon::orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage);
        // $data = Pemohon::latest()->paginate(10);


        return view('livewire.pemohon-table', [
            'pemohon' => $data
        ]);
    }

    public function delete($id)
{
    Pemohon::find($id)->delete();
    // Optional: session()->flash('message', 'Item deleted.');
}
}
