<div class="d-flex align-items-center gap-2">
    <a href="{{ route('siswa.show', $siswa->getKey()) }}" class="btn btn-sm btn-primary ps-4">
        <i class="ki-duotone ki-eye fs-3">
            <i class="path1"></i>
            <i class="path2"></i>
            <i class="path3"></i>
        </i>Detail</a>
    <button type="button" data-siswa="{{ $siswa->getKey() }}" class="btn btn-sm btn-danger ps-4 btn-delete">
        <span class="indicator-label">
            <div class="d-flex align-items-center gap-2">
                <i class="ki-duotone ki-trash fs-3">
                    <i class="path1"></i>
                    <i class="path2"></i>
                    <i class="path3"></i>
                    <i class="path4"></i>
                    <i class="path5"></i>
                </i>Hapus
            </div>
        </span>
        <span class="indicator-progress">
            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
    </button>
</div>
