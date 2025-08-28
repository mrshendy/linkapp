@extends('layouts.master')

@section('title', 'إدارة الأماكن')

@section('content')
<div class="card">
        <div class="card-body">
    @livewire('application-settings.places.manage')
 </div>
    </div>
@endsection
