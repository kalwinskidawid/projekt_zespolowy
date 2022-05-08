<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/profiles.css')  }}">
    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('js/profiles.js')  }}"></script>
    </x-slot>
    <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto">
            <div class="container">
                <div class="bg-white shadow rounded overflow-hidden">
                    <div class="bg-light p-4 d-flex text-center">
                        <div class="mr-auto p-2">
                            <button type="button" class="btn btn-dark text-left">Edytuj</button>
                        </div>
                        <div class="p-2"><h4 class="font-weight-bold mb-0 d-block">{{$profile->first_name}} {{$profile->surname}}</h4></div>
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="mb-0">{{ __('translations.attributes.profile.career') }}</h5>
                        <div class="p-4 rounded shadow-sm bg-light">
                            @foreach($careers as $career)
                                <p class="font-italic mb-0">
                                    {{$career->id}}
                                    {{$career->start_date}}
                                    {{$career->end_date}}
                                    {{$career->position}}
                                </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="mb-0">{{ __('translations.attributes.profile.skills') }}</h5>
                        <div class="p-4 rounded shadow-sm bg-light">
                            @foreach($skills as $skill)
                                <p class="font-italic mb-0">
                                    {{$skill->id}}
                                    {{$skill->technology()->first()->name}}
                                    {{$skill->level()->first()->name}}
                                </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="mb-0">{{ __('translations.attributes.profile.certificates') }}</h5>
                        <div class="p-4 rounded shadow-sm bg-light">
                            @foreach($certificates as $certificate)
                                <p class="font-italic mb-0">
                                    {{$certificate->id}}
                                    {{$certificate->name}}
                                    {{$certificate->achievement_date}}
                                    {{$certificate->link}}
                                    {{$certificate->description}}
                                </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="px-4 py-3">
                        <h5 class="mb-0">{{ __('translations.attributes.profile.languages') }}</h5>
                        <div class="p-4 rounded shadow-sm bg-light">
                            @foreach($knownLanguages as $knownLanguage)
                                <p class="font-italic mb-0">
                                    {{$knownLanguage->id}}
                                    {{$knownLanguage->language()->first()->name}}
                                    {{$knownLanguage->level()->first()->name}}
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
        Launch demo modal
    </button>
    <div class="modal fade" id="formModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="formModalLabel">Create Todo</h4>
                </div>
                <div class="modal-body">
                    <form id="myForm" name="myForm" class="form-horizontal" novalidate="" method="POST" action="{{ route('profiles.skills.store') }}" >
                        @csrf
                        <div class="form-group">
                            <label>{{__('translations.attributes.profile.technology')}}</label>
                            <select class="form-select select2 @error('technology_id')is-invalid @enderror" name="technology_id"
                                    id="technology"
                                    aria-describedby="giveaway-platform-error">
                                <option></option>
                                @foreach ($technologies as $technology)
                                    <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <select class="form-select select2 @error('level_id')is-invalid @enderror" name="level_id"
                                    id="level"
                                    aria-describedby="giveaway-platform-error">
                                <option></option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                    </button>
                    <input type="hidden" id="todo_id" name="todo_id" value="0">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
