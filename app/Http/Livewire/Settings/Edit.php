<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\setting;

class Edit extends Component
{
    public $setting_id;
    public $title_ar, $title_en;
    public $app_name;
    public $description_ar, $description_en;
    public $status = 'نشط'; // القيمة الافتراضية

    protected $rules = [
        'title_ar'       => 'required|string|max:255',
        'title_en'       => 'required|string|max:255',
        'app_name'       => 'required|in:مريض,الأطباء,شركات الأدوية,مندوبين',
        'description_ar' => 'nullable|string',
        'description_en' => 'nullable|string',
        'status'         => 'required|in:نشط,غير نشط',
    ];

    protected $messages = [
        'title_ar.required'       => 'العنوان بالعربية مطلوب',
        'title_ar.string'         => 'العنوان بالعربية يجب أن يكون نص',
        'title_ar.max'            => 'العنوان بالعربية يجب ألا يتجاوز 255 حرف',

        'title_en.required'       => 'العنوان بالإنجليزية مطلوب',
        'title_en.string'         => 'العنوان بالإنجليزية يجب أن يكون نص',
        'title_en.max'            => 'العنوان بالإنجليزية يجب ألا يتجاوز 255 حرف',

        'app_name.required'       => 'التطبيق مطلوب',
        'app_name.in'             => 'التطبيق يجب أن يكون أحد (مريض، الأطباء، شركات الأدوية، مندوبين)',

        'description_ar.string'   => 'الوصف بالعربية يجب أن يكون نص',
        'description_en.string'   => 'الوصف بالإنجليزية يجب أن يكون نص',

        'status.required'         => 'الحالة مطلوبة',
        'status.in'               => 'الحالة يجب أن تكون إما نشط أو غير نشط',
    ];

    public function mount($id)
    {
        $setting = setting::findOrFail($id);

        $this->setting_id    = $setting->id;
        $this->title_ar      = $setting->title_ar;
        $this->title_en      = $setting->title_en;
        $this->app_name      = $setting->app_name;
        $this->description_ar= $setting->description_ar;
        $this->description_en= $setting->description_en;
        $this->status        = $setting->status ?? 'نشط';
    }

    public function update()
    {
        $validated = $this->validate();

        $setting = setting::findOrFail($this->setting_id);
        $setting->update($validated);

        session()->flash('success', 'تم تعديل الإعداد بنجاح');
        return redirect()->route('settings.manage');
    }

    public function render()
    {
        return view('livewire.settings.edit');
    }
}
