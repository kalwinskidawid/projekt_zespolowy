<x-app-layout>
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
</x-app-layout>
