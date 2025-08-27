<div>
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('splashscreen.title') }}</h5>
            <button wire:click="resetFields" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#splashModal">
                {{ __('splashscreen.add_new') }}
            </button>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>{{ __('splashscreen.image') }}</th>
                        <th>{{ __('splashscreen.title_ar') }}</th>
                        <th>{{ __('splashscreen.title_en') }}</th>
                        <th>{{ __('splashscreen.description_ar') }}</th>
                        <th>{{ __('splashscreen.description_en') }}</th>
                        <th>{{ __('splashscreen.app_type') }}</th>
                        <th>{{ __('splashscreen.status') }}</th>
                        <th>{{ __('splashscreen.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($splashscreens as $splash)
                        <tr>
                            <td>
                                @if($splash->image)
                                    <img src="{{ asset('/'.$splash->image) }}" width="60">
                                @endif
                            </td>
                            <td>{{ $splash->getTranslation('title','ar') }}</td>
                            <td>{{ $splash->getTranslation('title','en') }}</td>
                            <td>{{ $splash->getTranslation('description','ar') }}</td>
                            <td>{{ $splash->getTranslation('description','en') }}</td>
                            <td>{{ $splash->app_type }}</td>
                            <td>
                                <span class="badge bg-{{ $splash->status == 'active' ? 'success' : 'secondary' }}">
                                    {{ __('splashscreen.'.$splash->status) }}
                                </span>
                            </td>
                            <td>
                                <button wire:click="edit({{ $splash->id }})" data-bs-toggle="modal" data-bs-target="#splashModal" class="btn btn-warning btn-sm">
                                    {{ __('splashscreen.edit') }}
                                </button>
                                <button wire:click="delete({{ $splash->id }})" class="btn btn-danger btn-sm">
                                    {{ __('splashscreen.delete') }}
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">{{ __('splashscreen.no_data') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $splashscreens->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="splashModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form wire:submit.prevent="save" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $splash_id ? __('splashscreen.edit') : __('splashscreen.add_new') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>{{ __('splashscreen.title_ar') }}</label>
                            <input type="text" wire:model="title_ar" class="form-control">
                            @error('title_ar') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('splashscreen.title_en') }}</label>
                            <input type="text" wire:model="title_en" class="form-control">
                            @error('title_en') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('splashscreen.description_ar') }}</label>
                            <textarea wire:model="description_ar" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('splashscreen.description_en') }}</label>
                            <textarea wire:model="description_en" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('splashscreen.app_type') }}</label>
                            <select wire:model="app_type" class="form-select">
                                <option value="">{{ __('splashscreen.choose') }}</option>
                                <option value="delegate">{{ __('splashscreen.delegate') }}</option>
                                <option value="patient">{{ __('splashscreen.patient') }}</option>
                                <option value="doctor">{{ __('splashscreen.doctor') }}</option>
                                <option value="pharma_company">{{ __('splashscreen.pharma_company') }}</option>
                            </select>
                            @error('app_type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('splashscreen.status') }}</label>
                            <select wire:model="status" class="form-select">
                                <option value="active">{{ __('splashscreen.active') }}</option>
                                <option value="inactive">{{ __('splashscreen.inactive') }}</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>{{ __('splashscreen.image') }}</label>
                            <input type="file" wire:model="new_image" class="form-control">
                            @if($image)
                                <img src="{{ asset('/'.$image) }}" class="mt-2" width="80">
                            @endif
                            @error('new_image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('splashscreen.cancel') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('splashscreen.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
