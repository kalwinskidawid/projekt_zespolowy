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
