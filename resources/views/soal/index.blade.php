@extends('layouts.master')

@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title', 'Soal')

@section('toolbar')
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Data Soal
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">Soal</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-customer-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Cari Soal" />
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <button type="button" class="btn btn-primary ps-4" data-bs-toggle="modal"
                        data-bs-target="#create-soal">
                        <i class="ki-duotone ki-plus fs-2"></i>Tambah Soal
                    </button>
                </div>

                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-customer-table-select="selected_count"></span> Selected
                    </div>

                    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">
                        Delete Selected
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="soal_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#soal_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">Pertanyaan</th>
                        <th class="min-w-125px">Pilihan A</th>
                        <th class="min-w-125px">Pilihan B</th>
                        <th class="min-w-125px">Pilihan C</th>
                        <th class="min-w-125px">Pilihan D</th>
                        <th class="">Jawaban</th>
                        <th class="">Status</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="create-soal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form class="form" action="#" id="create-soal_form">
                    <div class="modal-header" id="create-soal_header">
                        <h2 class="fw-bold">Tambah Guru</h2>
                        <div id="create-soal_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <div class="row">
                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Pertanyaan</label>
                                <textarea class="form-control form-control-solid" placeholder="Pertanyaan" name="pertanyaan"></textarea>
                            </div>
                            <div class="fv-row col-md-6 mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Pilihan A</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Pilihan A"
                                    name="pilihan_a" />
                            </div>
                            <div class="fv-row col-md-6 mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Pilihan B</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Pilihan B"
                                    name="pilihan_b" />
                            </div>
                            <div class="fv-row col-md-6 mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Pilihan C</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Pilihan C"
                                    name="pilihan_c" />
                            </div>
                            <div class="fv-row col-md-6 mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Pilihan D</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Pilihan D"
                                    name="pilihan_d" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Jawaban</label>
                                <select class="form-select form-select-solid" name="jawaban" data-control="select2"
                                    data-placeholder="Jawaban" data-dropdown-parent="#create-soal">
                                    <option></option>
                                    @foreach (\App\Enums\Jawaban::cases() as $jawaban)
                                        <option value="{{ $jawaban->value }}">{{ $jawaban->label() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="create-soal_cancel" class="btn btn-light me-3">
                            Discard
                        </button>
                        <button type="submit" data-soal="" id="create-soal_submit" class="btn btn-primary">
                            <span class="indicator-label">
                                Submit
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/soal/index.js') }}"></script>
    <script src="{{ asset('assets/js/pages/soal/create.js') }}"></script>
@endpush
