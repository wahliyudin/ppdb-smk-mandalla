<div class="d-flex align-items-center gap-2">
    <button type="button" data-bs-toggle="modal" data-bs-target="#show{{ $siswa->getKey() }}"
        class="btn btn-sm btn-primary ps-4">
        <i class="ki-duotone ki-eye fs-3">
            <i class="path1"></i>
            <i class="path2"></i>
            <i class="path3"></i>
        </i>Detail</button>
    {{-- <button type="button" data-pembayaran="{{ $siswa->getKey() }}" class="btn btn-sm btn-danger ps-4 btn-delete">
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
    </button> --}}
    <button type="button" data-pembayaran="{{ $siswa->getKey() }}" class="btn btn-sm btn-success ps-4 btn-verifikasi">
        <span class="indicator-label">
            <div class="d-flex align-items-center gap-2">
                <i class="ki-duotone ki-check-square fs-3">
                    <i class="path1"></i>
                    <i class="path2"></i>
                </i>Verifikasi
            </div>
        </span>
        <span class="indicator-progress">
            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
    </button>
    <button type="button" data-pembayaran="{{ $siswa->getKey() }}" class="btn btn-sm btn-danger ps-4 btn-tolak">
        <span class="indicator-label">
            <div class="d-flex align-items-center gap-2">
                <i class="ki-duotone ki-trash fs-3">
                    <i class="path1"></i>
                    <i class="path2"></i>
                    <i class="path3"></i>
                    <i class="path4"></i>
                    <i class="path5"></i>
                </i>Tolak
            </div>
        </span>
        <span class="indicator-progress">
            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
    </button>
</div>
<div class="modal fade" id="show{{ $siswa->getKey() }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="#" id="create-home_form">
                <div class="modal-header" id="create-home_header">
                    <h2 class="fw-bold">Bukti Pembayaran</h2>
                    <div id="create-home_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17 row">
                    <div class="col-lg-8">
                        <a class="d-block overlay" target="_blank"
                            style="background-color: #00000033; border-radius: 10px;" data-fslightbox="lightbox-basic"
                            href="{{ asset("storage/pembayaran/{$siswa->pembayaran?->bukti}") }}">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                style="background-image:url('{{ asset("storage/pembayaran/{$siswa->pembayaran?->bukti}") }}')">
                            </div>
                            <!--end::Image-->

                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                            </div>
                            <!--end::Action-->
                        </a>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
