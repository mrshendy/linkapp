<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\setting;

class Manage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    /**
     * حذف إعداد
     */
    public function delete($id)
    {
        $setting = setting::find($id);

        if ($setting) {
            $setting->delete();
            session()->flash('success', 'تم حذف الإعداد بنجاح');
        } else {
            session()->flash('error', 'الإعداد غير موجود');
        }
    }

    /**
     * عرض الجدول
     */
    public function render()
    {
        return view('livewire.settings.manage', [
            'settings' => setting::orderBy('id', 'desc')->paginate(10),
        ]);
    }
}
