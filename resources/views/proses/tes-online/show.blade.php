@extends('layouts.master')

@section('title', 'Biodata')

@section('content')
    <!--begin::Navbar-->
    <div class="card card-flush mb-9" id="kt_user_profile_panel">
        <!--begin::Hero nav-->
        <div class="card-header rounded-top bgi-size-cover h-200px"
            style="background-position: 100% 50%; background-image:url('{{ asset('assets/media/misc/profile-head-bg.jpg') }}')">
        </div>
        <!--end::Hero nav-->

        <!--begin::Body-->
        <div class="card-body mt-n19">
            <!--begin::Details-->
            <div class="m-0">
                <!--begin: Pic-->
                <div class="d-flex flex-stack align-items-end pb-4 mt-n19">
                    <div class="symbol symbol-125px symbol-lg-150px symbol-fixed position-relative mt-n3">
                        <img src="{{ asset('assets/media/avatars/300-3.jpg') }}" alt="image"
                            class="border border-white border-4" style="border-radius: 20px" />
                        <div
                            class="position-absolute translate-middle bottom-0 start-100 ms-n1 mb-9 bg-success rounded-circle h-15px w-15px">
                        </div>
                    </div>
                </div>
                <!--end::Pic-->

                <!--begin::Info-->
                <div class="d-flex flex-stack flex-wrap align-items-end">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="#"
                                class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{ $siswa->nama }}</a>
                            <a href="#" class="" data-bs-toggle="tooltip" data-bs-placement="right"
                                title="Account is verified">
                                <i class="ki-duotone ki-verify fs-1 text-primary"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </a>
                        </div>
                        <!--end::Name-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
        </div>
    </div>
    <!--end::Navbar-->
    <!--begin::Nav items-->
    <div id="kt_user_profile_nav" class="rounded bg-gray-200 d-flex flex-stack flex-wrap mb-9 p-2" data-kt-sticky="true"
        data-kt-sticky-name="sticky-profile-navs" data-kt-sticky-offset="{default: false, lg: '200px'}"
        data-kt-sticky-width="{target: '#kt_user_profile_panel'}" data-kt-sticky-left="auto" data-kt-sticky-top="70px"
        data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
        <!--begin::Nav-->
        <ul class="nav nav-tabs nav-line-tabs flex-wrap border-transparent">
            <!--begin::Nav item-->
            <li class="nav-item my-1">
                <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1 active"
                    data-bs-toggle="tab" href="#biodata">
                    Biodata </a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item my-1">
                <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1 "
                    data-bs-toggle="tab" href="#orang-tua">
                    Orang Tua </a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item my-1">
                <a class="btn btn-sm btn-color-gray-600 bg-state-body btn-active-color-gray-800 fw-bolder fw-bold fs-6 fs-lg-base nav-link px-3 px-lg-4 mx-1 "
                    data-bs-toggle="tab" href="#dokumen">
                    Dokumen </a>
            </li>
            <!--end::Nav item-->
        </ul>
        <!--end::Nav-->
    </div>
    <!--end::Nav items-->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="biodata" role="tabpanel">
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Biodata</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--begin::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9">

                    <!--begin::Notice-->
                    {{-- <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed  p-6 mb-7">
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span class="path1"></span><span
                                class="path2"></span><span class="path3"></span></i>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1 ">
                            <!--begin::Content-->
                            <div class=" fw-semibold">
                                <h4 class="text-gray-900 fw-bold">We need your attention!</h4>

                                <div class="fs-6 text-gray-700 ">Your payment was declined. To start
                                    using tools, please <a class="fw-bold" href="billing.html">Add
                                        Payment Method</a>.</div>
                            </div>
                            <!--end::Content-->

                        </div>
                        <!--end::Wrapper-->
                    </div> --}}
                    <!--end::Notice-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Nama</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa->nama }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Jenis Kelamin</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa->jenis_kelamin->label() }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Tanggal Lahir</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ \Carbon\Carbon::parse($siswa->tgl_lahir)->translatedFormat('d F Y') }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Tempat Lahir</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa->tempat_lahir }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">NISN</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa?->identitas?->nisn }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">NIK</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa?->identitas?->nik }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Jumlah Saudara</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ $siswa?->identitas?->jumlah_saudara }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Anak Ke</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa?->identitas?->anak_ke }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Agama</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ $siswa?->identitas?->agama?->label() }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Suku</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa?->identitas?->suku }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Asal Sekolah</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ $siswa?->identitas?->asal_sekolah }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">No Ijazah</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa?->identitas?->no_ijazah }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Berat Badan</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa?->identitas?->berat_badan }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Tinggi Badan</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ $siswa?->identitas?->tinggi_badan }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Riwayat Penyakit</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ $siswa?->identitas?->riwayat_penyakit }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::details View-->
        </div>
        <div class="tab-pane fade" id="orang-tua" role="tabpanel">
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Data Orang Tua</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--begin::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9">
                    <div class="row">
                        <div class="col-md-6 pe-10">
                            <div class="row">
                                <h4>Ayah</h4>
                            </div>
                            <hr class="py-1">
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Nama</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa->orangTua?->nama_ayah }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Tempat Lahir</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ $siswa->orangTua?->tempat_lahir_ayah }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Pekerjaan</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ $siswa->orangTua?->pekerjaan_ayah }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Tanggal Lahir</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ \Carbon\Carbon::parse($siswa->orangTua?->tgl_lahir_ayah)->translatedFormat('d F Y') }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">No Telp</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa->orangTua?->no_telp_ayah }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                        <div class="col-md-6 pe-10">
                            <div class="row">
                                <h4>Ibu</h4>
                            </div>
                            <hr class="py-1">
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Nama</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa->orangTua?->nama_ibu }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Tempat Lahir</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ $siswa->orangTua?->tempat_lahir_ibu }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Pekerjaan</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa->orangTua?->pekerjaan_ibu }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">Tanggal Lahir</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ \Carbon\Carbon::parse($siswa->orangTua?->tgl_lahir_ibu)->translatedFormat('d F Y') }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-7">
                                <!--begin::Label-->
                                <label class="col-lg-4 fw-semibold text-muted">No Telp</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $siswa->orangTua?->no_telp_ibu }}</span>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <div class="tab-pane fade" id="dokumen" role="tabpanel">
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Dokumen</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--begin::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9">
                    <div class="row gap-10 justify-content-center">
                        <div class="row col-md-3 mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Ijazah</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <a class="d-block overlay" style="background-color: #00000033; border-radius: 10px;"
                                    data-fslightbox="lightbox-basic"
                                    href="{{ asset("storage/dokumen/{$siswa->dokumen?->ijazah}") }}">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                        style="background-image:url('{{ asset("storage/dokumen/{$siswa->dokumen?->ijazah}") }}')">
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row col-md-3 mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">KIP</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <a class="d-block overlay" style="background-color: #00000033; border-radius: 10px;"
                                    data-fslightbox="lightbox-basic"
                                    href="{{ asset("storage/dokumen/{$siswa->dokumen?->kip}") }}">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                        style="background-image:url('{{ asset("storage/dokumen/{$siswa->dokumen?->kip}") }}')">
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row col-md-3 mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">KKS</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <a class="d-block overlay" style="background-color: #00000033; border-radius: 10px;"
                                    data-fslightbox="lightbox-basic"
                                    href="{{ asset("storage/dokumen/{$siswa->dokumen?->kks}") }}">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                        style="background-image:url('{{ asset("storage/dokumen/{$siswa->dokumen?->kks}") }}')">
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row col-md-3 mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">KTP Orang Tua</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <a class="d-block overlay" style="background-color: #00000033; border-radius: 10px;"
                                    data-fslightbox="lightbox-basic"
                                    href="{{ asset("storage/dokumen/{$siswa->dokumen?->ktp_orang_tua}") }}">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                        style="background-image:url('{{ asset("storage/dokumen/{$siswa->dokumen?->ktp_orang_tua}") }}')">
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row col-md-3 mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">PKH</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <a class="d-block overlay" style="background-color: #00000033; border-radius: 10px;"
                                    data-fslightbox="lightbox-basic"
                                    href="{{ asset("storage/dokumen/{$siswa->dokumen?->pkh}") }}">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                        style="background-image:url('{{ asset("storage/dokumen/{$siswa->dokumen?->pkh}") }}')">
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>
@endsection
