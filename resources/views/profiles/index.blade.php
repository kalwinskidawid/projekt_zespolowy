<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/profiles.css')  }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style>
            .profile-head {
                transform: translateY(5rem)
            }

            .cover {
                background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
                background-size: cover;
                background-repeat: no-repeat
            }

            body {
                min-height: 100vh;
                overflow-x: hidden;
            }
        </style>
    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('js/profiles.js')  }}"></script>
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3">
                            <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" alt="..." width="130" class="rounded mb-2 img-thumbnail">
                            <a href="#" id="editProfile" class="btn btn-outline-dark btn-sm btn-block text-capitalize" >
                                {{ __('translations.labels.profile.edit') }}
                            </a>
                        </div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="mt-0 mb-0 text-capitalize">{{$profile->first_name}} {{$profile->surname}}</h4>
                            <p class="small mb-4">
                                <i class="fas fa-map-marker-alt mr-2"></i> ---
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-light p-4 d-flex justify-content-end text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">215</h5>
                            <small class="text-muted">
                                <i class="fas fa-image mr-1"></i>
                                ---
                            </small>
                        </li>
                    </ul>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <h5 class="mb-0 text-capitalize">{{__('translations.attributes.profile.schools')}}</h5>
                        <a href="#" class="btn btn-link text-muted" id="button-add-school">{{__('translations.labels.create')}}</a>
                    </div>
                    <div class="card card-body">
                        <div class="row border-bottom d-none" id="add-school">
                            <div class="col-sm-10 ">
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        Nazwa szkoly
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="School-name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        Typ
                                    </label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="name" id="School-name">
                                            @foreach($schoolList as $school)
                                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        Czas
                                    </label>
                                    <div class="col-sm-10">
                                        od <input type="date" class="form-control"> do <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a class="btn btn-primary text-capitalize" href="">
                                    {{__('translations.labels.save')}}
                                </a>
                                <a class="btn btn-danger text-capitalize" href="">
                                    {{__('translations.labels.cancel')}}
                                </a>
                            </div>
                        </div>
                        @foreach($schools as $school)
                        <div class="d-flex justify-content-between border-bottom">
                            <div class="p-2" id="school-{{$school->id}}">
                                {{$school->school_name}}
                                <div>{{$school->start_date}} - {{schoolType->end_date}}</div>
                                <div>{{$school->schoolType->name}}</div>
                            </div>
                            <div class="p-2">
                                <a class="btn btn-primary" onclick="updateSchool({{$school->id}})">
                                    {{__('translations.buttons.update')}}
                                </a>
                                <a class="btn btn-danger" href="">
                                    {{__('translations.buttons.delete')}}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <h5 class="mb-0 text-capitalize">{{__('translations.attributes.profile.career')}}</h5>
                        <a href="#" class="btn btn-link text-muted text-capitalize" id="button-add-career">{{__('translations.labels.create')}}</a>
                    </div>
                    <div class="card card-body">
                        <div class="row border-bottom d-none" id="add-career">
                            <div class="col-sm-10 ">
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        ---
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="School-name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        ---
                                    </label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="name" id="School-name">
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        ---
                                    </label>
                                    <div class="col-sm-10">
                                        od <input type="date" class="form-control"> do <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a class="btn btn-primary text-capitalize" href="">
                                    {{__('translations.labels.save')}}
                                </a>
                                <a class="btn btn-danger text-capitalize" href="">
                                    {{__('translations.labels.cancel')}}
                                </a>
                            </div>
                        </div>
                        @foreach($careers as $career)
                            <div class="d-flex justify-content-between border-bottom">
                                <div class="p-2">
                                    {{$career->position}}
                                    <div>{{$career->start_date}} - {{$career->end_date}}</div>
                                    <div>{{$career->description}}</div>
                                </div>
                                <div class="p-2">
                                    <a class="btn btn-primary" href="">
                                        {{__('translations.buttons.update')}}
                                    </a>
                                    <a class="btn btn-danger" href="">
                                        {{__('translations.buttons.delete')}}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <h5 class="mb-0 text-capitalize">{{__('translations.attributes.profile.skills')}}</h5>
                        <a href="#" class="btn btn-link text-muted text-capitalize" id="button-add-skills">{{__('translations.labels.create')}}</a>
                    </div>
                    <div class="card card-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="" method="POST" action="{{ route('profiles.skills.store') }}" >
                            @csrf
                        <div class="row border-bottom d-none" id="add-skills">

                            <div class="col-sm-10 ">
                                <div class="row mb-3">
                                    <label for="technology" class="col-sm-2 col-form-label text-capitalize">
                                        {{__('translations.attributes.profile.technology')}}
                                    </label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="technology_id" id="technology">
                                            @foreach ($technologies as $technology)
                                                <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="level" class="col-sm-2 col-form-label">
                                        {{__('translations.attributes.profile.level')}}
                                    </label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="level_id" id="level">
                                            @foreach ($levels as $level)
                                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <button class="btn btn-primary text-capitalize" type="submit">
                                    {{__('translations.labels.save')}}
                                </button>
                                <a class="btn btn-danger text-capitalize" href="">
                                    {{__('translations.labels.cancel')}}
                                </a>
                            </div>

                        </div>
                        </form>
                        @foreach($skills as $skill)
                            <div class="d-flex justify-content-between border-bottom">
                                <div class="p-2">
                                    {{$skill->technology->name}}
                                    <div>{{$skill->level->name}}</div>
                                </div>
                                <div class="p-2 editButtons d-none">
                                    <a class="btn btn-primary text-capitalize" href="">
                                        {{__('translations.buttons.update')}}
                                    </a>
                                    <form style="display:inline" method="DELETE" action="{{route('profiles.skills.destroy', $skill)}}">
                                    <button class="btn btn-danger text-capitalize" type="submit">
                                        {{__('translations.buttons.delete')}}
                                    </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <h5 class="mb-0 text-capitalize">{{__('translations.attributes.profile.certificates')}}</h5>
                        <a href="#" class="btn btn-link text-muted text-capitalize" id="button-add-certificates">{{__('translations.labels.create')}}</a>
                    </div>
                    <div class="card card-body">
                        <div class="row border-bottom d-none" id="add-certificates">
                            <div class="col-sm-10 ">
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        ---
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="School-name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        ---
                                    </label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="name" id="School-name">
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        ---
                                    </label>
                                    <div class="col-sm-10">
                                        od <input type="date" class="form-control"> do <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a class="btn btn-primary text-capitalize" href="">
                                    {{__('translations.labels.save')}}
                                </a>
                                <a class="btn btn-danger text-capitalize" href="">
                                    {{__('translations.labels.cancel')}}
                                </a>
                            </div>
                        </div>
                        @foreach($certificates as $certificate)
                            <div class="d-flex justify-content-between border-bottom">
                                <div class="p-2">
                                    <a href="{{$certificate->link}}"> {{$certificate->name}}</a>
                                    <div>{{$certificate->achievement_date}}</div>
                                    <div>{{$certificate->description}}</div>
                                </div>
                                <div class="p-2 editButtons d-none">
                                    <button class="btn btn-primary text-capitalize" type="submit">
                                        {{__('translations.buttons.update')}}
                                    </button>
                                    <button class="btn btn-danger text-capitalize" type="submit">
                                        {{__('translations.buttons.delete')}}
                                    </button>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <h5 class="mb-0 text-capitalize">{{__('translations.attributes.profile.languages')}}</h5>
                        <a href="#" class="btn btn-link text-muted text-capitalize" id="button-add-langauges">{{__('translations.labels.create')}}</a>
                    </div>
                    <div class="card card-body">
                        <div class="row border-bottom d-none" id="add-languages">
                            <div class="col-sm-10 ">
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        ---
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="School-name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        ---
                                    </label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="name" id="School-name">
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="School-name" class="col-sm-2 col-form-label">
                                        ---
                                    </label>
                                    <div class="col-sm-10">
                                        od <input type="date" class="form-control"> do <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a class="btn btn-primary" href="">
                                    {{__('translations.labels.save')}}
                                </a>
                                <a class="btn btn-danger" href="">
                                    {{__('translations.labels.cancel')}}
                                </a>
                            </div>
                        </div>
                        @foreach($knownLanguages as $knownLanguage)
                            <div class="d-flex justify-content-between border-bottom">
                                <div class="p-2">
                                    {{$knownLanguage->language->name}}
                                    <div>{{$knownLanguage->level->name}}</div>

                                </div>
                                <div class="p-2 editButtons d-none">
                                    <a class="btn btn-primary" href="">
                                        {{__('translations.buttons.update')}}
                                    </a>
                                    <a class="btn btn-danger" href="">
                                        {{__('translations.buttons.delete')}}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    let schoolShow = false;
    let careerShow = false;
    let languageShow = false;
    let certificateShow = false;
    let skillShow = false;
    let editProfile = false;

    $('body').on('click', '#edit-post', function () {
        var post_id = $(this).data('id');
        $.get('ajax-posts/'+post_id+'/edit', function (data) {
            $('#postCrudModal').html("Edit post");
            $('#btn-save').val("edit-post");
            $('#ajax-crud-modal').modal('show');
            $('#post_id').val(data.id);
            $('#title').val(data.title);
            $('#body').val(data.body);
        })
    });

    function updateSchool(id){
        console.log("Update "+ id);
    }

    $("#editProfile").click(() => {
        if(editProfile){
            $(".editButtons").addClass("d-none");
            editProfile = false;
        } else {
            $(".editButtons").removeClass("d-none");
            editProfile = true;
        }
    })

    $("#button-add-school").click(() => {
        if(schoolShow){
            schoolShow = false;
            $("#add-school").addClass("d-none");
        } else{
            $("#add-school").removeClass("d-none");
            schoolShow = true;
        }

    })
    $("#button-add-career").click(()=> {
        if(careerShow){
            careerShow = false;
            $("#add-career").addClass("d-none");
        } else{
            $("#add-career").removeClass("d-none");
            careerShow = true;
        }
    })
    $("#button-add-langauges").click(() => {
        if(languageShow){
            languageShow = false;
            $("#add-langauges").addClass("d-none");
        } else{
            $("#add-langauges").removeClass("d-none");
            languageShow = true;
        }

    })
    $("#button-add-certificates").click(() => {
        if(certificateShow){
            certificateShow = false;
            $("#add-certificates").addClass("d-none");
        } else{
            $("#add-certificates").removeClass("d-none");
            certificateShow = true;
        }
    })
    $("#button-add-skills").click(() => {
        if(certificateShow){
            certificateShow = false;
            $("#add-skills").addClass("d-none");
        } else{
            $("#add-skills").removeClass("d-none");
            certificateShow = true;
        }
    })
</script>

