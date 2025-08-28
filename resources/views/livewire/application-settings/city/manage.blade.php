<div>
    <h4 class="mb-3">{{ __('settings_trans.manage_cities') }}</h4>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="mb-3">
            <label>{{ __('settings_trans.country') }}</label>
            <select class="form-control" wire:model="id_country">
                <option value="">{{ __('settings_trans.choose_country') }}</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            @error('id_country') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label>{{ __('settings_trans.governorate') }}</label>
            <select class="form-control" wire:model="id_government">
                <option value="">{{ __('settings_trans.choose_governorate') }}</option>
                @foreach($governments as $gov)
                    <option value="{{ $gov->id }}">{{ $gov->name }}</option>
                @endforeach
            </select>
            @error('id_government') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label>{{ __('settings_trans.name') }}</label>
            <input type="text" class="form-control" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label>{{ __('settings_trans.notes') }}</label>
            <textarea class="form-control" wire:model="notes"></textarea>
        </div>

        <div class="mb-3">
            <label>{{ __('settings_trans.user') }}</label>
            <input type="text" class="form-control" wire:model="user_add">
            @error('user_add') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $updateMode ? __('settings_trans.update') : __('settings_trans.add') }}
        </button>
    </form>

    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('settings_trans.country') }}</th>
                <th>{{ __('settings_trans.governorate') }}</th>
                <th>{{ __('settings_trans.name') }}</th>
                <th>{{ __('settings_trans.notes') }}</th>
                <th>{{ __('settings_trans.user') }}</th>
                <th>{{ __('settings_trans.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->country->name ?? '-' }}</td>
                    <td>{{ $record->government->name ?? '-' }}</td>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->notes }}</td>
                    <td>{{ $record->user_add }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $record->id }})">
                            {{ __('settings_trans.edit') }}
                        </button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $record->id }})">
                            {{ __('settings_trans.delete') }}
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $records->links() }}
</div>
