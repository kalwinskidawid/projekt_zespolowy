<x-app-layout>

    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/employeeadverts.css') }}">
    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('js/employeeadverts.js') }}"></script>
        <script>
            $('textarea').val($('textarea').val().trim());
        </script>
    </x-slot>

    <div class="container">
        <h1> {{ __('translations.headers.employeeadverts') }} </h1>

        <div class="card">
            <div class="card-body">

                <h5 class="card-title">
                    {{ (isset( $employeeadvert )) ?  __('translations.labels.edit') : __('translations.labels.create') }}
                </h5>

                <form id="employeeadvert-form" method="POST"
                      @if( isset( $isEdit ) && $isEdit == true )
                      action="{{ route('employeeadverts.update', $employeeadvert) }}"
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
                        <label for="technology_id" class="col-sm-2 col-form-label">{{ __('translations.employeeadverts.attributes.technology') }}:</label>
                        <div class="col-sm-10">
                            <select type="text" name="technology_id" class="form-control @error('technology_id') is-invalid @enderror" id="technology_id-name"
                                    @if( isset($employeeadvert) )
                                    value="{{ $employeeadvert->technology->id }}"
                                @endif required
                            >

                                <option></option>

                                @foreach ($technology as $tech)
                                    <option value="{{ $tech->id }}"
                                            @if( isset($employeeadvert) && ($employeeadvert->technology_id == $tech->id) )
                                            selected
                                            @elseif( old('technology_id') && old('technology_id') == $tech->id )
                                            selected
                                        @endif
                                    >{{ $tech->name }}</option>
                                @endforeach

                            </select>

                            @error('technology_id')
                            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="contracttype_id" class="col-sm-2 col-form-label">{{ __('translations.employeeadverts.attributes.contracttype') }}:</label>

                        <div class="col-sm-10">
                            <select type="text" name="contracttype_id" class="form-control @error('contracttype_id') is-invalid @enderror" id="contracttype_id"
                                    @if( isset($employeeadvert) )
                                    value="{{ $employeeadvert->contracttype->id }}"
                                @endif required
                            >

                                <option></option>

                                @foreach ($contracttype as $contract)
                                    <option value="{{ $contract->id }}"
                                            @if( isset($employeeadvert) && ($employeeadvert->contracttype_id == $contract->id) )
                                            selected
                                            @elseif( old('contracttype_id') && old('contracttype_id') == $contract->id )
                                            selected
                                        @endif
                                    >{{ $contract->name }}</option>
                                @endforeach

                            </select>

                            @error('technology_id')
                            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="salary_start" class="col-sm-2 col-form-label">{{ __('translations.employeeadverts.attributes.salary') }}:</label>

                        <div class="col-sm-10">
                            <input type="number" name="salary_start" class="form-control @error('salary_start') is-invalid @enderror" id="salary_start" min="1000" step="100"
                                   @if( isset($employeeadvert) )
                                    value="{{ $employeeadvert->salary_start }}"
                                @endif required
                            >

                            @error('salary_start')
                            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="location" class="col-sm-2 col-form-label">{{ __('translations.employeeadverts.attributes.location') }}:</label>

                        <div class="col-sm-10">
                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location" @if( isset($employeeadvert) )
                                   value="{{ $employeeadvert->location }}"
                                @endif required
                            >

                            @error('location')
                            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">{{ __('translations.employeeadverts.attributes.description') }}:</label>

                        <div class="col-sm-10">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="8" required>
                                @if( isset($employeeadvert) ){{$employeeadvert->description}} @endif
                            </textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <div class="btn-group" role="group" aria-label="Cancel or submit form">
                            <a href="{{ route('employeeadverts.index') }}" type="submit" class="btn btn-secondary"> {{ __('translations.buttons.cancel') }} </a>

                            <button type="submit" class="btn btn-primary">
                                @if( isset($employeeadvert) )
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
