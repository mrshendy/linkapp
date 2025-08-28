@extends('layouts.master')

@section('title', 'إدارة المناطق')

@section('content')
<div class="card">
        <div class="card-body">
    @livewire('application-settings.area.manage')
 </div>
    </div>
@endsection
