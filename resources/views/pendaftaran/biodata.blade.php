@extends('layouts.master')

@section('toolbar')
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Form Pendaftaran
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Form Pendaftaran</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-body">
                <div class="stepper stepper-pills" id="kt_stepper_example_basic">
                    <!--begin::Nav-->
                    <div class="stepper-nav flex-center flex-wrap mb-10">
                        <!--begin::Step 1-->
                        <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Step 1
                                    </h3>

                                    <div class="stepper-desc">
                                        Data Ibu
                                    </div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 1-->

                        <!--begin::Step 2-->
                        <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">2</span>
                                </div>
                                <!--begin::Icon-->

                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Step 2
                                    </h3>

                                    <div class="stepper-desc">
                                        Data Ayah
                                    </div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 2-->

                        <!--begin::Step 3-->
                        <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">3</span>
                                </div>
                                <!--begin::Icon-->

                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Step 3
                                    </h3>

                                    <div class="stepper-desc">
                                        Data Diri
                                    </div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 3-->

                        <!--begin::Step 4-->
                        <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">4</span>
                                </div>
                                <!--begin::Icon-->

                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Step 4
                                    </h3>

                                    <div class="stepper-desc">
                                        Dokumen
                                    </div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 4-->
                        <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">5</span>
                                </div>
                                <!--begin::Icon-->

                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Step 5
                                    </h3>

                                    <div class="stepper-desc">
                                        Pernyataan
                                    </div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 4-->
                    </div>
                    <!--end::Nav-->

                    <!--begin::Form-->
                    <form class="form w-md-500px w-lg-1000px mx-auto" novalidate="novalidate"
                        id="kt_stepper_example_basic_form">
                        <!--begin::Group-->
                        <div class="mb-5">
                            <!--begin::Step 1-->
                            <div class="flex-column current" data-kt-stepper-element="content">
                                <div class="row">
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Nama</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tanggal Lahir</label>
                                        <input class="form-control form-control-solid" value="{{ now()->format('Y-m-d') }}"
                                            placeholder="Tanggal" name="tanggal" id="tanggal" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tempat Lahir</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Pekerjaan</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">No. Telp</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                </div>
                            </div>
                            <!--begin::Step 1-->

                            <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <div class="row">
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Nama</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tanggal Lahir</label>
                                        <input class="form-control form-control-solid"
                                            value="{{ now()->format('Y-m-d') }}" placeholder="Tanggal" name="tanggal"
                                            id="tanggal" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tempat Lahir</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Pekerjaan</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">No. Telp</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                </div>
                            </div>
                            <!--begin::Step 1-->

                            <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <div class="row">
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">NIK</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">NISN</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Nama</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tempat Lahir</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tanggal Lahir</label>
                                        <input class="form-control form-control-solid"
                                            value="{{ now()->format('Y-m-d') }}" placeholder="Tanggal" name="tanggal"
                                            id="tanggal" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Jenis Kelamin</label>
                                        <select class="form-select form-select-solid" name="jenis_kelamin"
                                            data-control="select2" data-placeholder="Jenis Kelamin">
                                            <option></option>
                                            @foreach (\App\Enums\JenisKelamin::cases() as $jenisKelamin)
                                                <option value="{{ $jenisKelamin->value }}">{{ $jenisKelamin->label() }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Jumlah Saudara</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Anak Ke</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Dari</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Agama</label>
                                        <select class="form-select form-select-solid" name="agama"
                                            data-control="select2" data-placeholder="Agama">
                                            <option></option>
                                            @foreach (\App\Enums\Agama::cases() as $agama)
                                                <option value="{{ $agama->value }}">{{ $agama->label() }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Suku</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Asal Sekolah</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">No Ijazah</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Berat Badan</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tinggi Badan</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                    <div class="col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Riwayat Penyakit</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama" />
                                    </div>
                                </div>
                            </div>
                            <!--begin::Step 1-->

                            <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <div class="row">

                                </div>
                            </div>
                            <!--begin::Step 1-->

                            <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <div class="alert alert-primary d-flex align-items-center p-5">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    <!--end::Icon-->

                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Title-->
                                        <h4 class="mb-1 text-dark">This is an alert</h4>
                                        <!--end::Title-->

                                        <!--begin::Content-->
                                        <span>The alert component can be used to highlight certain parts of your page for
                                            higher content visibility.</span>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                            </div>
                            <!--begin::Step 1-->
                        </div>
                        <!--end::Group-->

                        <!--begin::Actions-->
                        <div class="d-flex flex-stack">
                            <!--begin::Wrapper-->
                            <div class="me-2">
                                <button type="button" class="btn btn-light btn-active-light-primary"
                                    data-kt-stepper-action="previous">
                                    Back
                                </button>
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Wrapper-->
                            <div>
                                <button type="button" class="btn btn-primary" data-kt-stepper-action="submit">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>

                                <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                    Continue
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    <script src="assets/js/scripts.bundle.js"></script>
    <script>
        $("#tanggal").flatpickr();
        var element = document.querySelector("#kt_stepper_example_basic");

        // Initialize Stepper
        var stepper = new KTStepper(element);

        // Handle next step
        stepper.on("kt.stepper.next", function(stepper) {
            stepper.goNext(); // go next step
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });
    </script>
@endpush
