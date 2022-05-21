<div class="row border-bottom mt-2" id="edit-certificates">
    <div class="col-sm-10 ">
        <div class="row mb-3">
            <label for="certificate-name" class="col-sm-2 col-form-label">
                Nazwa
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="certificate-name-{{$certificate->id}}" value="{{$certificate->name}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="certificate-link" class="col-sm-2 col-form-label">
                Adres URL
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="certificate-link-{{$certificate->id}}"  value="{{$certificate->link}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="certificate-achievement-data" class="col-sm-2 col-form-label">
                Data uzyskania
            </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="certificate-achievement-data-{{$certificate->id}}" value="{{$certificate->achievement_date}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="certificate-additional-information" class="col-sm-2 col-form-label">
                Dodatkowe informacje
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="certificate-additional-information-{{$certificate->id}}" value="{{$certificate->description}}">
            </div>
        </div>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-primary text-capitalize text-white" onclick="certificateSaveEdit({{ $certificate->id }})">
            {{ __('translations.labels.save') }}
        </a>
        <a class="btn btn-danger text-capitalize text-white" onclick="certificateCancelEdit({{ $certificate->id }})">
            {{ __('translations.labels.cancel') }}
        </a>
    </div>
</div>
