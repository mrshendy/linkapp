@extends('layouts.master')

@section('title', 'إدارة التخصصات')

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- استدعاء Livewire component --}}
            @livewire('settings.specialties')
        </div>
    </div>
@endsection
