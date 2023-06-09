<div class="d-flex align-items-center gap-2">
    <button type="button" data-soal="{{ $soal->getKey() }}" class="btn btn-sm btn-primary btn-edit">
        <span class="indicator-label">
            <div class="d-flex align-items-center gap-2">
                <i class="ki-duotone ki-notepad-edit fs-3">
                    <i class="path1"></i>
                    <i class="path2"></i>
                </i>
            </div>
        </span>
        <span class="indicator-progress">
            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
    </button>
    <button type="button" data-soal="{{ $soal->getKey() }}" class="btn btn-sm btn-danger btn-delete">
        <span class="indicator-label">
            <div class="d-flex align-items-center gap-2">
                <i class="ki-duotone ki-trash fs-3">
                    <i class="path1"></i>
                    <i class="path2"></i>
                    <i class="path3"></i>
                    <i class="path4"></i>
                    <i class="path5"></i>
                </i>
            </div>
        </span>
        <span class="indicator-progress">
            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
    </button>
</div>
