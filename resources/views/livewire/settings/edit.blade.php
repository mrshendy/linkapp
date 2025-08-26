<div class="container py-4">

    <!-- عنوان الصفحة -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="mdi mdi-cog-outline text-warning me-2"></i>
            تعديل الإعداد
        </h4>
        <a href="{{ route('settings.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="mdi mdi-arrow-left"></i> رجوع
        </a>
    </div>

    <!-- التنبيهات -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="mdi mdi-check-circle-outline me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="mdi mdi-alert-circle-outline me-2"></i>
            حدثت بعض الأخطاء:
            <ul class="mb-0 mt-2 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
        </div>
    @endif

    <!-- كارد التعديل -->
    <div class="card shadow-sm rounded-3">
        <div class="card-header bg-warning text-white fw-bold">
            <i class="mdi mdi-pencil-outline me-1"></i> تعديل البيانات
        </div>
        <div class="card-body">
            <form wire:submit.prevent="update" class="row g-3">

                <div class="col-md-6">
                    <label class="form-label fw-semibold">اللغة</label>
                    <select wire:model="lang" class="form-select">
                        <option value="">اختر اللغة</option>
                        <option value="ar">العربية</option>
                        <option value="en">English</option>
                    </select>
                    @error('lang') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">العنوان</label>
                    <input type="text" wire:model="title" class="form-control" placeholder="أدخل العنوان">
                    @error('title') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">التطبيق</label>
                    <select wire:model="app_name" class="form-select">
                        <option value="">اختر التطبيق</option>
                        <option value="مريض">مريض</option>
                        <option value="الأطباء">الأطباء</option>
                        <option value="شركات الأدوية">شركات الأدوية</option>
                        <option value="مندوبين">مندوبين</option>
                    </select>
                    @error('app_name') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-semibold">الوصف</label>
                    <textarea wire:model="description" class="form-control" rows="3" placeholder="أدخل الوصف (اختياري)"></textarea>
                    @error('description') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-warning px-4">
                        <i class="mdi mdi-content-save"></i> تحديث
                    </button>
                    <a href="{{ route('settings.index') }}" class="btn btn-outline-secondary px-3">
                        <i class="mdi mdi-close"></i> إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
