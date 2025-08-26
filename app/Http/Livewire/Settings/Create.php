<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\setting;

class Create extends Component
{
    public $lang, $title, $app_name, $description;

    protected $rules = [
        'lang'        => 'required|in:ar,en',
        'title'       => 'required|string|max:255',
        'app_name'    => 'required|in:مريض,الأطباء,شركات الأدوية,مندوبين',
        'description' => 'nullable|string',
    ];

    protected $messages = [
        'lang.required'     => 'يجب اختيار اللغة',
        'lang.in'           => 'اللغة يجب أن تكون العربية أو الإنجليزية فقط',
        'title.required'    => 'العنوان مطلوب',
        'title.string'      => 'العنوان يجب أن يكون نص',
        'title.max'         => 'العنوان يجب ألا يتجاوز 255 حرف',
        'app_name.required' => 'التطبيق مطلوب',
        'app_name.in'       => 'التطبيق يجب أن يكون أحد (مريض، الأطباء، شركات الأدوية، مندوبين)',
        'description.string'=> 'الوصف يجب أن يكون نص',
    ];

    public function save()
    {
        $validated = $this->validate();

        setting::create($validated);

        session()->flash('success', 'تم إنشاء الإعداد بنجاح');

        return redirect()->route('settings.index');
    }

    public function render()
    {
        return view('livewire.settings.create');
    }
}
