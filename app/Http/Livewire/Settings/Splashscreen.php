<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\models\general\splashscreen as splashscreenmodel;
use App\Traits\web\file_storage;
use Illuminate\Support\Facades\Auth;

class Splashscreen extends Component
{
    use WithPagination, WithFileUploads, file_storage;

    public $splash_id, $image, $title_ar, $title_en, $description_ar, $description_en, $app_type, $status = 'active';
    public $new_image;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'title_ar' => 'required|string|max:255',
        'title_en' => 'required|string|max:255',
        'description_ar' => 'nullable|string',
        'description_en' => 'nullable|string',
        'app_type' => 'required|in:delegate,patient,doctor,pharma_company',
        'status' => 'required|in:active,inactive',
        'new_image' => 'nullable|image|max:2048',
    ];

    public function resetFields()
    {
        $this->splash_id = null;
        $this->image = null;
        $this->new_image = null;
        $this->title_ar = $this->title_en = $this->description_ar = $this->description_en = '';
        $this->app_type = $this->status = null;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'title' => ['ar' => $this->title_ar, 'en' => $this->title_en],
            'description' => ['ar' => $this->description_ar, 'en' => $this->description_en],
            'app_type' => $this->app_type,
            'status' => $this->status,
            'user_add' => Auth::id(),
        ];

        if ($this->new_image) {
            $data['image'] = $this->file_storage($this->new_image, 'splashscreens');
        }

        if ($this->splash_id) {
            $splash = splashscreenmodel::findOrFail($this->splash_id);
            $splash->update($data);
        } else {
            splashscreenmodel::create($data);
        }

        $this->resetFields();
        session()->flash('success', __('splashscreen.saved_success'));
    }

    public function edit($id)
    {
        $splash = splashscreenmodel::findOrFail($id);
        $this->splash_id = $splash->id;
        $this->image = $splash->image;
        $this->title_ar = $splash->getTranslation('title', 'ar');
        $this->title_en = $splash->getTranslation('title', 'en');
        $this->description_ar = $splash->getTranslation('description', 'ar');
        $this->description_en = $splash->getTranslation('description', 'en');
        $this->app_type = $splash->app_type;
        $this->status = $splash->status;
    }

    public function delete($id)
    {
        $splash = splashscreenmodel::findOrFail($id);
        $splash->delete();
        session()->flash('success', __('splashscreen.deleted_success'));
    }

    public function render()
    {
        $splashscreens = splashscreenmodel::latest()->paginate(10);
        return view('livewire.settings.splashscreen', compact('splashscreens'));
    }
}