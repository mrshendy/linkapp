<div>
    <h4 class="mb-3">إدارة المناطق</h4>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="mb-3">
            <label>الدولة</label>
            <select class="form-control" wire:model="id_country">
                <option value="">-- اختر الدولة --</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            @error('id_country') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label>المحافظة</label>
            <select class="form-control" wire:model="id_government">
                <option value="">-- اختر المحافظة --</option>
                @foreach($governments as $gov)
                    <option value="{{ $gov->id }}">{{ $gov->name }}</option>
                @endforeach
            </select>
            @error('id_government') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label>المدينة</label>
            <select class="form-control" wire:model="id_city">
                <option value="">-- اختر المدينة --</option>
                @foreach($cities as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
            @error('id_city') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label>الاسم</label>
            <input type="text" class="form-control" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label>ملاحظات</label>
            <textarea class="form-control" wire:model="notes"></textarea>
        </div>

        <div class="mb-3">
            <label>المستخدم</label>
            <input type="text" class="form-control" wire:model="user_add">
            @error('user_add') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $updateMode ? 'تحديث' : 'إضافة' }}
        </button>
    </form>

    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>الدولة</th>
                <th>المحافظة</th>
                <th>المدينة</th>
                <th>الاسم</th>
                <th>ملاحظات</th>
                <th>المستخدم</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->country->name ?? '-' }}</td>
                    <td>{{ $record->government->name ?? '-' }}</td>
                    <td>{{ $record->city->name ?? '-' }}</td>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->notes }}</td>
                    <td>{{ $record->user_add }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $record->id }})">تعديل</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $record->id }})">حذف</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $records->links() }}
</div>
