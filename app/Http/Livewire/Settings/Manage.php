<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\setting;

class Manage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $setting = setting::find($id);
        if ($setting) {
            $setting->delete();
            session()->flash('success', 'تم حذف الإعداد بنجاح');
        }
    }

    public function render()
    {
        return view('livewire.settings.manage', [
            'settings' => setting::latest()->paginate(10),
        ]);
    }
}
