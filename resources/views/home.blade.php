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

                                            @case(\App\Enums\Proses\Status::MENUNGGU)
                                                @if ($siswa->tesOnline?->kesempatan > 0)
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
                                                        'Anda belum melakukan pembayaran biaya pendaftaran! <br> Silahkan kirim ke nomor rekening <strong>345678876543</strong>',
                                                ])
                                            @break

                                            @case(\App\Enums\Proses\Status::VERIFIKASI)
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

                                @if ($proses?->proses == \App\Enums\Proses\Proses::PEMBAYARAN && $proses->status == \App\Enums\Proses\Status::MENUNGGU)
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#create-pembayaran">Input
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
                                    <img style="width: 100%; height: auto;"
                                        src="{{ asset('assets/media/illustrations/unitedpalms-1/11.png') }}" alt=""
                                        srcset="">
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
    <div class="modal fade" id="create-pembayaran" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="create-pembayaran_form">
                    <div class="modal-header" id="create-pembayaran_header">
                        <h2 class="fw-bold">Bukti Pembayaran</h2>
                        <div id="create-pembayaran_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                        <button type="reset" id="create-pembayaran_cancel" class="btn btn-light me-3">
                            Discard
                        </button>
                        <button type="submit" data-akun="" id="create-pembayaran_submit" class="btn btn-primary">
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
