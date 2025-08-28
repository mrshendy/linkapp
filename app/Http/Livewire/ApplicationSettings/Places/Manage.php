<?php

namespace App\Http\Livewire\ApplicationSettings\Places;

use Livewire\Component;

class Manage extends Component
{
    public function render()
    {
        // هنا خليت المسار يطابق المجلد application-settings
        return view('livewire.application-settings.places.manage')
            ->extends('layouts.master')
            ->section('content');
    }
}
