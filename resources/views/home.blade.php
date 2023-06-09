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
                                        @if (\App\Enums\Proses\Status::TOLAK == $proses?->status)
                                            @include('alerts.danger', [
                                                'message' => 'Maaf, Anda tidak lulus ujian online!',
                                            ])
                                        @else
                                            @include('alerts.warning', [
                                                'message' =>
                                                    'Anda belum mengerjakan soal tes online! <br> Silahkan cek email kmu!',
                                            ])
                                        @endif
                                    @break

                                    @case(\App\Enums\Proses\Proses::PEMBAYARAN)
                                        @switch($proses?->status)
                                            @case(\App\Enums\Proses\Status::MENUNGGU)
                                                @include('alerts.warning', [
                                                    'message' =>
                                                        'Anda belum melakukan pembayaran biaya pendaftaran! <br> Silahkan bayar <a href="" class="underline">disini</a>',
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
                                                        'Biodata Anda sedang di verifikasi!! <br> Silahkan bayar <a href="" class="underline">disini</a>',
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
                                @endswitch
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img style="width: 100%; height: auto;" src="assets/media/illustrations/dozzy-1/7.png" alt=""
                                srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
@endsection
