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