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
            <h5 class="mb-0">About</h5>
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
        <div class="py-4 px-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="mb-0">Recent photos</h5><a href="#" class="btn btn-link text-muted">Show all</a>
            </div>

        </div>
    </div>
    </div>
        </div>
    </div>
</x-app-layout>
