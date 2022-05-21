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
