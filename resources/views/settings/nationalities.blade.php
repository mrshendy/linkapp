@extends('layouts.master')

@section('title', 'إدارة الجنسيات')

@section('content')
<div class="card">
        <div class="card-body">
    @livewire('application-settings.nationalities-settings.manage')
 </div>
    </div>
@endsection
