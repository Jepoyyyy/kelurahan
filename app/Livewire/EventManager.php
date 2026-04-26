<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Event;
use Livewire\Attributes\Layout;

#[Layout('dashboard')]
class EventManager extends Component
{
    use WithPagination;
    public $perPage = 5;
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

    $this->resetPage();
}
    public function updatingPerPage()
{

    $this->resetPage();
}
    public function render()
{
    $data = Event::orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->perPage);

    // Format tanggal langsung di collection
    $data->getCollection()->transform(function($event) {
        $event->formatted_date = $event->tanggal?->translatedFormat('d F Y');
        return $event;
    });

    return view('livewire.event-manager', [
        'eventList' => $data

    ]);
}

    public function delete($id)
{
    Event::find($id)->delete();
    // session()->flash('message', 'Item deleted.');
}

    public  $namaevent, $tanggalevent, $lokasievent;
    public $jenisevent = 'umum';
    public function store(){
        $this->validate([
            'namaevent'=>'required|string|max:255',
            'tanggalevent'=>'required|date',
            'jenisevent'=>'required|string|max:255',
            'lokasievent'=>'required|string|max:255'
        ],
        [],  // custom messages (kosong = pakai default)
    [    // custom attribute names
        'namaevent'    => 'Nama Event',
        'tanggalevent' => 'Tanggal',
        'jenisevent'   => 'Jenis Acara',
        'lokasievent'  => 'Lokasi',
    ]);
        Event::create([
            'nama'=>$this->namaevent,
            'tanggal'=>$this->tanggalevent,
            'jenis'=>$this->jenisevent,
            'lokasi'=>$this->lokasievent
        ]);
        $this->reset(['namaevent', 'tanggalevent', 'lokasievent']);
        $this->jenisevent = 'umum';
        $this->dispatch('alert-success', message: 'Event berhasil ditambahkan!');
        //  dd($this->namaevent, $this->tanggalevent, $this->jenisevent, $this->lokasievent);
    }

    public $showCreateModal =false;
    public $showEditModal =false;
    public function openCreateModal()
    {
        $this->reset(['namaevent','tanggalevent','jenisevent','lokasievent']);
        $this->showCreateModal = true;
    }

    public function closeModal(){
        $this->showCreateModal = false;
        $this->showEditModal = false;
        $this->reset(['namaevent','tanggalevent','jenisevent','lokasievent']);
    }
    public function update(){

    }


}
