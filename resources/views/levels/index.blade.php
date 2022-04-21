<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/levels.css')  }}">
    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('js/levels.js')  }}"></script>
    </x-slot>

    <div class="container">
        <h1>{{ __('translations.headers.levels')  }}</h1>

        <div class="d-flex flex-row-reverse mb-4">
            <a href=" {{ route('levels.create') }} " type="button" class="btn btn-primary" role="button">
                {{ __('translations.labels.create') }}
            </a>
        </div>

        <div class="table-container table-responsive">

            <table class="table table-striped">

                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('translations.attributes.main.name') }}</th>
                    <th>{{ __('translations.attributes.main.created_at') }}</th>
                    <th>{{ __('translations.attributes.main.updated_at') }}</th>
                    <th>{{ __('translations.attributes.main.deleted_at') }}</th>
                    <th class="always-visible"></th>
                </tr>
                </thead>

                <tbody>
                @foreach($levels as $level)
                    <tr>
                        <td>{{ $level->id }}</td>
                        <td>{{ $level->name }}</td>
                        <td>{{ $level->created_at }}</td>
                        <td>{{ $level->updated_at }}</td>
                        <td>{{ $level->deleted_at }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="action buttons">

                                <x-datatables.action-link class="btn btn-primary"
                                                          url="{{ route('levels.edit', $level) }}" {{-- atrybut url przekazywany do komponentu --}}
                                                          title="{{ __('translations.labels.edit') }}">
                                    <i class="bi-pencil"></i>
                                    </x-action-link>

                                    @if( $level->deleted_at == null )
                                        <x-datatables.confirm
                                            :action="route('levels.destroy', $level)" method="DELETE"
                                            :confirm-text="__('translations.buttons.yes')" confirm-class="btn btn-danger me-2"
                                            :cancel-text="__('translations.buttons.no')" cancel-class="btn btn-secondary ms-2"
                                            icon="question"
                                            :message="__('translations.categories.labels.destroy-question', ['name' => $level->name] )"
                                            button-class="btn btn-danger" :button-title="__('translations.labels.destroy')">
                                            <i class="bi bi-trash"></i>
                                            </x-confirm>
                                            @else
                                                <x-datatables.confirm
                                                    :action="route('levels.restore', $level)" method="PUT"
                                                    :confirm-text="__('translations.buttons.yes')" confirm-class="btn btn-success me-2"
                                                    :cancel-text="__('translations.buttons.no')" cancel-class="btn btn-secondary ms-2"
                                                    icon="question"
                                                    :message="__('translations.categories.labels.restore-question', ['name' => $level->name] )"
                                                    button-class="btn btn-success" :button-title="__('translations.categories.labels.restore')">
                                                    <i class="bi bi-trash"></i>
                                                    </x-confirm>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

</x-app-layout>
