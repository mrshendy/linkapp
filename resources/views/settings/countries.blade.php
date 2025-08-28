@extends('layouts.master')

@section('title', 'إدارة الدول')

@section('content')
<div class="card">
        <div class="card-body">
    @livewire('application-settings.countries.manage')
 </div>
    </div>
@endsection
