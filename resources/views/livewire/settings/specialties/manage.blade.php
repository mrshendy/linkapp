<div>
    <div class="d-flex justify-content-between mb-3">
        <h4>{{ __('specialties.plural') }}</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"> {{ __('specialties.add_new') }}</button>
    </div>

    {{-- عرض الرسائل --}}
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('specialties.image') }}</th>
            <th>{{ __('specialties.name_ar') }}</th>
            <th>{{ __('specialties.name_en') }}</th>
            <th>{{ __('specialties.status') }}</th>
            <th>{{ __('specialties.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($specialties as $specialty)
                <tr>
                    <td>
                        @if($specialty->image)
                            <img src="{{ asset('/attachments/'.$specialty->image) }}" width="80">
                        @endif
                    </td>
                    <td>{{ $specialty->name_ar }}</td>
                    <td>{{ $specialty->name_en }}</td>
                    <td>
                        <span class="badge bg-{{ $specialty->status == 'active' ? 'success' : 'secondary' }}">
                            {{ $specialty->status }}
                        </span>
                    </td>
                    <td>
    {{-- زر التعديل --}}
    <button wire:click="edit({{ $specialty->id }})"
            class="btn btn-warning btn-sm"
            data-bs-toggle="modal"
            data-bs-target="#editModal">
        {{ __('specialties.edit') }}
    </button>

    {{-- زر الحذف --}}
    <button wire:click="delete({{ $specialty->id }})"
            onclick="return confirm('هل أنت متأكد من الحذف؟')"
            class="btn btn-danger btn-sm">
        {{ __('specialties.delete') }}
    </button>
</td>

                </tr>
            @empty
                <tr><td colspan="5" class="text-center">لا يوجد تخصصات</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- Modal Create -->
    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <form wire:submit.prevent="save" class="modal-content">
                <div class="modal-header"><h5>إضافة تخصص جديد</h5></div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-2" wire:model="name_ar" placeholder="اسم التخصص (عربي)">
                    @error('name_ar') <span class="text-danger">{{ $message }}</span> @enderror

                    <input type="text" class="form-control mb-2" wire:model="name_en" placeholder="اسم التخصص (English)">
                    @error('name_en') <span class="text-danger">{{ $message }}</span> @enderror

                    <select class="form-control mb-2" wire:model="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror

                    <input type="file" class="form-control" wire:model="newImage">
                    @error('newImage') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-success">حفظ</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <form wire:submit.prevent="update" class="modal-content">
                <div class="modal-header"><h5>تعديل التخصص</h5></div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-2" wire:model="name_ar">
                    @error('name_ar') <span class="text-danger">{{ $message }}</span> @enderror

                    <input type="text" class="form-control mb-2" wire:model="name_en">
                    @error('name_en') <span class="text-danger">{{ $message }}</span> @enderror

                    <select class="form-control mb-2" wire:model="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror

                    <input type="file" class="form-control" wire:model="newImage">
                    @error('newImage') <span class="text-danger">{{ $message }}</span> @enderror

                    @if($image)
                        <img src="{{ asset('storage/'.$image) }}" width="80" class="mt-2">
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-success">تحديث</button>
                </div>
            </form>
        </div>
    </div>
</div>
