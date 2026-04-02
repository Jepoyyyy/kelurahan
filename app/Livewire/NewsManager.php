<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;
use Livewire\WithPagination;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class NewsManager extends Component
{
    use WithPagination;
    use WithFileUploads;

    //pagination dan sorting
    public $perPage = 10;
    public $sortField = 'title';
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
    public function mount()
{
    Carbon::setLocale('id');
}

public function render()
{
    $data = News::orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->perPage);

    // Format tanggal langsung di collection
    $data->getCollection()->transform(function($news) {
        $news->formatted_date = $news->created_at?->translatedFormat('d F Y');
        return $news;
    });

    return view('livewire.newsmanager', [
        'newsList' => $data
    ]);
}

    public function delete($id)
{
    News::find($id)->delete();
    // session()->flash('message', 'Item deleted.');
}

    //modal state
    public $showCreateModal = false;
    public $showEditModal   = false;

    //Fields
    public $selectedId;
    public $title;
    public $description;
    public $picture;

    public function openCreateModal()
    {
        $this->reset(['title','description','picture']);
        $this->showCreateModal = true;
    }

    public function closeModal(){
        $this->showCreateModal = false;
        $this->showEditModal = false;
        $this->reset(['title', 'description', 'picture', 'selectedId']);
    }
    public function store()
    {
        $this->validate(
            [
                'title' => 'required|string|max:255',
                'picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'description' => 'required',
            ]);
        $path = $this->picture->store('news', 'public');

        News::create([
            'title' =>$this->title,
            'picture' =>$path,
            'description' =>$this->description,
        ]);
        $this->closeModal();

    }
    public function openEditModal($id)
    {
        $news                = News::findOrFail($id);
        $this->selectedId    = $news->id;
        $this->title         = $news->title;
        $this->description   = $news->description;
        $this->showEditModal = true;
    }

    public function update()
    {
        $this->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'picture'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $updateData = [
            'title'       => $this->title,
            'description' => $this->description,
        ];

        if ($this->picture) {
            $oldPicture = News::where('id', $this->selectedId)->value('picture');
            if ($oldPicture) {
                Storage::disk('public')->delete($oldPicture);
            }
            $updateData['picture'] = $this->picture->store('news', 'public');
        }

        News::where('id', $this->selectedId)->update($updateData);
        $this->closeModal();
    }

}
