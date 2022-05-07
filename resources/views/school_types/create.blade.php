<x-app-layout>

    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/school_types.css')  }}">
    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('js/school_types.js') }}"></script>

        {!!
            JsValidator::formRequest('App\Http\Requests\SchoolTypeRequest')
        !!}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>{{ __('translations.headers.school_types')  }}</h1>

        <div class="card">
            <div class="card-body">

                <h5 class="card-title">
                    {{ (isset( $school_type )) ? __('translations.labels.edit') : __('translations.labels.create') }}
                </h5>

                <form id="category-form" method="POST"
                      @if( isset( $isEdit ) && $isEdit == true )
                      action="{{ route('school_types.update', $school_type) }}"
                      @else
                      action="{{ route('school_types.store') }}"
                    @endif
                >
                    @csrf

                    @if( isset( $isEdit ) && $isEdit == true )
                        @method('PATCH')
                    @endif

                    <div class="row mb-3">

                        <label for="category-name" class="col-sm-2 col-form-label">{{ __('translations.attributes.main.name') }}:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="category-name"
                                   @if( isset($school_type) )
                                   value="{{ $school_type->name }}"
                                   @else
                                   value="{{ old('name') }}"
                                @endif
                            >

                            @error('name')
                            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <div class="btn-group" role="group" aria-label="Cancel or submit form">
                            <a href="{{ route('school_types.index') }}" type="submit" class="btn btn-secondary"> {{ __('translations.buttons.cancel') }} </a>

                            <button type="submit" class="btn btn-primary">
                                @if( isset($school_type))
                                    {{ __('translations.buttons.update') }}
                                @else
                                    {{ __('translations.buttons.store') }}
                                @endif
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

</x-app-layout>
