<?php

namespace App\Http\Livewire\ApplicationSettings\Area;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\general\area;
use App\Models\general\countries;
use App\Models\general\government;
use App\Models\general\city;

class Manage extends Component
{
    use WithPagination;

    public $id_country, $id_government, $id_city, $name, $notes, $user_add;
    public $area_id;
    public $updateMode = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'id_country'   => 'required|exists:countries,id',
        'id_government'=> 'required|exists:government,id',
        'id_city'      => 'required|exists:city,id',
        'name'         => 'required|string|max:255',
        'notes'        => 'nullable|string',
        'user_add'     => 'required|string|max:30',
    ];

    public function resetInputFields()
    {
        $this->id_country = '';
        $this->id_government = '';
        $this->id_city = '';
        $this->name = '';
        $this->notes = '';
        $this->user_add = '';
        $this->area_id = null;
    }

    public function store()
    {
        $this->validate();

        area::create([
            'id_country'    => $this->id_country,
            'id_government' => $this->id_government,
            'id_city'       => $this->id_city,
            'name'          => $this->name,
            'notes'         => $this->notes,
            'user_add'      => $this->user_add,
        ]);

        session()->flash('success', 'تمت إضافة المنطقة بنجاح');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $record = area::findOrFail($id);
        $this->area_id      = $id;
        $this->id_country   = $record->id_country;
        $this->id_government= $record->id_government;
        $this->id_city      = $record->id_city;
        $this->name         = $record->name;
        $this->notes        = $record->notes;
        $this->user_add     = $record->user_add;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->area_id) {
            $record = area::find($this->area_id);
            $record->update([
                'id_country'    => $this->id_country,
                'id_government' => $this->id_government,
                'id_city'       => $this->id_city,
                'name'          => $this->name,
                'notes'         => $this->notes,
                'user_add'      => $this->user_add,
            ]);

            $this->updateMode = false;
            session()->flash('success', 'تم تعديل المنطقة بنجاح');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        area::find($id)->delete();
        session()->flash('success', 'تم حذف المنطقة بنجاح');
    }

    public function render()
    {
        return view('livewire.application-settings.area.manage', [
            'records'     => area::with(['country','government','city'])->paginate(10),
            'countries'   => countries::all(),
            'governments' => government::all(),
            'cities'      => city::all(),
        ]);
    }
}
