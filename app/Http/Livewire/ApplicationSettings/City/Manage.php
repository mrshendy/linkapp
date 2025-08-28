<?php

namespace App\Http\Livewire\ApplicationSettings\City;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\general\city;
use App\Models\general\countries;
use App\Models\general\government;

class Manage extends Component
{
    use WithPagination;

    public $id_country, $id_government, $name, $notes, $user_add;
    public $city_id;
    public $updateMode = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'id_country'   => 'required|exists:countries,id',
        'id_government'=> 'required|exists:government,id',
        'name'         => 'required|string|max:255',
        'notes'        => 'nullable|string',
        'user_add'     => 'required|string|max:30',
    ];

    public function resetInputFields()
    {
        $this->id_country = '';
        $this->id_government = '';
        $this->name = '';
        $this->notes = '';
        $this->user_add = '';
        $this->city_id = null;
    }

    public function store()
    {
        $this->validate();

        city::create([
            'id_country'    => $this->id_country,
            'id_government' => $this->id_government,
            'name'          => $this->name,
            'notes'         => $this->notes,
            'user_add'      => $this->user_add,
        ]);

        session()->flash('success', 'تمت إضافة المدينة بنجاح');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $record = city::findOrFail($id);
        $this->city_id      = $id;
        $this->id_country   = $record->id_country;
        $this->id_government= $record->id_government;
        $this->name         = $record->name;
        $this->notes        = $record->notes;
        $this->user_add     = $record->user_add;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->city_id) {
            $record = city::find($this->city_id);
            $record->update([
                'id_country'    => $this->id_country,
                'id_government' => $this->id_government,
                'name'          => $this->name,
                'notes'         => $this->notes,
                'user_add'      => $this->user_add,
            ]);

            $this->updateMode = false;
            session()->flash('success', 'تم تعديل المدينة بنجاح');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        city::find($id)->delete();
        session()->flash('success', 'تم حذف المدينة بنجاح');
    }

    public function render()
    {
        return view('livewire.application-settings.city.manage', [
            'records'     => city::with(['country','government'])->paginate(10),
            'countries'   => countries::all(),
            'governments' => government::all(),
        ]);
    }
}
