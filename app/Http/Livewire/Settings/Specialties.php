<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\models\general\specialty as specialty;
use App\Traits\web\file_storage;
use Illuminate\Support\Facades\Auth;

class Specialties extends Component
{
    use WithPagination, WithFileUploads, file_storage;

    public $specialty_id, $image, $title_ar, $title_en, $status = 'active';
    public $new_image;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'title_ar' => 'required|string|max:255',
        'title_en' => 'required|string|max:255',
        'status' => 'required|in:active,inactive',
        'new_image' => 'nullable|image|max:2048',
    ];

    public function resetFields()
    {
        $this->specialty_id = null;
        $this->image = null;
        $this->new_image = null;
        $this->title_ar = $this->title_en =  '';
        $this->status = null;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'title' => ['ar' => $this->title_ar, 'en' => $this->title_en],
            'status' => $this->status,
            'user_add' => Auth::id(),
        ];

        if ($this->new_image) {
            $data['image'] = $this->file_storage($this->new_image, 'specialtys');
        }

        if ($this->specialty_id) {
            $specialty = specialty::findOrFail($this->specialty_id);
            $specialty->update($data);
        } else {
            specialty::create($data);
        }

        $this->resetFields();
        session()->flash('success', __('specialty.saved_success'));
    }

    public function edit($id)
    {
        $specialty = specialty::findOrFail($id);
        $this->specialty_id = $specialty->id;
        $this->image = $specialty->image;
        $this->title_ar = $specialty->getTranslation('title', 'ar');
        $this->title_en = $specialty->getTranslation('title', 'en');
        $this->status = $specialty->status;
    }

    public function delete($id)
    {
        $specialty = specialty::findOrFail($id);
        $specialty->delete();
        session()->flash('success', __('specialty.deleted_success'));
    }

    public function render()
    {
        $specialtys = specialty::latest()->paginate(10);
        return view('livewire.settings.specialties', compact('specialtys'));
    }
}