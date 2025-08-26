<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="mdi mdi-cog-outline text-primary me-2"></i>
            قائمة الإعدادات
        </h4>
        <a href="{{ route('settings.create') }}" class="btn btn-primary">
            <i class="mdi mdi-plus-circle-outline"></i> إنشاء جديد
        </a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="mdi mdi-check-circle-outline me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
        </div>
    @endif

    <div class="card shadow-sm rounded-3">
        <div class="card-header fw-bold bg-primary text-white">
            <i class="mdi mdi-format-list-bulleted"></i> جميع الإعدادات
        </div>
        <div class="card-body p-0">
            <table class="table table-hover table-bordered mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>اللغة</th>
                        <th>العنوان</th>
                        <th>التطبيق</th>
                        <th>الوصف</th>
                        <th class="text-center">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($settings as $index => $setting)
                        <tr>
                            <td>{{ $settings->firstItem() + $index }}</td>
                            <td><span class="badge bg-info">{{ $setting->lang }}</span></td>
                            <td>{{ $setting->title }}</td>
                            <td>{{ $setting->app_name }}</td>
                            <td>{{ $setting->description }}</td>
                            <td class="text-center">
                                <a href="{{ route('settings.edit', $setting->id) }}" 
                                   class="btn btn-sm btn-warning me-1">
                                    <i class="mdi mdi-pencil"></i> تعديل
                                </a>
                                <button wire:click="delete({{ $setting->id }})"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                    <i class="mdi mdi-delete"></i> حذف
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted">لا توجد بيانات</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $settings->links() }}
        </div>
    </div>
</div>
