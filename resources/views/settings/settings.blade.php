@extends('layouts.master')
@section('title')
    {{ trans('main_trans.title') }}
@stop

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font fw-bold text-primary">
                <i class="mdi mdi-cog-outline me-2"></i> {{ trans('settings_trans.settings') }}
            </h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ trans('settings_trans.settings') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('settings_trans.system_settings') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row g-4">

    <!-- Nationalities -->
    <div class="col-xxl-4 col-lg-6">
        <div class="card text-center shadow-sm border-0 h-100 setting-card">
            <div class="icon-box mx-auto mb-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-light shadow-sm"
                     style="width:90px; height:90px;">
                    <i class="mdi mdi-earth " style="font-size:40px;color: #543cff !important;"></i>
                </div>
            </div>
            <h5 class="card-title fw-bold mb-2">{{ trans('settings_trans.nationalities_settings') }}</h5>
            <a href="{{ route('nationalities.index') }}" 
               class="btn btn-primary rounded-pill px-4">
                <i class="mdi mdi-arrow-left-circle-outline ms-1"></i>
                {{ trans('settings_trans.Go_to_settings_now') }}
            </a>
        </div>
    </div>




    <!-- Places -->
<div class="col-xxl-4 col-lg-6">
    <div class="card text-center shadow-sm border-0 h-100 setting-card">
        <div class="icon-box mx-auto mb-3">
            <div class="rounded-circle d-flex align-items-center justify-content-center bg-light shadow-sm"
                 style="width:90px; height:90px;">
                <i class="mdi mdi-map-marker-multiple text-info" style="font-size:40px;"></i>
            </div>
        </div>
        <h5 class="card-title fw-bold mb-2">
            {{ trans('settings_trans.Place_settings') }}
        </h5>
        <a href="{{ route('places.settings') }}" 
           class="btn btn-primary rounded-pill px-4">
            <i class="mdi mdi-arrow-left-circle-outline ms-1"></i>
            {{ trans('settings_trans.Go_to_settings_now') }}
        </a>
    </div>
</div>




    <!-- General Settings -->
    <div class="col-xxl-4 col-lg-6">
        <div class="card text-center shadow-sm border-0 h-100 setting-card">
            <div class="icon-box mx-auto mb-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-light shadow-sm"
                     style="width:90px; height:90px;">
                    <i class="mdi mdi-cog text-secondary" style="font-size:40px;"></i>
                </div>
            </div>
            <h5 class="card-title fw-bold mb-2">{{ trans('settings_trans.general_settings') }}</h5>
            <a href="javascript:void(0);" 
               class="btn btn-primary rounded-pill px-4">
                <i class="mdi mdi-arrow-left-circle-outline ms-1"></i>
                {{ trans('settings_trans.Go_to_settings_now') }}
            </a>
        </div>
    </div>

    <!-- Splashscreen -->
    <div class="col-xxl-4 col-lg-6">
        <div class="card text-center shadow-sm border-0 h-100 setting-card">
            <div class="icon-box mx-auto mb-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-light shadow-sm"
                     style="width:90px; height:90px;">
                    <i class="mdi mdi-cellphone-information text-success" style="font-size:40px;"></i>
                </div>
            </div>
            <h5 class="card-title fw-bold mb-2">{{ trans('settings_trans.splashscreen_settings') }}</h5>
            <a href="{{ route('settings.splashscreen') }}" 
               class="btn btn-primary rounded-pill px-4">
                <i class="mdi mdi-arrow-left-circle-outline ms-1"></i>
                {{ trans('settings_trans.Go_to_settings_now') }}
            </a>
        </div>
    </div>


     <!-- specialty -->
    <div class="col-xxl-4 col-lg-6">
        <div class="card text-center shadow-sm border-0 h-100 setting-card">
            <div class="icon-box mx-auto mb-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-light shadow-sm"
                     style="width:90px; height:90px;">
                    <i class="mdi mdi-cellphone-information text-success" style="font-size:40px;"></i>
                </div>
            </div>
            <h5 class="card-title fw-bold mb-2">{{ trans('settings_trans.plural') }}</h5>
            <a href="{{ route('specialties.index') }}" 
               class="btn btn-primary rounded-pill px-4">
                <i class="mdi mdi-arrow-left-circle-outline ms-1"></i>
                {{ trans('settings_trans.Go_to_settings_now') }}
            </a>
        </div>
    </div>


</div>

{{-- CSS --}}
<style>
.setting-card {
    transition: all 0.3s ease-in-out;
    padding: 30px;
}
.setting-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}
.setting-card:hover i {
    transform: scale(1.2);
    transition: 0.3s;
}
a{margin: 19px;}
</style>

@endsection
