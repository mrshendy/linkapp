<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\setting;

class Create extends Component
{
    public $title_ar, $title_en;
    public $app_name;
    public $description_ar, $description_en;

    protected $rules = [
        'title_ar'       => 'required|string|max:255',
        'title_en'       => 'required|string|max:255',
        'app_name'       => 'required|in:مريض,الأطباء,شركات الأدوية,مندوبين',
        'description_ar' => 'nullable|string',
        'description_en' => 'nullable|string',
    ];

    protected $messages = [
        'title_ar.required'    => 'العنوان بالعربية مطلوب',
        'title_ar.string'      => 'العنوان بالعربية يجب أن يكون نص',
        'title_ar.max'         => 'العنوان بالعربية يجب ألا يتجاوز 255 حرف',

        'title_en.required'    => 'العنوان بالإنجليزية مطلوب',
        'title_en.string'      => 'العنوان بالإنجليزية يجب أن يكون نص',
        'title_en.max'         => 'العنوان بالإنجليزية يجب ألا يتجاوز 255 حرف',

        'app_name.required'    => 'التطبيق مطلوب',
        'app_name.in'          => 'التطبيق يجب أن يكون أحد (مريض، الأطباء، شركات الأدوية، مندوبين)',

        'description_ar.string'=> 'الوصف بالعربية يجب أن يكون نص',
        'description_en.string'=> 'الوصف بالإنجليزية يجب أن يكون نص',
    ];

    public function save()
    {
        $validated = $this->validate();

        setting::create([
            'title_ar'       => $this->title_ar,
            'title_en'       => $this->title_en,
            'app_name'       => $this->app_name,
            'description_ar' => $this->description_ar,
            'description_en' => $this->description_en,
        ]);

        session()->flash('success', 'تم إنشاء الإعداد بنجاح');

        return redirect()->route('settings.manage');
    }

    public function render()
    {
        return view('livewire.settings.create');
    }
}
