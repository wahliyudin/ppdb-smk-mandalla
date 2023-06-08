@extends('layouts.master')

@section('title', 'Form Pendaftaran')

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
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Nama</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama_ayah" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tanggal Lahir</label>
                                        <input class="form-control form-control-solid" value="{{ now()->format('Y-m-d') }}"
                                            placeholder="Tanggal Lahir" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tempat Lahir</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Tempat Lahir" name="tempat_lahir_ayah" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Pekerjaan</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Pekerjaan" name="pekerjaan_ayah" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">No. Telp</label>
                                        <input type="number" class="form-control form-control-solid"
                                            placeholder="No. Telp" name="no_telp_ayah" />
                                    </div>
                                </div>
                            </div>
                            <!--begin::Step 1-->

                            <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <div class="row">
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Nama</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama_ibu" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tanggal Lahir</label>
                                        <input class="form-control form-control-solid"
                                            value="{{ now()->format('Y-m-d') }}" placeholder="Tanggal Lahir"
                                            name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tempat Lahir</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Tempat Lahir" name="tempat_lahir_ibu" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Pekerjaan</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Pekerjaan" name="pekerjaan_ibu" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">No. Telp</label>
                                        <input type="number" class="form-control form-control-solid"
                                            placeholder="No. Telp" name="no_telp_ibu" />
                                    </div>
                                </div>
                            </div>
                            <!--begin::Step 1-->

                            <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <div class="row">
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">NIK</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="NIK"
                                            name="nik_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">NISN</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="NISN"
                                            name="nisn_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Nama</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Nama"
                                            name="nama_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tempat Lahir</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Tempat Lahir" name="tempat_lahir_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tanggal Lahir</label>
                                        <input class="form-control form-control-solid"
                                            value="{{ now()->format('Y-m-d') }}" placeholder="Tanggal Lahir"
                                            name="tanggal_lahir_biodata" id="tanggal_lahir" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Jenis Kelamin</label>
                                        <select class="form-select form-select-solid" name="jenis_kelamin_biodata"
                                            data-control="select2" data-placeholder="Jenis Kelamin">
                                            <option></option>
                                            @foreach (\App\Enums\JenisKelamin::cases() as $jenisKelamin)
                                                <option value="{{ $jenisKelamin->value }}">{{ $jenisKelamin->label() }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Jumlah Saudara</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Jumlah Saudara" name="jumlah_saudara_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Anak Ke</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Anak Ke" name="anak_ke_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Dari</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Dari"
                                            name="dari_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Agama</label>
                                        <select class="form-select form-select-solid" name="agama_biodata"
                                            data-control="select2" data-placeholder="Agama">
                                            <option></option>
                                            @foreach (\App\Enums\Agama::cases() as $agama)
                                                <option value="{{ $agama->value }}">{{ $agama->label() }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Suku</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="Suku"
                                            name="suku_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Asal Sekolah</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Asal Sekolah" name="asal_sekolah_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">No Ijazah</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="No Ijazah" name="no_ijazah_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Berat Badan</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Berat Badan" name="berat_badan_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Tinggi Badan</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Tinggi Badan" name="tinggi_badan_biodata" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Riwayat Penyakit</label>
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Riwayat Penyakit" name="riwayat_penyakit_biodata" />
                                    </div>
                                </div>
                            </div>
                            <!--begin::Step 1-->

                            <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <div class="row">
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">KTP Orang Tua</label>
                                        <input type="file" class="form-control form-control-solid"
                                            placeholder="KTP Orang Tua" name="ktp_orang_tua_file"
                                            accept=".png, .jpg, .jpeg" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Ijazah</label>
                                        <input type="file" class="form-control form-control-solid"
                                            placeholder="Ijazah" name="ijazah_file" accept=".png, .jpg, .jpeg" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="fs-6 fw-semibold mb-2">KIP</label>
                                        <input type="file" class="form-control form-control-solid" placeholder="KIP"
                                            name="kip_file" accept=".png, .jpg, .jpeg" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="fs-6 fw-semibold mb-2">PKH</label>
                                        <input type="file" class="form-control form-control-solid" placeholder="PKH"
                                            name="pkh_file" accept=".png, .jpg, .jpeg" />
                                    </div>
                                    <div class="fv-row col-md-6 mb-7">
                                        <label class="fs-6 fw-semibold mb-2">KKS</label>
                                        <input type="file" class="form-control form-control-solid" placeholder="KKS"
                                            name="kks_file" accept=".png, .jpg, .jpeg" />
                                    </div>
                                </div>
                            </div>
                            <!--begin::Step 1-->

                            <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <div class="alert alert-warning d-flex align-items-center p-5">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-shield-tick fs-2hx text-warning me-4"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    <!--end::Icon-->

                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Title-->
                                        <h4 class="mb-1 text-warning">Peringatan!</h4>
                                        <!--end::Title-->

                                        <!--begin::Content-->
                                        <span>Dengan mengirim data diri dan orang tua maka kamu sudah mematuhi segala
                                            peraturan pada PPDB ini</span>
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
                                <button type="button" class="btn btn-primary" id="kt_docs_formvalidation_text_submit"
                                    data-kt-stepper-action="submit">
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
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#tanggal_lahir_ayah").flatpickr();
            $("#tanggal_lahir_ibu").flatpickr();
            var element = document.querySelector("#kt_stepper_example_basic");

            // Initialize Stepper
            var stepper = new KTStepper(element);

            // Handle next step
            stepper.on("kt.stepper.next", function(stepper) {
                switch (stepper.getCurrentStepIndex()) {
                    case 1:
                        fields = {
                            'nama_ayah': {
                                validators: {
                                    notEmpty: {
                                        message: 'Nama ayah wajib diisi'
                                    }
                                }
                            },
                            'tanggal_lahir_ayah': {
                                validators: {
                                    notEmpty: {
                                        message: 'Tanggal lahir ayah wajib diisi'
                                    }
                                }
                            },
                            'tempat_lahir_ayah': {
                                validators: {
                                    notEmpty: {
                                        message: 'Tempat lahir ayah wajib diisi'
                                    }
                                }
                            },
                            'pekerjaan_ayah': {
                                validators: {
                                    notEmpty: {
                                        message: 'Pekerjaan ayah wajib diisi'
                                    }
                                }
                            },
                            'no_telp_ayah': {
                                validators: {
                                    notEmpty: {
                                        message: 'No telpon ayah wajib diisi'
                                    }
                                }
                            },
                        };
                        break;
                    case 2:
                        fields = {
                            'nama_ibu': {
                                validators: {
                                    notEmpty: {
                                        message: 'Nama ibu wajib diisi'
                                    }
                                }
                            },
                            'tanggal_lahir_ibu': {
                                validators: {
                                    notEmpty: {
                                        message: 'Tanggal lahir ibu wajib diisi'
                                    }
                                }
                            },
                            'tempat_lahir_ibu': {
                                validators: {
                                    notEmpty: {
                                        message: 'Tempat lahir ibu wajib diisi'
                                    }
                                }
                            },
                            'pekerjaan_ibu': {
                                validators: {
                                    notEmpty: {
                                        message: 'Pekerjaan ibu wajib diisi'
                                    }
                                }
                            },
                            'no_telp_ibu': {
                                validators: {
                                    notEmpty: {
                                        message: 'No telpon ibu wajib diisi'
                                    }
                                }
                            },
                        };
                        break;
                    case 3:
                        fields = {
                            'nik_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'NIK wajib diisi'
                                    }
                                }
                            },
                            'nisn_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'NISN wajib diisi'
                                    }
                                }
                            },
                            'nama_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Nama wajib diisi'
                                    }
                                }
                            },
                            'tempat_lahir_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Tempat Lahir wajib diisi'
                                    }
                                }
                            },
                            'tanggal_lahir_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Tanggal Lahir wajib diisi'
                                    }
                                }
                            },
                            'jenis_kelamin_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Jenis Kelamin wajib diisi'
                                    }
                                }
                            },
                            'jumlah_saudara_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Jumlah saudara wajib diisi'
                                    }
                                }
                            },
                            'anak_ke_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Anak ke wajib diisi'
                                    }
                                }
                            },
                            'dari_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Dari wajib diisi'
                                    }
                                }
                            },
                            'agama_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Agama wajib diisi'
                                    }
                                }
                            },
                            'suku_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Suku wajib diisi'
                                    }
                                }
                            },
                            'asal_sekolah_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Asal sekolah wajib diisi'
                                    }
                                }
                            },
                            'no_ijazah_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'No ijazah wajib diisi'
                                    }
                                }
                            },
                            'berat_badan_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Berat badan wajib diisi'
                                    }
                                }
                            },
                            'tinggi_badan_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Tinggi badan wajib diisi'
                                    }
                                }
                            },
                            'riwayat_penyakit_biodata': {
                                validators: {
                                    notEmpty: {
                                        message: 'Riwayat penyakit wajib diisi'
                                    }
                                }
                            },
                        };
                        break;
                    case 4:
                        fields = {
                            'ktp_orang_tua_file': {
                                validators: {
                                    notEmpty: {
                                        message: 'KTP Orang Tua wajib diisi'
                                    }
                                }
                            },
                            'ijazah_file': {
                                validators: {
                                    notEmpty: {
                                        message: 'Ijazah wajib diisi'
                                    }
                                }
                            },
                        };
                        break;
                }
                initVaildate(fields).validate().then(function(status) {
                    if (status == 'Valid') {
                        stepper.goNext(); // go next step
                    }
                });
            });

            // Handle previous step
            stepper.on("kt.stepper.previous", function(stepper) {
                stepper.goPrevious(); // go previous step
            });

            function initVaildate(fields) {
                const form = document.getElementById('kt_stepper_example_basic_form');
                return FormValidation.formValidation(
                    form, {
                        fields: fields,

                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: '',
                                eleValidClass: ''
                            })
                        }
                    }
                );
            }

            $('#kt_docs_formvalidation_text_submit').click(function(e) {
                e.preventDefault();
                var target = this;
                $(this).attr('data-kt-indicator', 'on');
                var postData = new FormData($("#kt_stepper_example_basic_form")[0]);
                $.ajax({
                    type: 'POST',
                    url: `/pendaftaran/store`,
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(response) {
                        $(target).removeAttr('data-kt-indicator');
                        Swal.fire({
                            text: response.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function(result) {
                            if (result.isConfirmed) {
                                // location.reload();
                            }
                        });
                    },
                    error: function(jqXHR, xhr, textStatus, errorThrow, exception) {
                        $(target).removeAttr('data-kt-indicator');
                        if (jqXHR.status == 422) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan!',
                                text: JSON.parse(jqXHR.responseText).message,
                            })
                        } else {
                            Swal.fire(
                                'Error!',
                                'Something went wrong',
                                'error'
                            );
                        }
                    }
                });
            });
        });
    </script>
@endpush
