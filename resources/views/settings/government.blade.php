@extends('layouts.master')

@section('title', 'إدارة الحكومات')

@section('content')
<div class="card">
        <div class="card-body">
    @livewire('application-settings.government.manage')
 </div>
    </div>
@endsection
