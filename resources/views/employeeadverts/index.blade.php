<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/technologies.css')  }}">
    </x-slot>

    <div class="container">
        <h1>{{ __('translations.headers.employeeadverts')  }}</h1>

        <div class="d-flex flex-row-reverse mb-4">
            <a href=" {{ route('employeeadverts.create') }} " type="button" class="btn btn-primary" role="button">
                {{ __('translations.labels.create') }}
            </a>
        </div>

        <div class="table-container table-responsive">

            <table class="table table-striped">

                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('translations.employeeadverts.attributes.technology') }}</th>
                    <th>{{ __('translations.employeeadverts.attributes.contracttype') }}</th>
                    <th>{{ __('translations.employeeadverts.attributes.salary') }}</th>
                    <th>{{ __('translations.employeeadverts.attributes.location') }}</th>
                    <th>{{ __('translations.employeeadverts.attributes.description') }}</th>
                    @if(Auth::user()->hasRole('admin'))
                    <th></th>
                    @endif
                </tr>
                </thead>

                <tbody>
                    @foreach($employeeadverts as $employeeadvert)
                        <tr>
                            <td>{{ $employeeadvert->id }}</td>
                            <td>{{ $employeeadvert->technology->name }}</td>
                            <td>{{ $employeeadvert->contracttype->name }}</td>
                            <td>{{ $employeeadvert->salary_start }}</td>
                            <td>{{ $employeeadvert->location }}</td>
                            <td>{{ $employeeadvert->description }}</td>
                            @if(Auth::user()->hasRole('admin'))
                            <td>
                                <x-datatables.action-link class="btn btn-primary"
                                                          title="{{ __('translations.buttons.update') }}">
                                    <i class="bi bi-pencil-square"></i>
                                    </x-action-link>
                                    <x-datatables.confirm
                                        :action="route('employeeadverts.delete',$employeeadvert->id)" method="DELETE"
                                        :confirm-text="__('translations.buttons.yes')" confirm-class="btn btn-danger me-2"
                                        :cancel-text="__('translations.buttons.no')" cancel-class="btn btn-secondary ms-2"
                                        icon="question"
                                        :message="__('translations.questions.delete', ['name' => $employeeadvert->id] )"
                                        button-class="btn btn-danger" :button-title="__('translations.labels.delete')">
                                        <i class="bi bi-trash"></i>
                                        </x-confirm>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</x-app-layout>
