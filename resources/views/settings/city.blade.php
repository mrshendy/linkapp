@extends('layouts.master')

@section('title', 'إدارة المدن')

@section('content')
<div class="card">
        <div class="card-body">
    @livewire('application-settings.city.manage')
 </div>
    </div>
@endsection
