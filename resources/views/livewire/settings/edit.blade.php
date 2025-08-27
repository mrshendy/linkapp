<div class="container py-4">

    <!-- عنوان الصفحة -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="mdi mdi-cog-outline text-warning me-2"></i>
            تعديل الإعداد
        </h4>
        <a href="{{ route('settings.manage') }}" class="btn btn-outline-secondary btn-sm">
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
                    <label class="form-label fw-semibold">العنوان (AR)</label>
                    <input type="text" wire:model="title_ar" class="form-control" placeholder="أدخل العنوان بالعربية">
                    @error('title_ar') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">العنوان (EN)</label>
                    <input type="text" wire:model="title_en" class="form-control" placeholder="Enter title in English">
                    @error('title_en') <span class="text-danger small">{{ $message }}</span>@enderror
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

                <div class="col-md-6">
                    <label class="form-label fw-semibold">الحالة</label>
                    <select wire:model="status" class="form-select">
                        <option value="نشط">نشط</option>
                        <option value="غير نشط">غير نشط</option>
                    </select>
                    @error('status') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">الوصف (AR)</label>
                    <textarea wire:model="description_ar" class="form-control" rows="3" placeholder="أدخل الوصف بالعربية"></textarea>
                    @error('description_ar') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">الوصف (EN)</label>
                    <textarea wire:model="description_en" class="form-control" rows="3" placeholder="Enter description in English"></textarea>
                    @error('description_en') <span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-warning px-4">
                        <i class="mdi mdi-content-save"></i> تحديث
                    </button>
                    <a href="{{ route('settings.manage') }}" class="btn btn-outline-secondary px-3">
                        <i class="mdi mdi-close"></i> إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
