<div class="row border-bottom" id="edit-skill">
    <div class="col-sm-10 ">
        <div class="row mb-3">
            <label for="skill-technology" class="col-sm-2 col-form-label text-capitalize">
                {{ __('translations.attributes.profile.technology') }}
            </label>
            <div class="col-sm-10">
                <select type="text" class="form-control" name="technology_id" id="skill-technology-{{ $skill->id }}">
                    @foreach ($technologies as $technology)
                        <option value="{{ $technology->id }}" @if($technology->id === $skill->technology_id) checked @endif>{{ $technology->name }}
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
                <select type="text" class="form-control" name="level_id" id="skill-level-{{ $skill->id }}">
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}" @if($level->id === $skill->level_id) checked @endif> {{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-2 text-right">
        <a class="btn btn-primary text-capitalize" onclick="skillSaveEdit({{ $skill->id }})">
            {{ __('translations.labels.save') }}
        </a>
        <a class="btn btn-danger text-capitalize cancel" onclick="skillCancelEdit({{ $skill->id }})">
            {{ __('translations.labels.cancel') }}
        </a>
    </div>
</div>