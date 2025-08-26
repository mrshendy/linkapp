<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\setting;

class Edit extends Component
{
    public $setting_id, $lang, $title, $app_name, $description;

    protected $rules = [
        'lang'        => 'required|in:ar,en',
        'title'       => 'required|string|max:255',
        'app_name'    => 'required|in:مريض,الأطباء,شركات الأدوية,مندوبين',
        'description' => 'nullable|string',
    ];

    protected $messages = [
        'lang.required'     => 'يجب اختيار اللغة',
        'lang.in'           => 'اللغة يجب أن تكون عربية أو إنجليزية فقط',
        'title.required'    => 'العنوان مطلوب',
        'title.string'      => 'العنوان يجب أن يكون نص',
        'title.max'         => 'العنوان يجب ألا يتجاوز 255 حرف',
        'app_name.required' => 'التطبيق مطلوب',
        'app_name.in'       => 'التطبيق يجب أن يكون أحد (مريض، الأطباء، شركات الأدوية، مندوبين)',
        'description.string'=> 'الوصف يجب أن يكون نص',
    ];

    public function mount($id)
    {
        $setting = setting::findOrFail($id);

        $this->setting_id  = $setting->id;
        $this->lang        = $setting->lang;
        $this->title       = $setting->title;
        $this->app_name    = $setting->app_name;
        $this->description = $setting->description;
    }

    public function update()
    {
        $validated = $this->validate();

        $setting = setting::findOrFail($this->setting_id);
        $setting->update($validated);

        session()->flash('success', 'تم تعديل الإعداد بنجاح');
        return redirect()->route('settings.index');
    }

    public function render()
    {
        return view('livewire.settings.edit');
    }
}
