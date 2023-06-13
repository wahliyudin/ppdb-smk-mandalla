@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    @role('siswa')
        <div class="card">
            <div class="card-header border-0">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            <div class="text-center py-20">
                                <!--begin::Title-->
                                <h2 class="fs-2x fw-bold mb-10">Welcome to {{ env('APP_NAME') }}</h2>
                                <!--end::Title-->

                                @switch($proses?->proses)
                                    @case(\App\Enums\Proses\Proses::TES_ONLINE)
                                        @switch($proses?->status)
                                            @case(\App\Enums\Proses\Status::TOLAK)
                                                @include('alerts.danger', [
                                                    'message' => 'Maaf, Anda tidak lulus ujian online!',
                                                ])
                                            @break

                                            @case(\App\Enums\Proses\Status::VERIFIKASI)
                                                @include('alerts.warning', [
                                                    'message' =>
                                                        'Anda belum melakukan pembayaran biaya pendaftaran sebesar Rp. 50.000! <br> Silahkan kirim ke nomor rekening <strong>345678876543</strong>',
                                                ])
                                            @break

                                            @case(\App\Enums\Proses\Status::MENUNGGU)
                                                @if ($siswa->tesOnline?->kesempatan < 3)
                                                    @include('alerts.warning', [
                                                        'message' =>
                                                            'Anda gagal di tes online ke ' .
                                                            (\App\Models\SiswaTesOnline::KESEMPATAN -
                                                                $siswa->tesOnline?->kesempatan) .
                                                            '! <br> Masi ada kesempatan ' .
                                                            $siswa->tesOnline?->kesempatan .
                                                            ' kali lagi <br> Silahkan gunakan link yang sama untuk mengerjakan tes online!',
                                                    ])
                                                @else
                                                    @include('alerts.warning', [
                                                        'message' =>
                                                            'Anda belum mengerjakan soal tes online! <br> Silahkan cek email kmu!',
                                                    ])
                                                @endif
                                            @break

                                            @default
                                        @endswitch
                                    @break

                                    @case(\App\Enums\Proses\Proses::PEMBAYARAN)
                                        @switch($proses?->status)
                                            @case(\App\Enums\Proses\Status::MENUNGGU)
                                                @include('alerts.warning', [
                                                    'message' =>
                                                        'Bukti Pembayaran Anda sedang di verifikasi oleh Admin',
                                                ])
                                            @break

                                            @case(\App\Enums\Proses\Status::VERIFIKASI)
                                                @include('alerts.success', [
                                                    'message' =>
                                                        'Selamat!, Anda telah diterima sebagai Siswa SMK MANDALLA <br> Harap tunggu info selanjutnya!!!!!!',
                                                ])
                                            @break

                                            @default
                                                @include('alerts.danger', [
                                                    'message' =>
                                                        'Maaf, Bukti bayar yang anda kirim tidak valid! <br> Silahkan kirim kembali bukti pembayaran yang <strong>valid</strong>!',
                                                ])
                                        @endswitch
                                    @break

                                    @case(\App\Enums\Proses\Proses::DOKUMEN)
                                        @switch($proses?->status)
                                            @case(\App\Enums\Proses\Status::MENUNGGU)
                                                @include('alerts.warning', [
                                                    'message' =>
                                                        'Biodata Anda sedang di verifikasi!! <br> Silahkan tunggu email pemberitahuan',
                                                ])
                                            @break

                                            @case(\App\Enums\Proses\Status::VERIFIKASI)
                                            @break

                                            @default
                                                @include('alerts.danger', [
                                                    'message' =>
                                                        'Maaf, Biodata yang anda masukkan tidak valid! <br> Silahkan input kembali disini!',
                                                ])
                                        @endswitch
                                    @break

                                    @default
                                        @include('alerts.warning', [
                                            'message' =>
                                                'Anda belum melengkapi biodata!! <br> Silahkan lengkapi <a href="' .
                                                route('pendaftaran.index') .
                                                '" class="underline">disini</a>',
                                        ])
                                @endswitch

                                @if ($proses?->proses == \App\Enums\Proses\Proses::TES_ONLINE && $proses->status == \App\Enums\Proses\Status::VERIFIKASI)
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-home">Input
                                        Bukti Pembayaran</button>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            @switch($proses?->proses)
                                @case(\App\Enums\Proses\Proses::TES_ONLINE)
                                    @if (\App\Enums\Proses\Status::TOLAK == $proses?->status)
                                        <img style="width: 100%; height: auto;"
                                            src="{{ asset('assets/media/illustrations/sigma-1/4.png') }}" alt="" srcset="">
                                    @else
                                        <img style="width: 100%; height: auto;"
                                            src="{{ asset('assets/media/illustrations/unitedpalms-1/16.png') }}" alt=""
                                            srcset="">
                                    @endif
                                @break

                                @case(\App\Enums\Proses\Proses::PEMBAYARAN)
                                    @switch($proses?->status)
                                        @case(\App\Enums\Proses\Status::MENUNGGU)
                                            <img style="width: 100%; height: auto;"
                                                src="{{ asset('assets/media/illustrations/unitedpalms-1/11.png') }}" alt=""
                                                srcset="">
                                        @break

                                        @case(\App\Enums\Proses\Status::VERIFIKASI)
                                            <img style="width: 100%; height: auto;"
                                                src="{{ asset('assets/media/illustrations/dozzy-1/7.png') }}" alt="" srcset="">
                                        @break

                                        @default
                                            <img style="width: 100%; height: auto;"
                                                src="{{ asset('assets/media/illustrations/unitedpalms-1/11.png') }}" alt=""
                                                srcset="">
                                    @endswitch
                                @break

                                @case(\App\Enums\Proses\Proses::DOKUMEN)
                                    @switch($proses?->status)
                                        @case(\App\Enums\Proses\Status::MENUNGGU)
                                            <img style="width: 100%; height: auto;"
                                                src="{{ asset('assets/media/illustrations/sketchy-1/2.png') }}" alt="" srcset="">
                                        @break

                                        @case(\App\Enums\Proses\Status::VERIFIKASI)
                                        @break

                                        @default
                                    @endswitch
                                @break

                                @default
                                    <img style="width: 100%; height: auto;"
                                        src="{{ asset('assets/media/illustrations/dozzy-1/7.png') }}" alt="" srcset="">
                            @endswitch
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
@endsection

