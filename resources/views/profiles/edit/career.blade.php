<div class="row border-bottom" id="edit-career">
    <div class="col-sm-10 ">
        <div class="row mb-3">
            <label for="career-name" class="col-sm-2 col-form-label">
                Pozycja
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="career-name{{ $career->id }}"
                value="{{ $career->position }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="career-des" class="col-sm-2 col-form-label">
                Opis
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="career-des{{ $career->id }}"
                value="{{ $career->description }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Carrer-time" class="col-sm-2 col-form-label">
                Czas
            </label>
            <div class="col-sm-10">
                od <input type="date" class="form-control" value="{{ $career->start_date }}"
                id="career-start{{ $career->id }}"> do <input type="date"
                    class="form-control" value="{{ $career->end_date }}" id="career-end{{ $career->id }}">
            </div>
        </div>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-primary text-capitalize" onclick="careerSaveEdit({{ $career->id }})">
            {{ __('translations.labels.save') }}
        </a>
        <a class="btn btn-danger text-capitalize cancel" onclick="careerCancelEdit({{ $career->id }})">
            {{ __('translations.labels.cancel') }}
        </a>
    </div>
</div>