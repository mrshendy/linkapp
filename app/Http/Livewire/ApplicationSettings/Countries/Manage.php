<?php

namespace App\Http\Livewire\ApplicationSettings\Countries;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\General\countries;

class Manage extends Component
{
    use WithPagination;

    public $name, $notes, $user_add;
    public $country_id;
    public $updateMode = false;
    public $showForm = false; // 👈 تمت إضافة هذا المتغير

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
        $this->country_id = null;
        $this->updateMode = false;
        $this->showForm = false; // 👈 نخفي الفورم بعد الإلغاء أو الحفظ
    }

    public function store()
    {
        $this->validate();

        countries::create([
            'name'     => $this->name,
            'notes'    => $this->notes,
            'user_add' => $this->user_add,
        ]);

        session()->flash('success', 'تمت الإضافة بنجاح');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $record = countries::findOrFail($id);
        $this->country_id = $id;
        $this->name = $record->name;
        $this->notes = $record->notes;
        $this->user_add = $record->user_add;

        $this->updateMode = true;
        $this->showForm = true; // 👈 إظهار الفورم عند التعديل
    }

    public function update()
    {
        $this->validate();

        if ($this->country_id) {
            $record = countries::find($this->country_id);
            $record->update([
                'name'     => $this->name,
                'notes'    => $this->notes,
                'user_add' => $this->user_add,
            ]);

            $this->updateMode = false;
            session()->flash('success', 'تم التعديل بنجاح');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        countries::find($id)->delete();
        session()->flash('success', 'تم الحذف بنجاح');
    }

    public function render()
    {
        return view('livewire.application-settings.countries.manage', [
            'records' => countries::paginate(10),
        ]);
    }
}
