<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/profiles.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <script src="{{ asset('js/profiles.js') }}"></script>
    </x-slot>
    <div class="container">
        <input type="hidden" value="{{ $profile->id }}" id="profile-id">
        <div class="card">
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3">
                            <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                alt="..." width="130" class="rounded mb-2 img-thumbnail">
                            <a id="editProfile" class="btn btn-outline-dark btn-sm btn-block text-capitalize">
                                {{ __('translations.labels.profile.edit') }}
                            </a>
                        </div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="mt-0 mb-0 text-capitalize">{{ $profile->first_name }} {{ $profile->surname }}</h4>
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
                        <h5 class="mb-0 text-capitalize">{{ __('translations.attributes.profile.schools') }}</h5>
                        <a class="btn btn-link text-muted" id="button-add-school">
                            {{ __('translations.labels.create') }} </a>
                    </div>
                    <div class="card card-body">
                        <div class="row border-bottom d-none" id="add-school">
                            <div class="col-sm-10 ">
                                <div class="row mb-3">
                                    <label for="school-name" class="col-sm-2 col-form-label">
                                        Nazwa szkoly
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="school-name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="school-type" class="col-sm-2 col-form-label">
                                        Typ
                                    </label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="name" id="school-type">
                                            @foreach ($schoolList as $school)
                                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="school-time" class="col-sm-2 col-form-label">
                                        Czas
                                    </label>
                                    <div class="col-sm-10">
                                        od <input type="date" class="form-control" id="school-start"> do <input
                                            type="date" class="form-control" id="school-end">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a class="btn btn-primary text-capitalize text-white" id="school-save">
                                    {{ __('translations.labels.save') }}
                                </a>
                                <a class="btn btn-danger text-capitalize cancel text-white" data-type="add-school">
                                    {{ __('translations.labels.cancel') }}
                                </a>
                            </div>
                        </div>
                        <div id="school-list">
                        @foreach ($schools as $school)
                        <div id="school-id-{{$school->id}}">
                            <div class="d-flex justify-content-between border-bottom">
                                <div class="p-2" id="school-{{ $school->id }}">
                                    {{ $school->school_name }}
                                    <div>{{ $school->start_date }} - {{ $school->end_date }}</div>
                                    <div>{{ $school->schoolType->name }}</div>
                                </div>
                                <div class="p-2">
                                    <a class="btn" onclick="updateSchool({{ $school->id }})">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a class="btn" onclick="schoolDelete({{ $school->id }})">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <h5 class="mb-0 text-capitalize">{{ __('translations.attributes.profile.career') }}</h5>
                        <a class="btn btn-link text-muted text-capitalize"
                            id="button-add-career">{{ __('translations.labels.create') }}</a>
                    </div>
                    <div class="card card-body">
                        <div class="row border-bottom d-none" id="add-career">
                            <div class="col-sm-10 ">
                                <div class="row mb-3">
                                    <label for="career-name" class="col-sm-2 col-form-label">
                                        Pozycja
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="career-name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="career-des" class="col-sm-2 col-form-label">
                                        Opis
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="career-des">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Carrer-time" class="col-sm-2 col-form-label">
                                        Czas
                                    </label>
                                    <div class="col-sm-10">
                                        od <input type="date" class="form-control" id="career-start"> do <input type="date"
                                            class="form-control" id="career-end">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a class="btn btn-primary text-capitalize text-white" id="career-save">
                                    {{ __('translations.labels.save') }}
                                </a>
                                <a class="btn btn-danger text-capitalize cancel text-white" data-type="add-career">
                                    {{ __('translations.labels.cancel') }}
                                </a>
                            </div>
                        </div>
                        <div id="career-list">
                        @foreach ($careers as $career)
                        <div id="career-id-{{$career->id}}">
                            <div class="d-flex justify-content-between border-bottom">
                                <div class="p-2">
                                    {{ $career->position }}
                                    <div>{{ $career->start_date }} - {{ $career->end_date }}</div>
                                    <div>{{ $career->description }}</div>
                                </div>
                                <div class="p-2">
                                    <a class="btn" onclick="updateCareer({{ $career->id }})">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a class="btn" onclick="careerDelete({{ $career->id }})">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <h5 class="mb-0 text-capitalize">{{ __('translations.attributes.profile.skills') }}</h5>
                        <a class="btn btn-link text-muted text-capitalize"
                            id="button-add-skills">{{ __('translations.labels.create') }}</a>
                    </div>
                    <div class="card card-body">
                        <div class="row border-bottom d-none" id="add-skill">
                            <div class="col-sm-10 ">
                                <div class="row mb-3">
                                    <label for="skill-technology" class="col-sm-2 col-form-label text-capitalize">
                                        {{ __('translations.attributes.profile.technology') }}
                                    </label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="technology_id" id="skill-technology">
                                            @foreach ($technologies as $technology)
                                                <option value="{{ $technology->id }}">{{ $technology->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="skill-level" class="col-sm-2 col-form-label">
                                        {{ __('translations.attributes.profile.level') }}
                                    </label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="level_id" id="skill-level">
                                            @foreach ($levels as $level)
                                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a class="btn btn-primary text-capitalize text-white" id="skill-save">
                                    {{ __('translations.labels.save') }}
                                </a>
                                <a class="btn btn-danger text-capitalize cancel text-white" data-type="add-skill">
                                    {{ __('translations.labels.cancel') }}
                                </a>
                            </div>
                        </div>
                        <div id="skill-list">
                        @foreach ($skills as $skill)
                        <div id="skill-id-{{$skill->id}}">
                            <div class="d-flex justify-content-between border-bottom">
                                <div class="p-2">
                                    {{ $skill->technology->name }}
                                    <div>{{ $skill->level->name }}</div>
                                </div>
                                <div class="p-2">
                                    <a class="btn" onclick="updateSkill({{ $skill->id }})">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a class="btn" onclick="skillDelete({{ $skill->id }})">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <h5 class="mb-0 text-capitalize">{{ __('translations.attributes.profile.certificates') }}</h5>
                        <a class="btn btn-link text-muted text-capitalize"
                            id="button-add-certificates">{{ __('translations.labels.create') }}</a>
                    </div>
                    <div class="card card-body">
                        <div class="row border-bottom d-none" id="add-certificates">
                            <div class="col-sm-10 ">
                                <div class="row mb-3">
                                    <label for="certificate-name" class="col-sm-2 col-form-label">
                                        Nazwa
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="certificate-name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="certificate-link" class="col-sm-2 col-form-label">
                                       Adres URL
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="certificate-link">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="certificate-achievement-data" class="col-sm-2 col-form-label">
                                        Data uzyskania
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="certificate-achievement-data">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="certificate-additional-information" class="col-sm-2 col-form-label">
                                        Dodatkowe informacje
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="certificate-additional-information">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a class="btn btn-primary text-capitalize text-white" id="certificate-save">
                                    {{ __('translations.labels.save') }}
                                </a>
                                <a class="btn btn-danger text-capitalize cancel text-white" data-type="add-certificates">
                                    {{ __('translations.labels.cancel') }}
                                </a>
                            </div>
                        </div>
                        <div id="certificate-list">
                            @foreach ($certificates as $certificate)
                                <div id="certificate-id-{{$certificate->id}}">
                                    <div class="d-flex justify-content-between border-bottom">
                                        <div class="p-2" id="certificate-{{ $certificate->id }}">
                                            <a href="{{ $certificate->link }}"> {{ $certificate->name }}</a>
                                            <div>{{ $certificate->achievement_date }}</div>
                                            <div>{{ $certificate->description }}</div>
                                        </div>
                                        <div class="p-2">
                                            <a class="btn" onclick="updateCertificate({{ $certificate->id }})">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a class="btn" onclick="certificateDelete({{ $certificate->id }})">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between bg-light">
                        <h5 class="mb-0 text-capitalize">{{ __('translations.attributes.profile.languages') }}</h5>
                        <a class="btn btn-link text-muted text-capitalize"
                            id="button-add-languages">{{ __('translations.labels.create') }}</a>
                    </div>
                    <div class="card card-body">
                        <div class="row border-bottom d-none" id="add-language">
                            <div class="col-sm-10 ">
                                <div class="row mb-3">
                                    <label for="known-language" class="col-sm-2 col-form-label text-capitalize">
                                        {{ __('translations.attributes.profile.languages') }}
                                    </label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="language_id" id="known-language">
                                            @foreach ($languageList as $language)
                                                <option value="{{ $language->id }}">{{ $language->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="language-level" class="col-sm-2 col-form-label">
                                        {{ __('translations.attributes.profile.level') }}
                                    </label>
                                    <div class="col-sm-10">
                                        <select type="text" class="form-control" name="language_level_id" id="language-level">
                                            @foreach ($levels as $level)
                                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <a class="btn btn-primary text-capitalize text-white" id="language-save">
                                    {{ __('translations.labels.save') }}
                                </a>
                                <a class="btn btn-danger text-capitalize cancel text-white" data-type="add-language">
                                    {{ __('translations.labels.cancel') }}
                                </a>
                            </div>
                        </div>
                        <div id="language-list">
                        @foreach ($knownLanguages as $knownLanguage)
                         <div id="language-id-{{$knownLanguage->id}}">
                            <div class="d-flex justify-content-between border-bottom">
                                <div class="p-2">
                                    {{ $knownLanguage->language->name }}
                                    <div>{{ $knownLanguage->level->name }}</div>

                                </div>
                                <div class="p-2">
                                    <a class="btn" onclick="updateLanguage({{ $knownLanguage->id }})">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a class="btn" onclick="languageDelete({{ $knownLanguage->id }})">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </div>
                         </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    $('body').on('click', '#edit-post', function() {
        var post_id = $(this).data('id');
        $.get('ajax-posts/' + post_id + '/edit', function(data) {
            $('#postCrudModal').html("Edit post");
            $('#btn-save').val("edit-post");
            $('#ajax-crud-modal').modal('show');
            $('#post_id').val(data.id);
            $('#title').val(data.title);
            $('#body').val(data.body);
        })
    });

    function updateSchool(id) {
        console.log("Update " + id);
    }

    $("#editProfile").click(() => {
        $(".editButtons").removeClass("d-none");
    })

    $("#button-add-school").click(() => {
        $("#add-school").removeClass("d-none");
    })

    $("#button-add-career").click(() => {
        $("#add-career").removeClass("d-none");
    })

    $("#button-add-langauges").click(() => {
        $("#add-languages").removeClass("d-none");
    })

    $("#button-add-certificates").click(() => {
        $("#add-certificates").removeClass("d-none");
    })

    $("#button-add-skills").click(() => {
        $("#add-skill").removeClass("d-none");
    })

    $("#button-add-languages").click(() => {
        $("#add-language").removeClass("d-none");
    })

    $(".cancel").click(function() {
        var cancel = "#" + $(this).data('type');
        $(cancel).addClass("d-none");
    })

    $('#school-save').click(function() {
        $.ajax({
            url: "{{ route('profiles.addSchool') }}",
            method: "get",
            data: {
                profile_id: $("#profile-id").val(),
                school_name: $("#school-name").val(),
                school_type_id: $("#school-type").val(),
                start_date: $("#school-start").val(),
                end_date: $("#school-end").val(),
            },
            success: function(data) {
                $("#school-list").append(data);
                $("#add-school").addClass("d-none");
                $("#school-name").val("");
                $("#school-type").val("");
                $("#school-start").val("");
                $("#school-end").val("");
            }
        });
    })

    function updateSchool(id){
        var idj="#school-id-"+id;
        $.ajax({
            url: "{{ route('profiles.editSchool') }}",
            method: "get",
            data: {
                id:id
            },
            success: function(data) {
                $(idj).html(data);
            }
        });
    }

    function schoolSaveEdit(id){
        var schoolid=id;
        var idj="#school-id-"+id;
        $.ajax({
            url: "{{ route('profiles.editSaveSchool') }}",
            method: "get",
            data: {
                id: schoolid,
                school_name: $("#school-name-"+schoolid).val(),
                school_type_id: $("#school-type-"+schoolid).val(),
                start_date: $("#school-start-"+schoolid).val(),
                end_date: $("#school-end-"+schoolid).val(),
            },
            success: function(data) {
                console.log(idj);
                $(idj).html(data);
            }
        });
    }

    function schoolCancelEdit(id){
        var schoolid=id;
        var idj="#school-id-"+id;
        $.ajax({
            url: "{{ route('profiles.cancelSchool') }}",
            method: "get",
            data: {
                id: schoolid,
            },
            success: function(data) {
                $(idj).html(data);
            }
        });
    }

    function schoolDelete(id){
        var schoolid=id;
        var idj="#school-id-"+id;
        $.ajax({
            url: "{{ route('profiles.deleteSchool') }}",
            method: "get",
            data: {
                id: schoolid,
            },
            success: function(data) {
                $(idj).html("");
            }
        });
    }

    $('#career-save').click(function() {
        $.ajax({
            url: "{{ route('profiles.addCareer') }}",
            method: "get",
            data: {
                profile_id: $("#profile-id").val(),
                position: $("#career-name").val(),
                description: $("#career-des").val(),
                start_date: $("#career-start").val(),
                end_date: $("#career-end").val(),
            },
            success: function(data) {
                $("#career-list").append(data);
                $("#add-career").addClass("d-none");
                $("#career-name").val("");
                $("#career-des").val("");
                $("#career-start").val("");
                $("#career-end").val("");
            }
        });
    })

    function updateCareer(id){
        var idj="#career-id-"+id;
        $.ajax({
            url: "{{ route('profiles.editCareer') }}",
            method: "get",
            data: {
                id:id
            },
            success: function(data) {
                $(idj).html(data);
            }
        });
    }

    function careerSaveEdit(id){
        console.log(id);
        var careerid=id;
        var idj="#career-id-"+id;
        $.ajax({
            url: "{{ route('profiles.editSaveCareer') }}",
            method: "get",
            data: {
                id: careerid,
                position: $("#career-name"+careerid).val(),
                description: $("#career-des"+careerid).val(),
                start_date: $("#career-start"+careerid).val(),
                end_date: $("#career-end"+careerid).val(),
            },
            success: function(data) {
                console.log(idj);
                $(idj).html(data);
            }
        });
    }

    function careerCancelEdit(id){
        var careerid=id;
        var idj="#career-id-"+id;
        $.ajax({
            url: "{{ route('profiles.cancelCareer') }}",
            method: "get",
            data: {
                id: careerid,
            },
            success: function(data) {
                $(idj).html(data);
            }
        });
    }

    function careerDelete(id){
        var careerid=id;
        var idj="#career-id-"+id;
        $.ajax({
            url: "{{ route('profiles.deleteCareer') }}",
            method: "get",
            data: {
                id: careerid,
            },
            success: function(data) {
                $(idj).html("");
            }
        });
    }

    $('#skill-save').click(function() {
        $.ajax({
            url: "{{ route('profiles.addSkill') }}",
            method: "get",
            data: {
                profile_id: $("#profile-id").val(),
                technology_id: $("#skill-technology").val(),
                level_id: $("#skill-level").val(),
            },
            success: function(data) {
                $("#skill-list").append(data);
                $("#add-skill").addClass("d-none");
            }
        });
    })

    function updateSkill(id){
        var idj="#skill-id-"+id;
        $.ajax({
            url: "{{ route('profiles.editSkill') }}",
            method: "get",
            data: {
                id:id
            },
            success: function(data) {
                $(idj).html(data);
            }
        });
    }

    function skillSaveEdit(id){
        console.log(id);
        var skillid=id;
        var idj="#skill-id-"+id;
        $.ajax({
            url: "{{ route('profiles.editSaveSkill') }}",
            method: "get",
            data: {
                id: skillid,
                technology_id: $("#skill-technology-"+skillid).val(),
                level_id: $("#skill-level-"+skillid).val(),
            },
            success: function(data) {
                console.log(idj);
                $(idj).html(data);
            }
        });
    }

    function skillCancelEdit(id){
        var skillid=id;
        var idj="#skill-id-"+id;
        $.ajax({
            url: "{{ route('profiles.cancelSkill') }}",
            method: "get",
            data: {
                id: skillid,
            },
            success: function(data) {
                $(idj).html(data);
            }
        });
    }

    function skillDelete(id){
        var skillid=id;
        var idj="#skill-id-"+id;
        $.ajax({
            url: "{{ route('profiles.deleteSkill') }}",
            method: "get",
            data: {
                id: skillid,
            },
            success: function(data) {
                $(idj).html("");
            }
        });
    }

    $('#certificate-save').click(function() {
        $.ajax({
            url: "{{ route('profiles.addCertificate') }}",
            method: "get",
            data: {
                profile_id: $("#profile-id").val(),
                name: $("#certificate-name").val(),
                link: $("#certificate-link").val(),
                achievement_date: $("#certificate-achievement-data").val(),
                description: $("#certificate-additional-information").val(),
            },
            success: function(data) {
                $("#certificate-list").append(data);
                $("#add-certificates").addClass("d-none");
                $("#certificate-name").val("");
                $("#certificate-link").val("");
                $("#certificate-achievement-data").val("");
                $("#certificate-additional-information").val("");
            }
        });
    })

    function updateCertificate(id){
        var idj="#certificate-id-"+id;
        $.ajax({
            url: "{{ route('profiles.editCertificate') }}",
            method: "get",
            data: {
                id:id
            },
            success: function(data) {
                $(idj).html(data);
            }
        });
    }

    function certificateSaveEdit(id){
        var certificateId=id;
        var idj="#certificate-id-"+id;
        $.ajax({
            url: "{{ route('profiles.editSaveCertificate') }}",
            method: "get",
            data: {
                id: certificateId,
                name: $("#certificate-name-"+certificateId).val(),
                link: $("#certificate-link-"+certificateId).val(),
                achievement_date: $("#certificate-achievement-data-"+certificateId).val(),
                description: $("#certificate-additional-information-"+certificateId).val(),

            },
            success: function(data) {
                console.log(idj);
                $(idj).html(data);
            }
        });
    }

    function certificateCancelEdit(id){
        var certificateId=id;
        var idj="#certificate-id-"+id;
        $.ajax({
            url: "{{ route('profiles.cancelCertificate') }}",
            method: "get",
            data: {
                id: certificateId,
            },
            success: function(data) {
                $(idj).html(data);
            }
        });
    }

    function certificateDelete(id){
        var certificateId=id;
        var idj="#certificate-id-"+id;
        $.ajax({
            url: "{{ route('profiles.deleteCertificate') }}",
            method: "get",
            data: {
                id: certificateId,
            },
            success: function(data) {
                $(idj).html("");
            }
        });
    }

    $('#language-save').click(function() {
        $.ajax({
            url: "{{ route('profiles.addLanguage') }}",
            method: "get",
            data: {
                profile_id: $("#profile-id").val(),
                language_id: $("#known-language").val(),
                level_id: $("#language-level").val(),
            },
            success: function(data) {
                $("#language-list").append(data);
                $("#add-language").addClass("d-none");
            }
        });
    })

    function updateLanguage(id){
        var idj="#language-id-"+id;
        $.ajax({
            url: "{{ route('profiles.editLanguage') }}",
            method: "get",
            data: {
                id:id
            },
            success: function(data) {
                $(idj).html(data);
            }
        });
    }

    function languageSaveEdit(id){
        console.log(id);
        var languageId=id;
        var idj="#language-id-"+id;
        $.ajax({
            url: "{{ route('profiles.editSaveLanguage') }}",
            method: "get",
            data: {
                id: languageId,
                language_id: $("#known-language-"+languageId).val(),
                level_id: $("#language-level-"+languageId).val(),
            },
            success: function(data) {
                console.log(idj);
                $(idj).html(data);
            }
        });
    }

    function languageCancelEdit(id){
        var languageId=id;
        var idj="#language-id-"+id;
        $.ajax({
            url: "{{ route('profiles.cancelLanguage') }}",
            method: "get",
            data: {
                id: languageId,
            },
            success: function(data) {
                $(idj).html(data);
            }
        });
    }

    function languageDelete(id){
        var languageId=id;
        var idj="#language-id-"+id;
        $.ajax({
            url: "{{ route('profiles.deleteLanguage') }}",
            method: "get",
            data: {
                id: languageId,
            },
            success: function(data) {
                $(idj).html("");
            }
        });
    }

</script>
