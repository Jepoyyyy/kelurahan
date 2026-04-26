<?php

    namespace App\Livewire;

    use App\Models\Innovation;
    use Livewire\Component;
    use Livewire\Attributes\Layout;
    use Illuminate\Support\Str;
    use Livewire\WithPagination;
    use App\Models\InnovationUpdate;
    use Livewire\WithFileUploads;
    use App\Models\InnovationUpdateMedia;
    use Illuminate\Support\Facades\Storage;
    use Carbon\Carbon;

    #[Layout('dashboard')]
    class InovationManager extends Component
    {
        use WithPagination;
        use WithFileUploads;
        public $namaprogramkerja;
        public $deskripsiprogramkerja;
        public $modalMode = 'create'; // 'create' atau 'edit'
        public $editingId = null;
        public $showCreateModal = false;
        public $showEditModal = false;
        public $showUpdateModal = false;
        public array $media = [];
        public int $mediaCount = 0;
        public $innovations_id;
        public $namaupdate;
        public $deskripsiupdate;
        public $fileType;
        public $tanggalupdate;
        public $openAccordions = [];

            public function openCreateModal()
        {
            $this->modalMode = 'create';
            $this->editingId = null;
            $this->reset(['namaprogramkerja', 'deskripsiprogramkerja']);
            $this->showCreateModal = true;
        }

        public function openEditModal($id)
        {
            $this->modalMode = 'edit';
            $this->editingId = $id;

            $innovation = Innovation::findOrFail($id);
            $this->namaprogramkerja = $innovation->title;
            $this->deskripsiprogramkerja = $innovation->description;

            $this->showCreateModal = true; // pakai modal yang sama
        }
        public function openUpdateCreateModal($id)
        {
            $this->modalMode = 'update-create';
            $this->innovations_id = $id; // set id innovation disini
            $this->reset(['namaupdate', 'deskripsiupdate', 'tanggalupdate']);
            $this->reset(['media', 'mediaCount']);
            $this->showUpdateModal = true;
        }
        public $existingMedia = []; // media yang sudah ada di DB
    public array $mediaUpdate = [];   // media baru yang akan diupload

    public $editingUpdateId = null;
    public function openUpdateEditModal($id)
    {
        $this->modalMode = 'update-edit';
        $this->editingUpdateId = $id; // tambah ini
        $updated = InnovationUpdate::findOrFail($id);
        $this->innovations_id = $updated->innovations_id;
        $this->namaupdate = $updated->title;
        $this->deskripsiupdate = $updated->description;
        $this->tanggalupdate = Carbon::parse($updated->activity_date)->format('Y-m-d');

        // pisah media existing dan media baru
        $this->existingMedia = $updated->media->map(fn($m) => [
    'id' => $m->id,
    'file_path' => $m->file_path,
    'file_type' => $m->file_type,
])->toArray();
$this->media = [];
$this->mediaCount = count($this->media) + count($this->existingMedia); // hitung dari existing, bukan 0

        $this->showUpdateModal = true;
    }


        public function closeModal()
        {
            $this->showCreateModal = false;
            $this->showEditModal = false;
            $this->showUpdateModal = false;
            $this->innovations_id = null; // tambah
            $this->existingMedia = [];
            $this->reset(['namaprogramkerja', 'deskripsiprogramkerja']);
            $this->reset(['namaupdate', 'deskripsiupdate', 'tanggalupdate']);
            $this->reset(['media', 'mediaCount']);
        }

        public function storeinnovation()
        {
            $this->validate(
                [
                    'namaprogramkerja' => 'required|string|max:255',
                    'deskripsiprogramkerja' => 'required|string|max:255',
                ],
                [],
                [
                    'namaprogramkerja' => 'Nama Program Kerja',
                    'deskripsiprogramkerja' => 'Deskripsi Program Kerja',
                ]
            );

            if ($this->modalMode === 'create') {
                Innovation::create([
                    'title' => $this->namaprogramkerja,
                    'slug' => Str::slug($this->namaprogramkerja, '-'),
                    'start_date' => now(),
                    'description' => $this->deskripsiprogramkerja
                ]);
                $message = 'Inovasi berhasil ditambahkan!';
            } else {
                Innovation::find($this->editingId)->update([
                    'title' => $this->namaprogramkerja,
                    'slug' => Str::slug($this->namaprogramkerja, '-'),
                    'description' => $this->deskripsiprogramkerja
                ]);
                $message = 'Inovasi berhasil diperbarui!';
            }
            // dd($this->namaprogramkerja, $this->deskripsiprogramkerja);
            $this->reset(['namaprogramkerja', 'deskripsiprogramkerja']);
            $this->dispatch('alert-success', message: $message, type: 'success');
            $this->closeModal();
        }

        public function render()
        {
            $data = Innovation::withCount('updates')->latest()->paginate(20);
            $this->mediaCount = count($this->media) + count($this->existingMedia);
            // dd($data->first()->updates_count); // cek nilai aslinya
            return view(
                'livewire.inovation-manager',
                [
                    'innovationList' => $data,
                    'openAccordions' => $this->openAccordions,
                ]
            );
        }


        public function updatedMedia()
        {
            $this->mediaCount = count($this->media) + count($this->existingMedia);

            $this->validate([
                'media' => 'max:' . (4 - count($this->existingMedia)),
                'media.*' => 'file|mimes:jpg,jpeg,png,mp4,mov|max:51200', // max 50MB per file
            ]);
        }

        public function storeUpdate()
{
    $this->validate([
        'media' => 'max:' . (4 - count($this->existingMedia)),
        'media.*' => 'file|mimes:jpg,jpeg,png,mp4,mov|max:51200',
    ]);

    // 🔥 BEDAKAN CREATE VS EDIT
    if ($this->modalMode === 'update-edit') {

        // ✅ AMBIL DATA LAMA
        $update = InnovationUpdate::findOrFail($this->editingUpdateId);

        // ✅ UPDATE DATA
        $update->update([
            'title' => $this->namaupdate,
            'description' => $this->deskripsiupdate,
            'slug' => Str::slug($this->namaupdate, '-'),
            'activity_date' => $this->tanggalupdate,
        ]);

    } else {

        // ✅ CREATE BARU
        $update = InnovationUpdate::create([
            'innovations_id' => $this->innovations_id,
            'slug' => Str::slug($this->namaupdate, '-'),
            'title' => $this->namaupdate,
            'description' => $this->deskripsiupdate,
            'activity_date' => $this->tanggalupdate,
        ]);
    }

    // 🔥 SIMPAN MEDIA BARU (BERLAKU UNTUK KEDUA MODE)
    foreach ($this->media as $file) {

        $path = $file->store('innovation-media', 'public');

        $extension = strtolower($file->getClientOriginalExtension());
        $mimeMap = [
            'jpg'  => 'image',
            'jpeg' => 'image',
            'png'  => 'image',
            'mp4'  => 'video',
            'mov'  => 'video',
        ];

        $fileType = $mimeMap[$extension] ?? 'image';

        InnovationUpdateMedia::create([
            'innovation_update_id' => $update->id,
            'file_path' => $path,
            'file_type' => $fileType,
        ]);
    }

    // 🔥 RESET
    $this->reset([
        'media',
        'mediaCount',
        'namaupdate',
        'deskripsiupdate',
        'tanggalupdate',
        'existingMedia',
        'editingUpdateId'
    ]);

    $this->dispatch(
        'alert-success',
        message: $this->modalMode === 'update-edit'
            ? 'Update berhasil diperbarui!'
            : 'Update berhasil ditambahkan!',
        type: 'success'
    );

    $this->closeModal();
}

        public function removeMedia(int $index)
{
    array_splice($this->media, $index, 1);
    $this->mediaCount = count($this->media) + count($this->existingMedia);
}
        public function removeExistingMedia($index)
{
    $media = $this->existingMedia[$index];

    Storage::disk('public')->delete($media['file_path']);
    InnovationUpdateMedia::find($media['id'])->delete();

    array_splice($this->existingMedia, $index, 1);

    // TAMBAHKAN INI
    $this->mediaCount = count($this->media) + count($this->existingMedia);
}

        public function toggleAccordion($id)
{
    if (isset($this->openAccordions[$id])) {
        unset($this->openAccordions[$id]);
    } else {
        $this->openAccordions[$id] = true;
    }
}
public function getUpdates($innovationId)
{
    return InnovationUpdate::where('innovations_id', $innovationId)
        ->latest()
        ->get();
}

        public function delete($id)
        {
            Innovation::find($id)?->delete();
            $this->dispatch('alert-success', message: 'Data berhasil dihapus', type: 'success');

        }

        public function deleteUpdate($id)
        {
            InnovationUpdate::find($id)?->delete();
            $this->dispatch('alert-success', message: 'Data berhasil dihapus', type: 'success');


        }
    }
