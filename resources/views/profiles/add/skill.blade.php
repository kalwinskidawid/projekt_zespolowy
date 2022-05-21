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