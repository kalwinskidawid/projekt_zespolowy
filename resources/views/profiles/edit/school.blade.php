<div class="row border-bottom mt-2" id="edit-school">
    <div class="col-sm-10 ">
        <div class="row mb-3">
            <label for="School-name" class="col-sm-2 col-form-label">
                Nazwa szkoly
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="school-name-{{ $school->id }}"
                    value="{{ $school->school_name }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="School-name" class="col-sm-2 col-form-label">
                Typ
            </label>
            <div class="col-sm-10">
                <select type="text" class="form-control" name="name" id="school-type-{{ $school->id }}">
                    @foreach ($schoolList as $schoollist)
                        <option value="{{ $schoollist->id }}" @if ($schoollist->id == $school->schoolType->id) selected @endif>
                            {{ $schoollist->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="School-name" class="col-sm-2 col-form-label">
                Czas
            </label>
            <div class="col-sm-10">
                od <input type="date" class="form-control" value="{{ $school->start_date }}"
                    id="school-start-{{ $school->id }}"> do <input type="date" class="form-control"
                    value="{{ $school->end_date }}" id="school-end-{{ $school->id }}">
            </div>
        </div>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-primary text-capitalize text-white" onclick="schoolSaveEdit({{ $school->id }})">
            {{ __('translations.labels.save') }}
        </a>
        <a class="btn btn-danger text-capitalize text-white" onclick="schoolCancelEdit({{ $school->id }})">
            {{ __('translations.labels.cancel') }}
        </a>
    </div>
</div>
