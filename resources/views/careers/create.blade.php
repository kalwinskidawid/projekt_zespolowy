<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>{{ __('translations.headers.careers')  }}</h1>

        <div class="card">
            <div class="card-body">

                <h5 class="card-title">
                    {{ (isset( $career )) ? __('translations.labels.edit') : __('translations.labels.create') }}
                </h5>

                <form id="category-form" method="POST"
                      @if( isset( $isEdit ) && $isEdit == true )
                      action="{{ route('careers.update', $career) }}"
                      @else
                      action="{{ route('careers.store') }}"
                    @endif
                >
                    @csrf

                    @if( isset( $isEdit ) && $isEdit == true )
                        @method('PATCH')
                    @endif

                    <div class="row mb-3">
                        <label for="category-name" class="col-sm-2 col-form-label">{{ __('translations.attributes.main.start_date') }}:</label>
                        <div class="col-sm-10">
                            <input type="text" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="category-start_date"
                                   @if( isset($career) )
                                   value="{{ $career->start_date }}"
                                   @else
                                   value="{{ old('start_date') }}"
                                @endif
                            >

                            @error('start_date')
                            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <div class="btn-group" role="group" aria-label="Cancel or submit form">
                            <a href="{{ route('languages.index') }}" type="submit" class="btn btn-secondary"> {{ __('translations.buttons.cancel') }} </a>

                            <button type="submit" class="btn btn-primary">
                                @if( isset($language) )
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
