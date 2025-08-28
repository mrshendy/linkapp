<?php

namespace App\Http\Livewire\ApplicationSettings\Nationalities_settings;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\general\nationalities_settings;

class Manage extends Component
{
    use WithPagination;

    public $name, $notes, $user_add;
    public $nationality_id;
    public $updateMode = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name'     => 'required|string|max:255',
        'notes'    => 'nullable|string',
        'user_add' => 'required|string|max:30',
    ];

    public function resetInputFields()
    {
        $this->name = '';
        $this->notes = '';
        $this->user_add = '';
        $this->nationality_id = null;
    }

    public function store()
    {
        $this->validate();

        nationalities_settings::create([
            'name'     => $this->name,
            'notes'    => $this->notes,
            'user_add' => $this->user_add,
        ]);

        session()->flash('success', 'تمت إضافة الجنسية بنجاح');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $record = nationalities_settings::findOrFail($id);
        $this->nationality_id = $id;
        $this->name           = $record->name;
        $this->notes          = $record->notes;
        $this->user_add       = $record->user_add;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->nationality_id) {
            $record = nationalities_settings::find($this->nationality_id);
            $record->update([
                'name'     => $this->name,
                'notes'    => $this->notes,
                'user_add' => $this->user_add,
            ]);

            $this->updateMode = false;
            session()->flash('success', 'تم تعديل الجنسية بنجاح');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        nationalities_settings::find($id)->delete();
        session()->flash('success', 'تم حذف الجنسية بنجاح');
    }

    public function render()
    {
        return view('livewire.application-settings.nationalities-settings.manage', [
            'records' => nationalities_settings::paginate(10),
        ]);
    }
}
