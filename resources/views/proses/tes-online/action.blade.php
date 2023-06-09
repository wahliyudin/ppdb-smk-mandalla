<div class="d-flex align-items-center gap-2">
    <a href="{{ route('tes-online.show', $siswa->getKey()) }}" class="btn btn-sm btn-primary ps-4">
        <i class="ki-duotone ki-eye fs-3">
            <i class="path1"></i>
            <i class="path2"></i>
            <i class="path3"></i>
        </i>Detail</a>
    <button type="button" data-siswa="{{ $siswa->getKey() }}" class="btn btn-sm btn-success ps-4 btn-resend">
        <span class="indicator-label">
            <div class="d-flex align-items-center gap-2">
                <i class="ki-duotone ki-send fs-3">
                    <i class="path1"></i>
                    <i class="path2"></i>
                </i>Kirim Ulang Link
            </div>
        </span>
        <span class="indicator-progress">
            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
    </button>
</div>
