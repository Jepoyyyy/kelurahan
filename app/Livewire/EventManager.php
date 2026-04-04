<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Event;

class EventManager extends Component
{
    use WithPagination;
    public  $namaevent, $tanggalevent, $lokasievent;
    public $jenisevent = 'umum';
    public function store(){
        $this->validate([
            'namaevent'=>'required|string|max:255',
            'tanggalevent'=>'required|date',
            'jenisevent'=>'required|string|max:255',
            'lokasievent'=>'required|string|max:255'
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
    public function render()
    {
        return view('livewire.event-manager');
    }
}
