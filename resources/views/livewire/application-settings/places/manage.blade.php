<div>
    <div class="row g-4">
        
        <!-- Countries -->
        <div class="col-xxl-4 col-lg-6">
            <div class="card text-center shadow border-0 h-100 rounded-4 p-4 d-flex flex-column justify-content-between card-hover" style="min-height: 250px;">
                <div>
                    <div class="avatar-md mx-auto mb-3">
                        <div class="avatar-title bg-light border border-info p-3 text-info rounded-circle shadow-sm">
                            <i class="mdi mdi-flag text-info" style="font-size:40px;"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-3">{{ trans('settings_trans.countries') }}</h5>
                </div>
                <a href="{{ route('countries.index') }}" 
                   class="btn btn-info btn-lg rounded-pill px-5 mt-auto">
                    {{ trans('settings_trans.Go_to_settings_now') }}
                </a>
            </div>
        </div>

        <!-- Government -->
        <div class="col-xxl-4 col-lg-6">
            <div class="card text-center shadow border-0 h-100 rounded-4 p-4 d-flex flex-column justify-content-between card-hover" style="min-height: 250px;">
                <div>
                    <div class="avatar-md mx-auto mb-3">
                        <div class="avatar-title bg-light border border-info p-3 text-info rounded-circle shadow-sm">
                            <i class="mdi mdi-city text-info" style="font-size:40px;"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-3">{{ trans('settings_trans.governorate') }}</h5>
                </div>
                <a href="{{ route('government.index') }}" 
                   class="btn btn-info btn-lg rounded-pill px-5 mt-auto">
                    {{ trans('settings_trans.Go_to_settings_now') }}
                </a>
            </div>
        </div>

        <!-- City -->
        <div class="col-xxl-4 col-lg-6">
            <div class="card text-center shadow border-0 h-100 rounded-4 p-4 d-flex flex-column justify-content-between card-hover" style="min-height: 250px;">
                <div>
                    <div class="avatar-md mx-auto mb-3">
                        <div class="avatar-title bg-light border border-info p-3 text-info rounded-circle shadow-sm">
                            <i class="mdi mdi-home-city-outline text-info" style="font-size:40px;"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-3">{{ trans('settings_trans.city') }}</h5>
                </div>
                <a href="{{ route('city.index') }}" 
                   class="btn btn-info btn-lg rounded-pill px-5 mt-auto">
                    {{ trans('settings_trans.Go_to_settings_now') }}
                </a>
            </div>
        </div>

        <!-- Area -->
        <div class="col-xxl-4 col-lg-6">
            <div class="card text-center shadow border-0 h-100 rounded-4 p-4 d-flex flex-column justify-content-between card-hover" style="min-height: 250px;">
                <div>
                    <div class="avatar-md mx-auto mb-3">
                        <div class="avatar-title bg-light border border-info p-3 text-info rounded-circle shadow-sm">
                            <i class="mdi mdi-map text-info" style="font-size:40px;"></i>
                        </div>
                    </div>
                    <h5 class="card-title fw-bold mb-3">{{ trans('settings_trans.area') }}</h5>
                </div>
                <a href="{{ route('area.index') }}" 
                   class="btn btn-info btn-lg rounded-pill px-5 mt-auto">
                    {{ trans('settings_trans.Go_to_settings_now') }}
                </a>
            </div>
        </div>

    </div>
</div>

<style>
    /* حركة عند الوقوف */
    .card-hover {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .card-hover:hover {
        transform: translateY(-8px); /* الكارت يطلع لفوق بسيط */
        box-shadow: 0 8px 20px rgba(0,0,0,0.15); /* ظل أكبر */
    }
</style>
