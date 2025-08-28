<div>
    <h4 class="mb-3">إدارة الدول</h4>

    {{-- رسائل النجاح --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- زر إنشاء جديد --}}
    <div class="d-flex justify-content-end mb-3">
        @if(!$updateMode && !$showForm)
            <button class="btn btn-success" wire:click="$set('showForm', true)">
                <i class="mdi mdi-plus-circle-outline"></i> إنشاء جديد
            </button>
        @endif
    </div>

    {{-- نموذج الإضافة / التعديل --}}
    @if($updateMode || $showForm)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
                    <div class="mb-3">
                        <label class="form-label">اسم الدولة</label>
                        <input type="text" class="form-control" wire:model="name" placeholder="ادخل اسم الدولة">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ملاحظات</label>
                        <textarea class="form-control" wire:model="notes" placeholder="ملاحظات إضافية"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">المستخدم</label>
                        <input type="text" class="form-control" wire:model="user_add" placeholder="اسم المستخدم">
                        @error('user_add') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="mdi {{ $updateMode ? 'mdi-content-save-edit' : 'mdi-plus-circle-outline' }}"></i>
                        {{ $updateMode ? 'تحديث' : 'إضافة' }}
                    </button>

                    <button type="button" wire:click="resetInput" class="btn btn-secondary ms-2">
                        إلغاء
                    </button>
                </form>
            </div>
        </div>
    @endif

    {{-- جدول عرض --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="mb-3">قائمة الدول</h5>
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>اسم الدولة</th>
                        <th>ملاحظات</th>
                        <th>المستخدم</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($records as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->notes }}</td>
                            <td>{{ $record->user_add }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning" wire:click="edit({{ $record->id }})">
                                    <i class="mdi mdi-pencil"></i> تعديل
                                </button>
                                <button class="btn btn-sm btn-danger" wire:click="delete({{ $record->id }})"
                                        onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                    <i class="mdi mdi-delete"></i> حذف
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">لا توجد بيانات</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $records->links() }}
            </div>
        </div>
    </div>
</div>