@push('modal')
    <div class="modal fade" id="create-home" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="create-home_form">
                    <div class="modal-header" id="create-home_header">
                        <h2 class="fw-bold">Bukti Pembayaran</h2>
                        <div id="create-home_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">File Bukti</label>
                            <input type="file" class="form-control form-control-solid" placeholder="file"
                                name="file" />
                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="create-home_cancel" class="btn btn-light me-3">
                            Discard
                        </button>
                        <button type="button" data-akun="" id="create-home_submit" class="btn btn-primary">
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
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.create-home').click(function(e) {
                e.preventDefault();
                $('.create-home .btn-save').addClass(
                    'store-home');
                $('.create-home .btn-save').removeClass(
                    'update-home');
                $('.create-home .btn-save').data('item', '');
                $('.form-home input[name="file"]').val('');
            });

            $('#create-home').on('click', '#create-home_submit', function(e) {
                e.preventDefault();
                var postData = new FormData($("#create-home_form")[0]);
                $('#create-home_submit .spin').show();
                var target = this;
                $(this).attr("data-kt-indicator", "on");
                $.ajax({
                    type: 'POST',
                    url: "/home/store",
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(response) {
                        $(target).removeAttr("data-kt-indicator");
                        $('#create-home').modal('hide');
                        Swal.fire(
                            'Success!',
                            response.message,
                            'success'
                        ).then(function() {
                            location.reload();
                        });
                    },
                    error: function(jqXHR) {
                        if (jqXHR.status == 422) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan!',
                                text: JSON.parse(jqXHR.responseText)
                                    .message,
                            }).then(function() {
                                $(target).removeAttr("data-kt-indicator");
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: jqXHR.responseText,
                            }).then(function() {
                                $(target).removeAttr("data-kt-indicator");
                            })
                        }
                    }
                });
            });

            $('#table-home').on('click', '.edit-home', function(e) {
                e.preventDefault();
                var home = $(this).data('home');
                var target = this;
                $.ajax({
                    type: "GET",
                    url: `/home/${home}/edit`,
                    dataType: "JSON",
                    success: function(response) {
                        $('#create-home .btn-save').data('home', response.key);
                        $('#create-home .btn-save').addClass('update-home');
                        $('#create-home .btn-save').removeClass('store-home');
                        $('#create-home').modal('show');
                    },
                    error: function(jqXHR) {
                        if (jqXHR.status == 422) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan!',
                                text: JSON.parse(jqXHR.responseText)
                                    .message,
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: jqXHR.responseText,
                            })
                        }
                    }
                });
            });

            $('#create-home').on('click', '.update-home', function(e) {
                e.preventDefault();
                var postData = new FormData($("#create-home_form")[0]);
                var home = $(this).data('home');
                $(this).attr("data-kt-indicator", "on");
                $.ajax({
                    type: 'POST',
                    url: `/home/${home}/update`,
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(response) {
                        $(this).removeAttr("data-kt-indicator");
                        $('#create-home').modal('hide');
                        Swal.fire(
                            'Success!',
                            response.message,
                            'success'
                        ).then(function() {
                            location.reload();
                        });
                    },
                    error: function(jqXHR) {
                        if (jqXHR.status == 422) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan!',
                                text: JSON.parse(jqXHR.responseText)
                                    .message,
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: jqXHR.responseText,
                            })
                        }
                    }
                });
            });
        });
    </script>
@endpush
