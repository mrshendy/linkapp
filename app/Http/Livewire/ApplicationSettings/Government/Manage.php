<?php

namespace App\Http\Livewire\ApplicationSettings\Government;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\general\government;
use App\Models\general\countries;

class Manage extends Component
{
    use WithPagination;

    public $id_country, $name, $notes, $user_add;
    public $government_id;
    public $updateMode = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'id_country' => 'required|exists:countries,id',
        'name'       => 'required|string|max:255',
        'notes'      => 'nullable|string',
        'user_add'   => 'required|string|max:30',
    ];

    public function resetInputFields()
    {
        $this->id_country = '';
        $this->name = '';
        $this->notes = '';
        $this->user_add = '';
        $this->government_id = null;
    }

    public function store()
    {
        $this->validate();

        government::create([
            'id_country' => $this->id_country,
            'name'       => $this->name,
            'notes'      => $this->notes,
            'user_add'   => $this->user_add,
        ]);

        session()->flash('success', 'تمت الإضافة بنجاح');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $record = government::findOrFail($id);
        $this->government_id = $id;
        $this->id_country    = $record->id_country;
        $this->name          = $record->name;
        $this->notes         = $record->notes;
        $this->user_add      = $record->user_add;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->government_id) {
            $record = government::find($this->government_id);
            $record->update([
                'id_country' => $this->id_country,
                'name'       => $this->name,
                'notes'      => $this->notes,
                'user_add'   => $this->user_add,
            ]);

            $this->updateMode = false;
            session()->flash('success', 'تم التعديل بنجاح');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        government::find($id)->delete();
        session()->flash('success', 'تم الحذف بنجاح');
    }

    public function render()
    {
        return view('livewire.application-settings.government.manage', [
            'records'   => government::with('country')->paginate(10),
            'countries' => countries::all(),
        ]);
    }
}
