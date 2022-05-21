<div id="language-id-{{$language->id}}">
    <div class="d-flex justify-content-between border-bottom">
        <div class="p-2">
            {{ $language->language->name }}
            <div>{{ $language->level->name }}</div>

        </div>
        <div class="p-2 editButtons">
            <a class="btn" onclick="updateLanguage({{ $language->id }})">
                <i class="bi bi-pencil-square"></i>
            </a>
            <a class="btn" onclick="languageDelete({{ $language->id }})">
                <i class="bi bi-trash"></i>
            </a>
        </div>
    </div>
</div>
