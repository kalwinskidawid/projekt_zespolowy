
<div class="row border-bottom mt-2" id="edit-language">
    <div class="col-sm-10 ">
        <div class="row mb-3">
            <label for="known-language" class="col-sm-2 col-form-label text-capitalize">
                {{ __('translations.attributes.profile.languages') }}
            </label>
            <div class="col-sm-10">
                <select type="text" class="form-control" name="language_id" id="known-language-{{$language->id}}">
                    @foreach ($languageList as $languageElement)
                        <option value="{{ $languageElement->id }}"@if($languageElement->id === $language->language->id) selected @endif> {{ $languageElement->name }}
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
                <select type="text" class="form-control" name="language_level_id" id="language-level-{{$language->id}}">
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}" @if($level->id === $language->level->id) selected @endif>{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-primary text-capitalize text-white" onclick="languageSaveEdit({{ $language->id }})">
            {{ __('translations.labels.save') }}
        </a>
        <a class="btn btn-danger text-capitalize cancel text-white" onclick="languageCancelEdit({{ $language->id }})">
            {{ __('translations.labels.cancel') }}
        </a>
    </div>
</div>
