<div>
    <h4 class="mb-3">{{ __('settings_trans.manage_countries') }}</h4>

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
                <i class="mdi mdi-plus-circle-outline"></i> {{ __('settings_trans.create_new') }}
            </button>
        @endif
    </div>

    {{-- نموذج الإضافة / التعديل --}}
    @if($updateMode || $showForm)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
                    <div class="mb-3">
                        <label class="form-label">{{ __('settings_trans.country_name') }}</label>
                        <input type="text" class="form-control" wire:model="name" placeholder="{{ __('settings_trans.enter_country_name') }}">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('settings_trans.notes') }}</label>
                        <textarea class="form-control" wire:model="notes" placeholder="{{ __('settings_trans.add_notes') }}"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('settings_trans.user') }}</label>
                        <input type="text" class="form-control" wire:model="user_add" placeholder="{{ __('settings_trans.enter_user') }}">
                        @error('user_add') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="mdi {{ $updateMode ? 'mdi-content-save-edit' : 'mdi-plus-circle-outline' }}"></i>
                        {{ $updateMode ? __('settings_trans.update') : __('settings_trans.add') }}
                    </button>

                    <button type="button" wire:click="resetInput" class="btn btn-secondary ms-2">
                        {{ __('settings_trans.cancel') }}
                    </button>
                </form>
            </div>
        </div>
    @endif

    {{-- جدول عرض --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="mb-3">{{ __('settings_trans.countries_list') }}</h5>
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>{{ __('settings_trans.country_name') }}</th>
                        <th>{{ __('settings_trans.notes') }}</th>
                        <th>{{ __('settings_trans.user') }}</th>
                        <th class="text-center">{{ __('settings_trans.actions') }}</th>
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
                                    <i class="mdi mdi-pencil"></i> {{ __('settings_trans.edit') }}
                                </button>
                                <button class="btn btn-sm btn-danger" wire:click="delete({{ $record->id }})"
                                        onclick="return confirm('{{ __('settings_trans.confirm_delete') }}')">
                                    <i class="mdi mdi-delete"></i> {{ __('settings_trans.delete') }}
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">{{ __('settings_trans.no_data') }}</td>
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
