<x-app-layout>

    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/technologies.css')  }}">
    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('js/technologies.js') }}"></script>


    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>{{ __('translations.headers.employeeadverts')  }}</h1>

        <div class="card">
            <div class="card-body">

                <h5 class="card-title">
                    {{ (isset( $technology )) ? __('translations.labels.edit') : __('translations.labels.create') }}
                </h5>

                <form id="category-form" method="POST"
                      @if( isset( $isEdit ) && $isEdit == true )
                      action="{{ route('employeeadverts.update', $technology) }}"
                      @else
                      action="{{ route('employeeadverts.store') }}"
                    @endif
                >
                    @csrf

                    @if( isset( $isEdit ) && $isEdit == true )
                        @method('PATCH')
                    @endif

                    <div class="row mb-3">
                        <input class="d-none" name="profile_id" value="{{$profil->id}}">
                        <label for="category-name" class="col-sm-2 col-form-label">{{ __('translations.employeeadverts.attributes.technology') }}:</label>
                        <div class="col-sm-10">
                            <select type="text" name="technology_id" class="form-control @error('technology') is-invalid @enderror" id="category-name"
                                   @if( isset($employeeadvert) )
                                       value="{{ $employeeadvert->technology->id }}"
                                @endif
                            >
                                @foreach($technology as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                            @error('name')
                            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">

                        <label for="category-name" class="col-sm-2 col-form-label">{{ __('translations.employeeadverts.attributes.contracttype') }}:</label>
                        <div class="col-sm-10">
                            <select type="text" name="contracttype_id" class="form-control @error('contracttype') is-invalid @enderror" id="category-name"
                                    @if( isset($employeeadvert) )
                                        value="{{ $employeeadvert->contracttype->id }}"
                                @endif
                            >
                                @foreach($contracttype as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                            @error('name')
                            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">

                        <label for="category-name" class="col-sm-2 col-form-label">{{ __('translations.employeeadverts.attributes.location') }}:</label>
                        <div class="col-sm-10">
                            <input type="text" name="location" class="form-control @error('description') is-invalid @enderror" id="category-name"
                                   @if( isset($employeeadvert) )
                                   value="{{ $employeeadvert->location }}"
                                   @else
                                   value="{{ old('name') }}"
                                @endif
                            >

                            @error('name')
                            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">

                        <label for="category-name" class="col-sm-2 col-form-label">{{ __('translations.employeeadverts.attributes.salary') }}:</label>
                        <div class="col-sm-10">
                            <input type="text" name="salary_start" class="form-control @error('salary_start') is-invalid @enderror" id="category-name"
                                   @if( isset($employeeadvert) )
                                       value="{{ $employeeadvert->salary_start }}"
                                   @else
                                       value="{{ old('name') }}"
                                @endif
                            >

                            @error('name')
                            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">

                        <label for="category-name" class="col-sm-2 col-form-label">{{ __('translations.employeeadverts.attributes.description') }}:</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="category-name"
                                   @if( isset($employeeadvert) )
                                       value="{{ $employeeadvert->description }}"
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
                            <a href="{{ route('employeeadverts.index') }}" type="submit" class="btn btn-secondary"> {{ __('translations.buttons.cancel') }} </a>

                            <button type="submit" class="btn btn-primary">
                                @if( isset($employeeadvert))
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
